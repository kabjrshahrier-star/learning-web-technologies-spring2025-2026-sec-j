<!DOCTYPE html>
<html>
<head>
    <title>Form B</title>
</head>
<body>

<form method="post">
    <fieldset>
        <p>NAME</p>
        <input type="text" name="username">
        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    echo "<p>Your Name is: $name</p>";
}
?>

</body>
</html>