<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link href="{{ asset(path: 'bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset(path: 'css/main.css') }}" rel="stylesheet" />
</head>

<body>
    @include('includes.header')

    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators"> <button type="button" data-bs-target="#carousel" data-bs-slide-to="0"
                class="active" aria-current="true" aria-label="Slide 1"></button> <button type="button"
                data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button> <button type="button"
                data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button> <button type="button"
                data-bs-target="#carousel" data-bs-slide-to="3" aria-label="Slide 4"></button> <button type="button"
                data-bs-target="#carousel" data-bs-slide-to="4" aria-label="Slide 5"></button> </div>
        <div class="carousel-inner">
            <div class="carousel-item active"> <img src="images/mouse.webp" class="d-block w-100" alt="Mouse"> </div>
            <div class="carousel-item"> <img src="images/keyboard.webp" class="d-block w-100" alt="Keyboard"> </div>
            <div class="carousel-item"> <img src="images/microphone.webp" class="d-block w-100" alt="Microphone"> </div>
            <div class="carousel-item"> <img src="images/headset.webp" class="d-block w-100" alt="Headset"> </div>
            <div class="carousel-item"> <img src="images/monitor.webp" class="d-block w-100" alt="Monitor"> </div>
        </div> <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span
                class="visually-hidden">Previous</span> </button> <button class="carousel-control-next" type="button"
            data-bs-target="#carousel" data-bs-slide="next"> <span class="carousel-control-next-icon"
                aria-hidden="true"></span> <span class="visually-hidden">Next</span> </button>
    </div>
    <br>
    <div class="d-grid col-6 mx-auto">
        <a class="btn btn-success btn-lg" href="{{ route('login') }}" role="button">Login</a>
    </div>
</body>
<script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>

</html>