<?php 
include 'config.php';

$user = $_SESSION['user'];
$data = $_SESSION['users'][$user];
?>

<h2>Profile</h2>

Name: <?php echo $data['name']; ?><br>
Email: <?php echo $data['email']; ?><br>
Username: <?php echo $user; ?><br>