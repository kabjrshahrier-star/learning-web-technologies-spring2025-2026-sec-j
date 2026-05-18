<?php require __DIR__ . '/../layouts/header.php'; ?>
<?php require __DIR__ . '/../layouts/navbar.php'; ?>

<main class="container">
    <section class="section">
        <h1>Admin Dashboard</h1>
        <p class="muted">Inventory summary for category, brand, and product management.</p>

        <div class="dashboard-grid">
            <div class="stat-card">
                <h2><?= e($totalProducts) ?></h2>
                <p>Total Products</p>
            </div>
            <div class="stat-card">
                <h2><?= e($totalCategories) ?></h2>
                <p>Total Categories</p>
            </div>
            <div class="stat-card">
                <h2><?= e($totalBrands) ?></h2>
                <p>Total Brands</p>
            </div>
        </div>
    </section>

    <section class="section">
        <h2>Quick Actions</h2>
        <div class="action-row">
            <a class="button-link" href="index.php?page=admin-categories">Manage Categories</a>
            <a class="button-link" href="index.php?page=admin-brands">Manage Brands</a>
            <a class="button-link" href="index.php?page=admin-products">Manage Products</a>
        </div>
    </section>

    <section class="section">
        <h2>Low Stock Alerts</h2>
        <p class="muted">Products with stock less than 5.</p>

        <?php if (empty($lowStockProducts)): ?>
            <p>No low-stock product found.</p>
        <?php else: ?>
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Product</th>
                            <th>Stock</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lowStockProducts as $product): ?>
                            <tr>
                                <td><?= e($product['id']) ?></td>
                                <td><?= e($product['name']) ?></td>
                                <td><strong><?= e($product['stock']) ?></strong></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </section>
</main>

<?php require __DIR__ . '/../layouts/footer.php'; ?>
