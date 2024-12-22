<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    @include('../includes.header')
    <main>
        <br><br>
        <div class="container-sm container-custom" id="loginForm">
            <h1>LOGIN</h1>
            <hr>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <input class="form-control" id="exampleFormControlInput1" type="email" placeholder="Username"
                    name="email" required>
                <br />
                <input class="form-control" id="inputPassword5" type="password" placeholder="Password" name="password"
                    required>
                <button class="btn-link" id="resetPassword" type="button"><u>Forgotten Password?</u></button>
                <br /><br>
                <input class="btn btn-custom" type="submit" value="LOGIN">
            </form>
        </div>
        <div class="collapse container-sm container-custom" id="collapsePassword">
            <button class="btn-link" id="backtologin" type="button">
                << Back to Login</button>
                    <h2>Reset Password</h2>
                    <hr>
                    <form action="{{ route('password.email') }}" method="post">
                        @csrf
                        <input class="form-control" type="email" name="email" placeholder="Username" required>
                        <br />
                        <input class="btn btn-custom" type="submit" value="Reset Password">
                    </form>
        </div>
        <br><br>
    </main>
</body>
<script src="{{ asset('js/ux.js') }}"></script>
<script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>

</html>