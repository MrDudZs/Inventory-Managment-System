<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

</head>
    <body>
    <?php
            include("header.php");
        ?>
        <main>
            <div class="container text-center">
                <form action="" method="post" class="category-form">                        
                    <div class="row text-center">
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Keyboard">
                                <input class="form-check-input" type="checkbox" value="Keyboard" id="Keyboard">
                                Keyboard
                            </label>
                        </div>
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Mouse">
                                <input class="form-check-input" type="checkbox" value="Mouse" id="Mouse">
                                Mouse
                            </label>
                        </div>
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Cables">
                                <input class="form-check-input" type="checkbox" value="Cables" id="Cables">                            
                                Cables
                            </label>
                        </div>
                    </div>

                    <div class="row text-center">
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Microphone">
                                <input class="form-check-input" type="checkbox" value="Microphone" id="Microphone">
                                Microphone
                            </label>
                        </div>
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Lights">
                                <input class="form-check-input" type="checkbox" value="Lights" id="Lights">
                                Lighting
                            </label>
                        </div>
                        <div class="form-check col catg-cols">
                            <label class="form-check-label" for="Connectors">
                                <input class="form-check-input" type="checkbox" value="Connectors" id="Connectors">                            
                                Connectors
                            </label>
                        </div>
                    </div>
                    <input type="submit" value="Search" class="btn btn-custom">
                </form>
            </div>
        </main>
    </body>
</html>