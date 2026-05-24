<?php
if (!csrf_validate($_POST['csrf'] ?? null) || !captcha_validate($_POST['captcha'] ?? '') || empty($_POST['agree'])) { flash_set('ok','Validasi gagal'); return; }
$id = trim($_POST['identity'] ?? '');
$st = db()->prepare('SELECT * FROM users WHERE username=? OR email=? OR phone=? LIMIT 1');
$st->execute([$id,$id,$id]); $u = $st->fetch();
if (!$u || !password_verify($_POST['password'] ?? '', $u['password_hash'])) { flash_set('ok','Login gagal'); return; }
login_user($u); header('Location: /index.php?page=home'); exit;
