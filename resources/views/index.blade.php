<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    @include('includes.header')

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
        <a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Login</a>
    </div>
</body>
<script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>

</html>