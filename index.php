<?php
require __DIR__ . '/includes/session.php';
require __DIR__ . '/includes/helpers.php';
require __DIR__ . '/includes/db.php';
require __DIR__ . '/includes/csrf.php';
require __DIR__ . '/includes/flash.php';
require __DIR__ . '/includes/captcha.php';
require __DIR__ . '/includes/auth.php';

date_default_timezone_set(app_config('TIMEZONE', 'Asia/Jakarta'));
$page = $_GET['page'] ?? 'home';
$map = [
    'home' => __DIR__ . '/pages/user/home.php',
    'login' => __DIR__ . '/pages/auth/login.php',
    'register' => __DIR__ . '/pages/auth/register.php',
    'logout' => __DIR__ . '/actions/auth/logout.php',
];
$target = $map[$page] ?? __DIR__ . '/pages/public/404.php';
require $target;
