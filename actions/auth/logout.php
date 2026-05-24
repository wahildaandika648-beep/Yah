<?php
logout_user();
session_start();
flash_set('ok', 'Berhasil logout.');
header('Location: /index.php?page=login');
