<?php

session_start();

if (!isset($_SESSION['permission_id'])) {
    header(header: "Location: login.php");
    exit();
}

$permissionId = $_SESSION['permission_id'];

switch ($permissionId) {
    case 1:
        header(header: "Location: ../../dashboard.php");
        break;
    case 2:
        header(header: "Location: ../../dashboard.php");
        break;
    default:
        session_destroy();
        header(header: "Location: ../../login.php");
        break;
}
exit();
?>

<!-- Summary:
This section is for ending the session early if the user ID is not set correctly 
-->