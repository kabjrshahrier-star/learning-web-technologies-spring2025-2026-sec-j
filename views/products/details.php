<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<main class="container">
<section class="detail-layout">
    <div class="detail-image">
        <?php if (!empty($product['image_path'])): ?>
            <img src="<?= e($product['image_path']) ?>" alt="<?= e($product['name']) ?>">
        <?php else: ?>
            <div class="detail-placeholder">No Image</div>
        <?php endif; ?>
    </div>

    <div class="detail-info">
        <p class="meta"><?= e($product['category_name']) ?> • <?= e($product['brand_name']) ?></p>
        <h1><?= e($product['name']) ?></h1>
        <p class="price big">৳<?= number_format((float)$product['price'], 2) ?></p>
        <p class="stock <?= (int)$product['stock'] > 0 ? 'in-stock' : 'out-stock' ?>">
            <?= (int)$product['stock'] > 0 ? 'In stock: ' . e($product['stock']) : 'Out of stock' ?>
        </p>

        <h3>Description</h3>
        <p><?= nl2br(e($product['description'])) ?></p>

        <h3>Manufacturer Review</h3>
        <p><?= nl2br(e($product['manufacturer_review'])) ?></p>

        <div class="action-row">
            <a class="button-secondary" href="index.php?page=products">Back to Products</a>

            <?php if (is_logged_in() && ($_SESSION['role'] ?? '') === 'customer'): ?>
                <button type="button" class="primary-btn add-to-cart-btn" data-id="<?= e($product['id']) ?>" <?= (int)$product['stock'] <= 0 ? 'disabled' : '' ?>>Add to Cart</button>
            <?php elseif (!is_logged_in()): ?>
                <a class="primary-btn" href="index.php?page=login">Login to Add Cart</a>
            <?php endif; ?>
        </div>

        <p id="cartMessage" class="small-note"></p>
    </div>
</section>

<script>
    window.CSRF_TOKEN = '<?= e(csrf_token()) ?>';
</script>

</main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
