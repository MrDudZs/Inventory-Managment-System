<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="css/main.css" rel="stylesheet" />
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <div class="contaienr">
        <div class="header">
            <header>INV MGMT SYSTEM</header>
        </div>
        <div class="navbar">
            <nav></nav>
        </div>
        <div class="main">
            <main>
                <div class="container-sm">
                    <form action="php/Login/loginProcess.php" method="post">
                        <input class="loginInput" type="text" placeholder="Email" name="email" required>
                        <br />
                        <input class="loginInput" type="password" placeholder="password" name="password" required>
                        <br />
                        <input class="loginBtn" type="submit" value="Login">
                    </form>
                    <div class="formPasword">
                        <form action="php/Register/passwordResetProcess.php" method="post">
                            <br />
                            <input class="loginInput" type="email" name="emailRest" placeholder="email">
                            <br />
                            <input class="loginInput" type="password" name="passwordReset1" placeholder="Rest Password">
                            <br />
                            <input class="loginInput" type="password" name="passwordReset2" placeholder="Rest Password">
                            <br />
                            <input class="loginBtn" type="submit" value="Reset Password">
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
    </div>
</body>

</html>