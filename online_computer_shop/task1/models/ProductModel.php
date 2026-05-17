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
?>
