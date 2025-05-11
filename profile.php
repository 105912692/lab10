<?php 
    session_start();
    header(!isset($_SESSION['username'])) {
        header("Location: login.php")
        exit();
    }
?>

<h1> Welcome, <?php echo $_SESSION['username']; ?></h1>