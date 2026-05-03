<?php
$email = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Form C</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <p>EMAIL</p>

        
        <input type="email" name="email" value="<?php echo $email; ?>" required>

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($email != "") {
    echo "<p>Your Email is: $email</p>";
}
?>

</body>
</html>