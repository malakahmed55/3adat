<?php
// Shared settings. Defaults match a stock XAMPP install.
// To use other settings, set these environment variables (or edit config.local.php,
// which is git-ignored): DB_HOST, DB_PORT, DB_USER, DB_PASS, DB_NAME.

if (is_file(__DIR__ . '/config.local.php')) {
    require __DIR__ . '/config.local.php';
}

function db_connect(): mysqli
{
    // Test seam: tests/run.php sets $GLOBALS['db_factory'] to return a fake connection.
    if (isset($GLOBALS['db_factory'])) {
        return ($GLOBALS['db_factory'])();
    }

    $host = getenv('DB_HOST') ?: 'localhost';
    $user = getenv('DB_USER') ?: 'root';
    $pass = getenv('DB_PASS');
    $name = getenv('DB_NAME') ?: 'competitiondb';
    $port = (int) (getenv('DB_PORT') ?: 3306);
    if ($pass === false) {
        $pass = '';
    }

    $conn = new mysqli($host, $user, $pass, $name, $port);
    if ($conn->connect_error) {
        error_log('DB connection failed: ' . $conn->connect_error);
        http_response_code(500);
        die('Database connection failed.');
    }
    $conn->set_charset('utf8mb4');
    return $conn;
}

function e($value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
