<?php
if (!csrf_validate($_POST['csrf'] ?? null) || !captcha_validate($_POST['captcha'] ?? '')) { flash_set('ok','Captcha/CSRF tidak valid'); return; }
if (strlen($_POST['password'] ?? '') < 8 || ($_POST['password'] ?? '') !== ($_POST['password_confirmation'] ?? '')) { flash_set('ok','Password tidak valid'); return; }
$pdo = db();
$st = $pdo->prepare('SELECT id FROM users WHERE username=? OR email=? OR phone=? LIMIT 1');
$st->execute([trim($_POST['username']), trim($_POST['email']), trim($_POST['phone'])]);
if ($st->fetch()) { flash_set('ok','Username/email/nomor HP sudah terdaftar'); return; }
$pdo->beginTransaction();
try {
    $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $ins = $pdo->prepare('INSERT INTO users(username,email,phone,password_hash,referral_code,vip_level,created_at,updated_at) VALUES(?,?,?,?,?,?,NOW(),NOW())');
    $ins->execute([trim($_POST['username']),trim($_POST['email']),trim($_POST['phone']),$hash,bin2hex(random_bytes(4)),'VIP0']);
    $uid = (int)$pdo->lastInsertId();
    $pdo->prepare('INSERT INTO balance_accounts(user_id,main_balance,bonus_balance,profit_balance,commission_balance,locked_balance,total_profit,created_at,updated_at) VALUES(?,?,0,0,0,0,0,NOW(),NOW())')->execute([$uid,0,15000]);
    $pdo->commit();
    flash_set('ok','Registrasi berhasil, silakan login.');
    header('Location: /index.php?page=login'); exit;
} catch (Throwable $e) { $pdo->rollBack(); log_message('register', $e->getMessage()); flash_set('ok','Gagal registrasi'); }
