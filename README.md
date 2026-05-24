# NOXARA

Website PHP Native 8.2 + MySQL + Nginx (aaPanel) untuk domain `noxara.page`.

## Struktur
Lihat tree pada bagian bawah dokumen ini.

## Instalasi singkat
1. Upload semua file ke `/www/wwwroot/noxara.page`.
2. Import `database/schema.sql` lalu `database/seed.sql`.
3. Pastikan PHP 8.2 aktif.
4. Set Nginx memakai `nginx/noxara.conf`.
5. Pastikan folder writable:
   - `storage/logs`
   - `storage/cache`
   - `storage/backups`
   - `uploads/*`

## Cron aaPanel
```bash
php /www/wwwroot/noxara.page/cron/mining-cron.php
php /www/wwwroot/noxara.page/cron/product-expire-cron.php
php /www/wwwroot/noxara.page/cron/cashify-payment-cron.php
php /www/wwwroot/noxara.page/cron/vip-sync-cron.php
php /www/wwwroot/noxara.page/cron/backup-cron.php
```

## Test flow utama
- Register → Login → Landing loading → Home.
- Deposit QRIS Cashify (simulasi/manual status).
- Beli produk (bonus dulu lalu saldo utama).
- Mining start, claim via cron.
- Withdraw dengan PIN dan bank.

## Catatan
- Ini website PHP Native, bukan Android/React/Node.
- Semua saldo lewat `ledger_transactions`.

## Tree
```text
.
├── index.php
├── assets
├── uploads
├── config
├── includes
├── pages
├── actions
├── database
├── cron
├── storage
└── nginx
```
