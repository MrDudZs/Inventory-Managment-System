<?php
session_start();

// Unset session
$_SESSION = [];

// Destroy session
session_destroy();

header("Location: ../../login.php");
exit;
?>
