<?php
$dd = $mm = $yyyy = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dd = htmlspecialchars($_POST['dd']);
    $mm = htmlspecialchars($_POST['mm']);
    $yyyy = htmlspecialchars($_POST['yyyy']);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>DOB Form C</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>DATE OF BIRTH</legend>

        
        <input type="text" name="dd" value="<?php echo $dd; ?>" placeholder="dd" required> /
        <input type="text" name="mm" value="<?php echo $mm; ?>" placeholder="mm" required> /
        <input type="text" name="yyyy" value="<?php echo $yyyy; ?>" placeholder="yyyy" required>

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($dd != "" && $mm != "" && $yyyy != "") {
    echo "<p>Your Date of Birth: $dd/$mm/$yyyy</p>";
}
?>

</body>
</html>