<?php 
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> with password: <?php echo htmlspecialchars($_SESSION['password'])?></h1>

