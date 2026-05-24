<?php
function e(string $value): string { return htmlspecialchars($value, ENT_QUOTES, 'UTF-8'); }
function now(): string { return date('Y-m-d H:i:s'); }
function app_config(string $key, $default = null) {
    static $app; $app ??= require __DIR__ . '/../config/app.php';
    return $app[$key] ?? $default;
}
function log_message(string $channel, string $message): void {
    $line = '[' . now() . "] [$channel] $message\n";
    file_put_contents(__DIR__ . '/../storage/logs/app.log', $line, FILE_APPEND);
}
