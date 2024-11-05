<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="css/main.css" rel="stylesheet" />
    </head>

    <body>
        <?php

        ?>
        <main>
            <br><br>
            <div class="container-sm container-custom">
                <h1>LOGIN</h1>
                <hr>
                <form action="php/Login/loginProcess.php" method="post">
                    <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="Username" name="email" required>
                    <br />
                    <input class="form-control" id="inputPassword5" type="password" placeholder="Password" name="password" required>
                    <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><u>Forgotten Password?</u></button>
                    <br />
                    <input class="btn btn-custom" type="submit" value="LOGIN">
                </form>
            </div>
            <br>
            <div class="collapse container-sm container-custom" id="collapseExample">
                <h2>Reset Password</h2>
                <hr>
                <form action="php/Register/passwordResetProcess.php" method="post">
                    <input class="form-control" type="email" name="emailRest" placeholder="Username">
                    <br />
                    <input class="form-control" type="password" name="passwordReset1" placeholder="New Password">
                    <br />
                    <input class="form-control" type="password" name="passwordReset2" placeholder="Confrim New Password">
                    <br />
                    <input class="btn btn-custom" type="submit" value="Reset Password">
                </form>
            </div>
            <br><br>
        </main>
    </body>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</html>