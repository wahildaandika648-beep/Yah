<?php
function current_user(): ?array { return $_SESSION['user'] ?? null; }
function require_auth(): void { if (!current_user()) { header('Location: /index.php?page=login'); exit; } }
function login_user(array $user): void { session_regenerate_id(true); $_SESSION['user']=['id'=>$user['id'],'username'=>$user['username'],'vip_level'=>$user['vip_level'] ?? 'VIP0']; }
function logout_user(): void { $_SESSION=[]; session_destroy(); }
