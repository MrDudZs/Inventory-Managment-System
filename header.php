<head>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">IMS</a>
    <?php
    /*for the backend devs, need an if statement to see if user is logged in. Going to keep the
    e.g.
    if(loggedIn){
        show logout button
    }
    else{
        show login button
    }

    keeping both buttons below(I hope which one is which is obvious) so you just need to copy paste
    */
    ?>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Login</button>
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button>
</nav>