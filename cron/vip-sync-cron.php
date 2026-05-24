<?php
require __DIR__ . '/../includes/db.php';
require __DIR__ . '/../includes/helpers.php';
$name = basename(__FILE__);
try { db()->prepare('INSERT INTO cron_logs(cron_name,status,message,run_at) VALUES(?,?,?,NOW())')->execute([$name,'success','cron executed']); echo "$name OK\n"; }
catch (Throwable $e) { log_message('cron', $name . ' ' . $e->getMessage()); echo "$name FAIL\n"; }
