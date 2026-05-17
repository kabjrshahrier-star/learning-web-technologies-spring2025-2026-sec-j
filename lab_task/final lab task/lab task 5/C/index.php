<?php
$selected = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['degree'])){
        $selected = $_POST['degree'];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Degree Form C</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>DEGREE</legend>

        <input type="checkbox" name="degree[]" value="SSC"
        <?php if(in_array("SSC", $selected)) echo "checked"; ?>> SSC

        <input type="checkbox" name="degree[]" value="HSC"
        <?php if(in_array("HSC", $selected)) echo "checked"; ?>> HSC

        <input type="checkbox" name="degree[]" value="BSc"
        <?php if(in_array("BSc", $selected)) echo "checked"; ?>> BSc

        <input type="checkbox" name="degree[]" value="MSc"
        <?php if(in_array("MSc", $selected)) echo "checked"; ?>> MSc

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if (!empty($selected)) {
    echo "<p>Your Degrees:</p>";
    foreach ($selected as $d) {
        echo htmlspecialchars($d) . "<br>";
    }
}
?>

</body>
</html>