<!DOCTYPE html>
<html>
<head>
    <title>Degree Form B</title>
</head>
<body>

<form method="POST">
    <fieldset>
        <legend>DEGREE</legend>

        <input type="checkbox" name="degree[]" value="SSC"> SSC
        <input type="checkbox" name="degree[]" value="HSC"> HSC
        <input type="checkbox" name="degree[]" value="BSc"> BSc
        <input type="checkbox" name="degree[]" value="MSc"> MSc

        <br><br>
        <input type="submit" value="Submit">
    </fieldset>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['degree'])){
        echo "<p>Your Degrees:</p>";
        foreach($_POST['degree'] as $d){
            echo htmlspecialchars($d) . "<br>";
        }
    } else {
        echo "No degree selected!";
    }
}
?>

</body>
</html>