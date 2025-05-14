<?php 
session_start();

if (!isset($_SESSION['username'])) {
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

$username = $_SESSION['username'];

// ✅ Retrieve Email from Database
$email_query = "SELECT email FROM user WHERE username = '$username'";
$email_result = mysqli_query($conn, $email_query);
$email_row = mysqli_fetch_assoc($email_result);
$current_email = $email_row ? $email_row['email'] : "Not set";

// ✅ Handle Email Update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email_change'])) {
    $new_email = mysqli_real_escape_string($conn, trim($_POST['email_change']));

    $update_query = "UPDATE user SET email = '$new_email' WHERE username = '$username'";
    if (mysqli_query($conn, $update_query)) {
        echo "<p style='color:green;'>Email updated successfully!</p>";
        $current_email = $new_email; // Update displayed email immediately
    } else {
        echo "<p style='color:red;'>Failed to update email.</p>";
    }
}
?>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?> with email: <?php echo htmlspecialchars($current_email); ?></h1>

<h2>Edit Profile:</h2>
<form method="POST" action="">
    <label>Update Email:</label>
    <input type="email" name="email_change" required><br><br>
    <input type="submit" value="Update">
</form>
