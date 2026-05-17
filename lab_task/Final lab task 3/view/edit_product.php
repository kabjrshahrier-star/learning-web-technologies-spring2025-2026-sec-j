<?php
session_start();

$user = $_SESSION['username'];
$id = $_GET['id'];

foreach($_SESSION['products'][$user] as $p){
    if($p['id'] == $id){
        $product = $p;
        break;
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Edit</title></head>
<body>

<h2>Edit Product</h2>

<form method="post" action="../controller/productUpdateCheck.php">
    <input type="hidden" name="id" value="<?=$product['id']?>">

    Name: <input type="text" name="name" value="<?=$product['name']?>"><br><br>
    Price: <input type="text" name="price" value="<?=$product['price']?>"><br><br>

    <input type="submit" name="submit" value="Update">
</form>

</body>
</html>