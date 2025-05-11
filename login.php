<?php
    session_start();
    $host = "localhost";         // because XAMPP runs the server locally
    $username = "root";          // default username for XAMPP's MySQL
    $password = "";              // default password is empty in XAMPP
    $database = "user";  // replace with the actual name of your database
    $conn = mysqli_connect($host, $username, $password, $database);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $username = trim($_POST['username' ]);
    $password = trim($_POST['password' ]);

// Simple query to check credentials
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'"
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);

    if ($user) {
    $_SESSION['username' ] = $user ['username' ];
    header("Location: welcome.php");
    exit();
    } else {
    echo "Incorrect username or password.";
    }
?>