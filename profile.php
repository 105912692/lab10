<?php 
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: login.php");
    exit();
}

$host = "localhost";
$db_username = "root";
$db_password = "";
$database = "user";

$conn = mysqli_connect($host, $db_username, $db_password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email_change'])) {
    $new_email = mysqli_real_escape_string($conn, trim($_POST['email_change']));
    $username = $_SESSION['username'];

    $update_query = "UPDATE user SET email = '$new_email' WHERE username = '$username'";
    if (mysqli_query($conn, $update_query)) {
        echo "<p'>Email updated successfully!</p>";
    } else {
        echo "<p>Failed to update email.</p>";
    }
}

?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> with password: <?php echo htmlspecialchars($_SESSION['password']); ?></h1>

<h2>Edit profile:</h2>
<form method="POST" action="">
    <label>Update email:</label>
    <input type="text" name="email_change" required><br><br>
    <input type="submit" value="Update">
</form>