<?php
function flash_set(string $k, string $v): void { $_SESSION['_flash'][$k] = $v; }
function flash_get(string $k): ?string { $v = $_SESSION['_flash'][$k] ?? null; unset($_SESSION['_flash'][$k]); return $v; }
