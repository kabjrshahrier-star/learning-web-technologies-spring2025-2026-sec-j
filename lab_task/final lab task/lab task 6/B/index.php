<!DOCTYPE html>
<html>
<head>
    <title>Blood Group Form B</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>BLOOD GROUP</legend>

        <select name="blood" required>
            <option value="">Select</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
        </select>

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $blood = htmlspecialchars($_POST['blood']);
    echo "<p>Your Blood Group is: $blood</p>";
}
?>

</body>
</html>