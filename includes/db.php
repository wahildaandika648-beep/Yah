<?php
require_once __DIR__ . '/helpers.php';
function db(): PDO {
    static $pdo;
    if ($pdo instanceof PDO) return $pdo;
    $cfg = require __DIR__ . '/../config/database.php';
    $dsn = sprintf('mysql:host=%s;port=%d;dbname=%s;charset=%s', $cfg['host'], $cfg['port'], $cfg['database'], $cfg['charset']);
    $pdo = new PDO($dsn, $cfg['username'], $cfg['password'], [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ]);
    return $pdo;
}
