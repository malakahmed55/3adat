<?php
// Runs one page as a POST request against the fake database and prints {"out","log","location"} as JSON.
// Input: $GLOBALS['H_FILE'] and $GLOBALS['H_POST'], or argv[1] (page) and argv[2] (JSON post data).
require __DIR__ . '/stub.php';
$file = $GLOBALS['H_FILE'] ?? $argv[1];
$post = $GLOBALS['H_POST'] ?? json_decode($argv[2] ?? '{}', true);
$_SERVER['REQUEST_METHOD'] = 'POST';
$_POST = $post;
ob_start();
register_shutdown_function(function () {
    $out = ob_get_clean();
    $loc = '';
    foreach (headers_list() as $h) { if (stripos($h, 'Location:') === 0) $loc = trim(substr($h, 9)); }
    echo "\n@@RESULT@@" . json_encode(['out' => $out, 'log' => $GLOBALS['log'], 'location' => $loc]);
});
chdir(dirname(__DIR__));
include dirname(__DIR__) . '/' . $file;
