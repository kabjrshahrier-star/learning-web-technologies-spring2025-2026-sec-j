<?php
$blood = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood = htmlspecialchars($_POST['blood']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Blood Group Form C</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>BLOOD GROUP</legend>

        <select name="blood" required>
            <option value="">Select</option>

            <option value="A+" <?php if($blood=="A+") echo "selected"; ?>>A+</option>
            <option value="A-" <?php if($blood=="A-") echo "selected"; ?>>A-</option>
            <option value="B+" <?php if($blood=="B+") echo "selected"; ?>>B+</option>
            <option value="B-" <?php if($blood=="B-") echo "selected"; ?>>B-</option>
            <option value="O+" <?php if($blood=="O+") echo "selected"; ?>>O+</option>
            <option value="O-" <?php if($blood=="O-") echo "selected"; ?>>O-</option>
            <option value="AB+" <?php if($blood=="AB+") echo "selected"; ?>>AB+</option>
            <option value="AB-" <?php if($blood=="AB-") echo "selected"; ?>>AB-</option>
        </select>

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($blood != "") {
    echo "<p>Your Blood Group is: $blood</p>";
}
?>

</body>
</html>