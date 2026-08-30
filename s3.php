<?php
session_start();
// Clear session data and destroy session
$_SESSION = array();
session_destroy();

header("Location: s1.php");
exit;
?>
