<?php

if (!isset($_SESSION['permission_id'])) {
    header(header: "Location: login.php");
    exit();
}

$permissionId = $_SESSION['permission_id'];

