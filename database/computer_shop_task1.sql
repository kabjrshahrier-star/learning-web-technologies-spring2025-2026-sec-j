CREATE DATABASE IF NOT EXISTS computer_shop
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE computer_shop;

SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS reviews;
DROP TABLE IF EXISTS order_items;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS cart;
DROP TABLE IF EXISTS products;
DROP TABLE IF EXISTS brands;
DROP TABLE IF EXISTS categories;
DROP TABLE IF EXISTS users;

SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('admin', 'customer') NOT NULL DEFAULT 'customer',
    profile_picture VARCHAR(255) NULL,
    remember_token VARCHAR(255) NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    parent_id INT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_categories_parent
        FOREIGN KEY (parent_id) REFERENCES categories(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE brands (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    category_id INT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_brands_category
        FOREIGN KEY (category_id) REFERENCES categories(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    description TEXT NOT NULL,
    manufacturer_review TEXT NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    category_id INT NOT NULL,
    brand_id INT NOT NULL,
    image_path VARCHAR(255) NULL,
    stock INT NOT NULL DEFAULT 0,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_products_category
        FOREIGN KEY (category_id) REFERENCES categories(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE,
    CONSTRAINT fk_products_brand
        FOREIGN KEY (brand_id) REFERENCES brands(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    added_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_cart_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_cart_product
        FOREIGN KEY (product_id) REFERENCES products(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    UNIQUE KEY unique_cart_item (user_id, product_id)
);

CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    total_amount DECIMAL(10,2) NOT NULL,
    payment_method ENUM('cash_on_delivery', 'bkash', 'nagad', 'dbbl') NOT NULL,
    status VARCHAR(30) NOT NULL DEFAULT 'pending',
    order_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_orders_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price DECIMAL(10,2) NOT NULL,
    CONSTRAINT fk_order_items_order
        FOREIGN KEY (order_id) REFERENCES orders(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_order_items_product
        FOREIGN KEY (product_id) REFERENCES products(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    reviewer_name VARCHAR(100) NOT NULL,
    comment TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_reviews_product
        FOREIGN KEY (product_id) REFERENCES products(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
    CONSTRAINT fk_reviews_user
        FOREIGN KEY (user_id) REFERENCES users(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

INSERT INTO categories (id, name, parent_id) VALUES
(1, 'Monitor', NULL),
(2, 'RAM', NULL),
(3, 'Storage', NULL),
(4, 'Keyboard', NULL),
(5, 'Mouse', NULL),
(6, 'SSD', 3),
(7, 'HDD', 3);

INSERT INTO brands (id, name, category_id) VALUES
(1, 'ASUS', 1),
(2, 'LG', 1),
(3, 'Kingston', 2),
(4, 'Corsair', 2),
(5, 'Samsung', 6),
(6, 'Western Digital', 7),
(7, 'Logitech', 5),
(8, 'A4Tech', 4);

INSERT INTO products (name, description, manufacturer_review, price, category_id, brand_id, image_path, stock) VALUES
('ASUS 24 Inch Monitor', 'Full HD monitor for gaming and office work.', 'Good color accuracy, slim design, and reliable display performance.', 18500.00, 1, 1, NULL, 12),
('LG 22 Inch Monitor', 'Compact monitor for study and office usage.', 'Energy efficient display with comfortable viewing angle.', 14500.00, 1, 2, NULL, 8),
('Kingston 8GB DDR4 RAM', '8GB DDR4 desktop memory module.', 'Stable performance for multitasking and regular computing.', 2800.00, 2, 3, NULL, 20),
('Corsair 16GB DDR4 RAM', 'High performance 16GB DDR4 RAM.', 'Good speed and reliability for gaming and productivity.', 5900.00, 2, 4, NULL, 15),
('Samsung 500GB SSD', 'Fast solid state drive for laptop and desktop.', 'Excellent read/write speed and long-term durability.', 6200.00, 6, 5, NULL, 10),
('Logitech Optical Mouse', 'Wired optical mouse for everyday usage.', 'Comfortable grip and accurate tracking.', 650.00, 5, 7, NULL, 30);
