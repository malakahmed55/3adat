<?php
// Run with: php tests/run.php   (no database needed)
$fails = 0;
function check($ok, $name) { global $fails; echo ($ok ? "PASS " : "FAIL ") . $name . "\n"; if (!$ok) $fails++; }
function page($file, $post) {
    $cmd = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg(__DIR__ . '/page_harness.php') . ' ' . escapeshellarg($file) . ' ' . escapeshellarg(json_encode($post));
    $raw = shell_exec($cmd);
    $json = substr($raw, strpos($raw, '@@RESULT@@') + 10);
    return json_decode($json, true);
}
$root = dirname(__DIR__);
require __DIR__ . '/stub.php';
require $root . '/config.php';
define('MIGRATION_TEST', 1);
require $root . '/tools/migrate_passwords.php';

check(e('<b>"x"</b>') === '&lt;b&gt;&quot;x&quot;&lt;/b&gt;', 'e() escapes HTML');
check(db_connect() instanceof StubDb, 'db_connect() returns a connection');
check(needs_hash('plain123') === true, 'plain text password needs hashing');
check(needs_hash(password_hash('x', PASSWORD_DEFAULT)) === false, 'existing hash is left alone');

$r = page('form1.php', ['first_name' => 'Mona', 'second_name' => 'A', 'email' => 'mona@example.com', 'phone' => '1', 'password' => 'secret-pass', 'password2' => 'secret-pass', 'group_or_single' => 'single']);
$ins = array_values(array_filter($r['log'], fn($l) => str_contains($l[0], 'INSERT INTO registrations')));
check(count($ins) === 1, 'form1 inserts one registration');
$stored = $ins ? $ins[0][1][4] : '';
check($stored !== 'secret-pass' && password_verify('secret-pass', $stored), 'form1 stores a verifiable hash, not the password');
$src = file_get_contents($root . '/form1.php');
check(str_contains($src, 'header("Location: Competitions.php")') && str_contains($src, 'header("Location: group.php")'), 'form1 redirects use relative URLs');
check(str_starts_with($src, '<?php ob_start();'), 'form1 buffers output so the redirect header can be sent');
$r = page('form1.php', ['first_name' => 'M', 'email' => 'm@example.com', 'password' => 'abc', 'password2' => 'abd']);
check(!array_filter($r['log'], fn($l) => str_contains($l[0], 'INSERT')) && str_contains($r['out'], 'غير متطابقتين'), 'form1 rejects mismatched passwords');
$r = page('form1.php', ['first_name' => 'M', 'email' => 'not-an-email', 'password' => 'x']);
check(!array_filter($r['log'], fn($l) => str_contains($l[0], 'INSERT')), 'form1 rejects an invalid email');

$r = page('history.php', ['participant_name' => "<script>alert(1)</script>'; DROP TABLE x;--"]);
$ins = array_values(array_filter($r['log'], fn($l) => str_contains($l[0], 'INSERT INTO history_results')));
check(count($ins) === 1 && str_contains($ins[0][0], '?'), 'history uses a prepared statement');
check(!str_contains($r['out'], '<script>alert'), 'history escapes the participant name in output');

$r = page('math1.php', ['participant_name' => 'Sara', 'q1' => '3x^2-3']);
check(count(array_filter($r['log'], fn($l) => str_starts_with($l[0], 'INSERT INTO MathQuizParticipants'))) === 1, 'math1 inserts the result through db_connect()');

foreach (glob($root . '/*.php') as $f) {
    $src = file_get_contents($f);
    if ($f !== $root . '/config.php') check(!str_contains($src, 'http://localhost'), basename($f) . ' has no hardcoded localhost URL');
    check(!preg_match('/new mysqli\(/', $src) || basename($f) === 'config.php', basename($f) . ' uses db_connect()');
}
echo $fails ? "\n$fails failed\n" : "\nAll passed\n";
exit($fails ? 1 : 0);
