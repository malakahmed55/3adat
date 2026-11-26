<?php
// One-time migration for databases created with the old code, which saved passwords as plain text.
// Run once from the command line:  php tools/migrate_passwords.php
// It hashes every value in registrations.password that is not already a bcrypt/argon hash.
// Back up the table first. The change cannot be undone (a hash cannot be turned back into the password).
// Nothing in this site reads passwords back (there is no login page), so no other code is affected.

if (PHP_SAPI !== 'cli' && !defined('MIGRATION_TEST')) {
    http_response_code(403);
    exit("Run this from the command line.\n");
}
require_once __DIR__ . '/../config.php';

function needs_hash(string $stored): bool
{
    $info = password_get_info($stored);
    return $info['algo'] === null;   // null = not a recognised password hash
}

if (!defined("MIGRATION_TEST")) {
    $conn = db_connect();
    $conn->query("ALTER TABLE registrations MODIFY password VARCHAR(255) NOT NULL");
    $rows = $conn->query("SELECT id, password FROM registrations");
    $upd = $conn->prepare("UPDATE registrations SET password = ? WHERE id = ?");
    $done = 0;
    while ($row = $rows->fetch_assoc()) {
        if (needs_hash($row['password'])) {
            $h = password_hash($row['password'], PASSWORD_DEFAULT);
            $id = (int) $row['id'];
            $upd->bind_param('si', $h, $id);
            $upd->execute();
            $done++;
        }
    }
    echo "Hashed $done password(s).\n";
}
