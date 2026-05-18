# Online Computer Shop - Task 1 + Task 2

This package keeps the Task 1 base and adds Task 2 admin inventory features.

## Implemented Task 2 Features

- Admin gate using `$_SESSION['role'] === 'admin'`
- Admin dashboard summary
  - Total products
  - Total categories
  - Total brands
  - Low-stock alerts where stock `< 5`
- Category management
  - Create category
  - Edit category
  - Delete category
  - Sub-category support through `parent_id`
  - Delete blocked when child categories or products exist
- Brand management
  - Create brand under a category
  - Edit brand
  - Delete brand
  - Delete blocked when products exist under the brand
- Product management
  - Create product
  - Edit product
  - Delete product
  - Product image upload to `public/uploads/products/`
  - JPEG/PNG validation
  - Maximum image size 2MB
  - Dynamic brand dropdown by category using AJAX/JSON
- JS validation
- PHP validation
- Prepared statements
- CSRF token protection

## Requirements

- XAMPP / WAMP / Laragon
- PHP 8+
- MySQL
- Browser

## Setup

1. Copy this folder into XAMPP `htdocs`.

Example:

```text
C:/xampp/htdocs/online_computer_shop_task2
```

2. Start Apache and MySQL.

3. Open phpMyAdmin.

```text
http://localhost/phpmyadmin
```

4. Import:

```text
database/computer_shop_task2.sql
```

5. Run:

```text
http://localhost/online_computer_shop_task2/
```

## Login for Admin

Register a new account and select role `Admin`, then login.

After login, navbar will show:

- Admin Dashboard
- Categories
- Brands
- Products
- Profile
- Logout

## Task 2 Test Flow

1. Register as admin.
2. Login as admin.
3. Open Admin Dashboard.
4. Create category: `Storage`.
5. Create sub-category: `SSD` with parent `Storage`.
6. Create brand: `Samsung` under `SSD`.
7. Create product with name, description, manufacturer review, price, category, brand, image, and stock.
8. Edit the product.
9. Test low-stock alert by setting stock below 5.
10. Try deleting a category that has product or child category. It should block.
11. Try deleting a brand that has product. It should block.
12. Delete a product. Its uploaded image file should also be removed.

## Important Merge Notes

- Keep the same database name: `computer_shop`.
- Keep the same session variables:

```php
$_SESSION['user_id']
$_SESSION['name']
$_SESSION['role']
```

- Do not rename shared tables.
- Do not rename columns.
- The `users.remember_token` column is included because Task 1 Remember Me needs it.
- Do not repeatedly run the SQL file with `DROP TABLE` after other members insert data.

## Suggested Branch

```bash
git checkout -b feature/task2-2350291-1
```

## Suggested Commits

```bash
git add .
git commit -m "Add admin dashboard and category management"

git add .
git commit -m "Add brand management with validation"

git add .
git commit -m "Add product management with image upload and AJAX brand loading"
```
