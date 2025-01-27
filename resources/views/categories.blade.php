<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>
    <body>
    <div class="header">
        @include('../includes.header')
    </div>
        <main>
            <br><br>
            <div class="container">
                <a href="{{ route('clerk.dashboard') }}" class="btn btn-light"><< Back to Dashboard</a>
                <br><br>
                <form action="{{ route('submit-category') }}" method="post">   
                    @csrf
                    <div class="row text-center">
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Keyboard">
                                <input class="form-check-input" name="category" type="radio" value="Keyboard" id="Keyboard">
                                Keyboard
                            </label>
                        </div>
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Mouse">
                                <input class="form-check-input" name="category" type="radio" value="Mouse" id="Mouse">
                                Mouse
                            </label>
                        </div>
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Headset">
                                <input class="form-check-input" name="category" type="radio" value="Headset" id="Headset">                            
                                Headset
                            </label>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Microphone">
                                <input class="form-check-input" name="category" type="radio" value="Microphone" id="Microphone">
                                Microphone
                            </label>
                        </div>
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Lights">
                                <input class="form-check-input" name="category" type="radio" value="Speakers" id="Speakers">
                                Speakers
                            </label>
                        </div>
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Connectors">
                                <input class="form-check-input" name="category" type="radio" value="Monitor" id="Monitor">                            
                                Monitors
                            </label>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="allProducts">
                                <input class="form-check-input" name="category" type="radio" value="allProducts" id="allProducts">
                                All Products
                            </label>
                        </div>
                    </div>
                    <br>
                    <div class="d-grid gap-2 col-6 mx-auto">
                        <input type="submit" value="Search" class="btn btn-custom">
                    </div>
                </form>
            </div>
        </main>
    </body>
</html>