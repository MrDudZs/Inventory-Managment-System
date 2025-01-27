<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Invoice</title>
    <link href="css/main.css" rel="stylesheet" />
</head>
<body>
    @include('../includes.header')

    <main>
        <br>
        <div class="container">
        @include('../includes.backToDashboard')
            <br>
            <form action="{{ route('handle-invoice') }}" method="post" class="productForm">
                @csrf
                <div class="d-grid gap-2 col-6 mx-auto">
                    <input type="submit" value="Create Invoice" class="btn btn-custom btn-create">
                </div>
                <br>
                <h2 class="btn-custom" style="padding: 7px; background-color: var(--med-bg); color: var(--text-bg)">New Invoice</h2>
                <h6 style="padding: 5px; background-color: var(--header-bg); color: var(--text-bg)">Customer Details:</h6>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full name" aria-label="Full name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" id="customerEmail" name="customerEmail" placeholder="Email Address" aria-label="Email Address" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="customerAddress1" name="customerAddress1" placeholder="Address Line 1" aria-label="Address Line 1" required>
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="customerAddress2" name="customerAddress2" placeholder="Address Line 2" aria-label="Address Line 2">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="city" name="city" placeholder="City" aria-label="City" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode" aria-label="Postcode" required>
                    </div>
                </div>
                <br>
                <h6 style="padding: 5px; background-color: var(--header-bg); color: var(--text-bg)">Product Orders:</h6>
                <div class="row">
                    <div class="col-md-4">
                        <select class="form-select" id="category_0" aria-label="Select Product Category" name="products[0][category]" required>
                            <option value="" selected>Select Category:</option>
                            <option value="Keyboard">Keyboards</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Speakers">Speakers</option>
                            <option value="Microphone">Microphone</option>
                            <option value="Headset">Headset</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <select class="form-select productDropdown" id="product_0" aria-label="Select Product" name="products[0][product]" required>
                            <option value="" selected>Select Product:</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <input type="number" class="form-select" id="quantity_0" aria-label="Select Quantity" name="products[0][quantity]" placeholder="Quantity:" min=1 step=1 required>
                    </div>
                </div>
                <br>
                <button type="button" class="btn btn-custom btn-add">Add Product</button>
                <button type="button" class="btn btn-outline-danger btn-remove">Remove Product</button>
                <br><br>
            </form>
        </div>
        <br><br>
    </main>
</body>
<script src="{{ asset('js/invoiceForm.js') }}"></script>
</html>