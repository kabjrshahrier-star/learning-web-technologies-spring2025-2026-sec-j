<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if(isset($_POST['degree'])){
        $degrees = $_POST['degree'];

        echo "<h3>Your Degrees: </h3>";
        foreach($degrees as $d){
            echo htmlspecialchars($d) . "<br>";
        }
    } else {
        echo "No degree selected!";
    }
}
?>