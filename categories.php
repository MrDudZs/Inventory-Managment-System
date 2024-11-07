<?php
    
?>
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
            <div class="container">
                <div class="searchBox">
                    <form action="">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon1">Search:</span>
                            <input type="text" class="form-control" placeholder="Product ID / Name" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </form>
                </div>
                <div class="container px-4 text-center">
                    <div class="row gx-5">
                        <div class="col catg-cols">
                            <h3>Keyboard</h3>
                        </div>
                        <div class="col catg-cols">
                            <h3>Mouse</h3>
                        </div>
                        <div class="col catg-cols">
                            <h3>Cables</h3>
                        </div>
                    </div>
                    <div class="row gx-5">
                        <div class="col catg-cols">
                            <h3>Microphone</h3>
                        </div>
                        <div class="col catg-cols">
                            <h3>Lighting</h3>
                        </div>
                        <div class="col catg-cols">
                            <h3>Connectors</h3>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </body>
    <script src="bootstrap-5.3.3-dist/js/bootstrap.js"></script>
</html>