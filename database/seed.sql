INSERT INTO admins(username,password_hash,created_at,updated_at) VALUES('admin', '$2y$10$sr.ZTlKpn92JiM2t1cJFBOA8.2y0tnpckuzhTqCFtQ7SjYj80xMaa', NOW(), NOW());
INSERT INTO vip_levels(name,min_topup,min_withdraw,admin_fee_percent,access_voucher,access_game,is_active,created_at,updated_at) VALUES
('VIP0',0,100000,10,0,0,1,NOW(),NOW()),('VIP1',50000,50000,5,1,1,1,NOW(),NOW()),('VIP2',100000,30000,3,1,1,1,NOW(),NOW()),('VIP3',1000000,0,0,1,1,1,NOW(),NOW());
INSERT INTO product_categories(name,created_at,updated_at) VALUES ('Biasa',NOW(),NOW()),('Medium',NOW(),NOW()),('High',NOW(),NOW());
INSERT INTO cashify_settings(base_url,api_version,qris_id,license_key,package_ids,created_at,updated_at) VALUES ('https://cashify.my.id','v2','1b935c41-bf43-4075-8f57-56b6cbfa2d07','cashify_261885e5c5f830e68f929de05e3bfdf72e118d859edc5419472f79a813eed3ea','["com.orderkuota.app"]',NOW(),NOW());
