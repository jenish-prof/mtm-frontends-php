<?php
session_start();

// Check if the user is logged in, if not redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: s1.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
</head>
<body>
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>
    <p>This is a secure page protected by a PHP session.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
