<head>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">IMS</a>
    <form action="php/Redirect/logout.php" method="post">
        <button class="btn btn-success my-2 my-sm-0" type="submit">
            <?php

            // Check if the user is logged in
            if (isset($_SESSION['user_email'])) {
                echo "Logged in:" . $_SESSION['user_email'];
            } else {
                echo "Login";
            }
            ?>
        </button>
    </form>
</nav>