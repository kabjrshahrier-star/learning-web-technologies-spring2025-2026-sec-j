<!DOCTYPE html>
<html>
<head>
    <title>Form C</title>
</head>
<body>

<?php
$name = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
}
?>

<form method="post">
    <fieldset>
        <p>NAME</p>
        <input type="text" name="username" value="<?php echo $name; ?>">
        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($name != "") {
    echo "<p>Your Name is: $name</p>";
}
?>

</body>
</html>