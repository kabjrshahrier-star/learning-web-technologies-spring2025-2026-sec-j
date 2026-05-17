<?php
session_start();

if(!isset($_COOKIE['status'])){
    header('location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head><title>Home</title></head>
<body>

<h1>Welcome <?php echo $_SESSION['username']; ?></h1>

<a href="product_list.php">Product List</a> |
<a href="../controller/logout.php">Logout</a>

</body>
</html>