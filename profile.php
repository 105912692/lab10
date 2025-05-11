<?php 
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}
?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> with password: <?php echo htmlspecialchars($_SESSION['password']); ?></h1>

<h1?>Edit profile:</h1>
<br>
<h2>Test</h2>