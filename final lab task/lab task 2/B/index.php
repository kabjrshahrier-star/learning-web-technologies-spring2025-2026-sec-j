<!DOCTYPE html>
<html>
<head>
    <title>Form B</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <p>EMAIL</p>
        <input type="email" name="email" required>
        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    echo "<p>Your Email is: $email</p>";
}
?>

</body>
</html>