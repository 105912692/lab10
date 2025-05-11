<?php 
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> with password: <?php echo htmlspecialchars($_SESSION['password']); ?></h1>

<h2>Edit profile:</h2>
<h3>Test</h3>