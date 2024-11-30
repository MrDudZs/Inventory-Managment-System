<?php
// // Saw this in a tutorial not sure if its needed or not.
// use Illuminate\Http\Request;

// define('LARAVEL_START', microtime(true));

// // Determine if the application is in maintenance mode...
// if(file_exists($maintenance = __DIR__.'/../storage/framework/maintenance.php')) {
//     require $maintenance;
// }

// // Register the Composer autoloader...
// require __DIR__.'/../vendor/autoload.php';

// // Boostrap Laravel and handle the request...
// (require_once __DIR__.'/../bootstrap/app.php')
//     ->handleRequest(Request::capture());
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <?php
    include("php/includes/header.php");
    ?>
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/mouse.jpg" class="d-block w-100" alt="">
            </div>
            <div class="carousel-item">
                <img src="images/keyboard.jpg" class="d-block w-100" alt="">
            </div>
        </div>
    </div>
    <div class="d-grid col-6 mx-auto">
        <a class="btn btn-success btn-lg" href="login.php" role="button">Login</a>
    </div>
</body>
<script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>

</html>