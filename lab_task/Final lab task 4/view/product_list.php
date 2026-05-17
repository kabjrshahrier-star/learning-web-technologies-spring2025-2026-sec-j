<?php
session_start();

if(!isset($_COOKIE['status'])){
    header('location: login.php');
    exit;
}

$user = $_SESSION['username'];

if(!isset($_SESSION['products'][$user])){
    $_SESSION['products'][$user] = [];
}

$products = $_SESSION['products'][$user];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
</head>
<body>

<h2>Your Products</h2>

<a href="home.php">Home</a> |
<a href="add_product.php">Add</a> |
<a href="../controller/logout.php">Logout</a>

<br><br>

<p id="msg" style="color:green;"></p>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php foreach($products as $p){ ?>
<tr id="row_<?= $p['id'] ?>">
    <td><?= $p['id'] ?></td>
    <td><?= $p['name'] ?></td>
    <td><?= $p['price'] ?></td>
    <td>
        <button onclick="deleteProduct(<?= $p['id'] ?>)">Delete</button> |
        <a href="edit_product.php?id=<?= $p['id'] ?>">Edit</a>
    </td>
</tr>
<?php } ?>

</table>

<script>
function deleteProduct(id){

    let confirmDelete = confirm("Are you sure you want to delete this product?");

    if(confirmDelete == false){
        return;
    }

    let data = {
        id: id
    };

    let jsonData = JSON.stringify(data);

    let xhttp = new XMLHttpRequest();
    xhttp.open('POST', '../controller/productDelete.php', true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.send('product=' + jsonData);

    xhttp.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){

            let response = JSON.parse(this.responseText);

            if(response.status == "success"){
                document.getElementById('row_' + id).remove();
                document.getElementById('msg').innerHTML = response.message;
            }else{
                document.getElementById('msg').style.color = "red";
                document.getElementById('msg').innerHTML = response.message;
            }
        }
    }
}
</script>

</body>
</html>