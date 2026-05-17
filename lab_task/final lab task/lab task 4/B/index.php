<!DOCTYPE html>
<html>
<head>
    <title>Gender Form B</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>GENDER</legend>

        <input type="radio" name="gender" value="Male" required> Male
        <input type="radio" name="gender" value="Female"> Female
        <input type="radio" name="gender" value="Other"> Other

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = htmlspecialchars($_POST['gender']);
    echo "<p>Your Gender is: $gender</p>";
}
?>

</body>
</html>