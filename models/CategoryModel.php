<?php
function get_top_level_categories($conn) {
    $sql = "SELECT id, name FROM categories WHERE parent_id IS NULL ORDER BY name ASC";
    $result = $conn->query($sql);

    $categories = [];
    while ($row = $result->fetch_assoc()) {
        $categories[] = $row;
    }

    return $categories;
}
?>
