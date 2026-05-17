<?php
$gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = htmlspecialchars($_POST['gender']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gender Form C</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>GENDER</legend>

        <!-- retain selection -->
        <input type="radio" name="gender" value="Male" 
        <?php if($gender=="Male") echo "checked"; ?>> Male

        <input type="radio" name="gender" value="Female" 
        <?php if($gender=="Female") echo "checked"; ?>> Female

        <input type="radio" name="gender" value="Other" 
        <?php if($gender=="Other") echo "checked"; ?>> Other

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($gender != "") {
    echo "<p>Your Gender is: $gender</p>";
}
?>

</body>
</html>