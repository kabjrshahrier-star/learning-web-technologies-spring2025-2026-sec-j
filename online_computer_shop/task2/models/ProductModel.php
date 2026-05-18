<?php
function get_featured_products($conn, $limit = 6) {
    $sql = "SELECT p.id, p.name, p.manufacturer_review, p.price, p.image_path,
                   c.name AS category_name, b.name AS brand_name
            FROM products p
            LEFT JOIN categories c ON p.category_id = c.id
            LEFT JOIN brands b ON p.brand_id = b.id
            ORDER BY p.created_at DESC
            LIMIT ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $limit);
    $stmt->execute();

    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

function get_all_products_admin($conn) {
    $sql = "SELECT p.id, p.name, p.description, p.manufacturer_review, p.price, p.category_id,
                   p.brand_id, p.image_path, p.stock, p.created_at,
                   c.name AS category_name, b.name AS brand_name
            FROM products p
            INNER JOIN categories c ON p.category_id = c.id
            INNER JOIN brands b ON p.brand_id = b.id
            ORDER BY p.created_at DESC";
    $result = $conn->query($sql);

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}

function find_product_by_id($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function create_product($conn, $name, $description, $manufacturer_review, $price, $category_id, $brand_id, $image_path, $stock) {
    $stmt = $conn->prepare("INSERT INTO products (name, description, manufacturer_review, price, category_id, brand_id, image_path, stock)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssdiisi", $name, $description, $manufacturer_review, $price, $category_id, $brand_id, $image_path, $stock);
    return $stmt->execute();
}

function update_product($conn, $id, $name, $description, $manufacturer_review, $price, $category_id, $brand_id, $image_path, $stock) {
    $stmt = $conn->prepare("UPDATE products
                            SET name = ?, description = ?, manufacturer_review = ?, price = ?, category_id = ?, brand_id = ?, image_path = ?, stock = ?
                            WHERE id = ?");
    $stmt->bind_param("sssdiisii", $name, $description, $manufacturer_review, $price, $category_id, $brand_id, $image_path, $stock, $id);
    return $stmt->execute();
}

function delete_product($conn, $product_id) {
    $stmt = $conn->prepare("DELETE FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    return $stmt->execute();
}

function count_all_products($conn) {
    $result = $conn->query("SELECT COUNT(*) AS total FROM products");
    $row = $result->fetch_assoc();
    return (int)$row['total'];
}

function count_all_categories($conn) {
    $result = $conn->query("SELECT COUNT(*) AS total FROM categories");
    $row = $result->fetch_assoc();
    return (int)$row['total'];
}

function count_all_brands($conn) {
    $result = $conn->query("SELECT COUNT(*) AS total FROM brands");
    $row = $result->fetch_assoc();
    return (int)$row['total'];
}

function get_low_stock_products($conn, $limit = 10) {
    $stmt = $conn->prepare("SELECT id, name, stock FROM products WHERE stock < 5 ORDER BY stock ASC, name ASC LIMIT ?");
    $stmt->bind_param("i", $limit);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    return $products;
}
?>
