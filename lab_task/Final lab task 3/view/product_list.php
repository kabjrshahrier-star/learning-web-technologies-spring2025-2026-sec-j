<?php
session_start();

$user = $_SESSION['username'];

if(!isset($_SESSION['products'][$user])){
    $_SESSION['products'][$user] = [];
}

$products = $_SESSION['products'][$user];
?>

<!DOCTYPE html>
<html>
<head><title>Products</title></head>
<body>

<h2>Your Products</h2>

<a href="home.php">Home</a> |
<a href="add_product.php">Add</a> |
<a href="../controller/logout.php">Logout</a>

<br><br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php foreach($products as $p){ ?>
<tr>
    <td><?= $p['id'] ?></td>
    <td><?= $p['name'] ?></td>
    <td><?= $p['price'] ?></td>
    <td>
        <a href="../controller/productDelete.php?id=<?=$p['id']?>">Delete</a> |
        <a href="edit_product.php?id=<?=$p['id']?>">Edit</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>