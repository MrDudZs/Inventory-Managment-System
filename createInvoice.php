<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Invoice</title>
    <link href="css/main.css" rel="stylesheet" />
</head>
<body>
    <?php
        include("php/Includes/header.php");
    ?>
    <main>
        <br><br>
        <div class="container table-container">
            <form action="" method="post">
                <br>
                <h6>Customer Details:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="fullName" placeholder="Full name" aria-label="Full name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="customerEmail" placeholder="Email Address" aria-label="Email Address" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="customerAddress1" placeholder="Address Line 1" aria-label="Address Line 1" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="customerAddress2" placeholder="Address Line 2" aria-label="Address Line 2">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="city" placeholder="City" aria-label="City" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="postcode" placeholder="Postcode" aria-label="Postcode" required>
                    </div>
                </div>
                <br>
                <h6>Add Products:</h6>
                <div class="row add-product-row">
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Select Product Category" required>
                            <option selected>Select Category:</option>
                            <option value="Keyboard">Keyboards</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Speakers">Speakers</option>
                            <option value="Microphone">Microphone</option>
                            <option value="Headset">Headset</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Select Product" required>
                            <option selected>Select Product:</option>
                            <option value="Keyboard">Keyboards</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select" aria-label="Select Quantity" required>
                            <option selected>Select Quantity:</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-custom">Add Product</button>
            </form>
        </div>
    </main>
</body>
</html>