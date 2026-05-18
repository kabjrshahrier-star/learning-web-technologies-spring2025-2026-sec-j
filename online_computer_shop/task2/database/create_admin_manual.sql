-- Manual Admin Account Entry
-- Run this file from phpMyAdmin SQL tab after importing the main database.
-- Default admin login:
-- Email: admin@gmail.com
-- Password: 12345678

USE computer_shop;

INSERT INTO users (name, email, password_hash, role, profile_picture, remember_token, created_at)
VALUES ('Admin', 'admin@gmail.com', '$2y$12$/rniDpHl4/oSCJEppkRBDecAApGhyQV3PR.TE15xKnNR8uy9ufI1O', 'admin', NULL, NULL, NOW())
ON DUPLICATE KEY UPDATE
    name = VALUES(name),
    password_hash = VALUES(password_hash),
    role = 'admin';
