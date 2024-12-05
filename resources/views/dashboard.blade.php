<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>

<body>
    <div class="header">
        <?php include "php/Includes/header.php"; ?>
    </div>
    <div class="dashboardDisplay">
        <main>
            <?php
            if ($permissionId == 1): ?>
                <?php include "php/Includes/clerkDashboard.php"; ?>
            <?php elseif ($permissionId == 2): ?>
                <?php include "php/Includes/adminDashboard.php"; ?>
            <?php else: ?>
                <?php
                // This Section will end if the permissionId is no longer set for user
                session_destroy();
                header(header: "Location: login.php");
                exit();
                ?>
            <?php endif; ?>
        </main>
    </div>
</body>

<script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>

</html>