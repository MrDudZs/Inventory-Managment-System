<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <!-- <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" /> -->
</head>
<body>
    @include('../includes.header')
    <main>
        <br>
        <a href="{{ route('dashboard') }}" class="btn btn-light"><< Back to Dashboard</a>

        <br>
        <div class="container p-3 my-3 bg-white">
            <div class="customer-data">
                <h2>Invoice</h2>
                <h4>Customer Information</h4>
                <p>{{ $customerData['fullName'] }}</p>
                <p>{{ $customerData['customerEmail'] }}</p>
                <p>{{ $customerData['customerAddress1'] }}</p>
                <p>{{ $customerData['customerAddress2'] }}</p>
                <p>{{ $customerData['city'] }}</p>
                <p>{{ $customerData['postcode'] }}</p>
            </div>
            <br>
            <div class="product-data">
                <h4>Selected Products</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">QTY</th>
                            <th scope="col">Product</th>
                            <th scope="col">Unit Price</th>
                            <th scope="col">Amount</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @foreach ($productData as $product)
                            <tr>
                                <th scope="row">{{ $product->quantity }}</th>
                                <th>{{ $product->name }}</th>
                                <th>£{{ $product->price }}</th>
                                <th>£{{ $product->total }}</th>
                            </tr>
                        @endforeach
                        <tr class="table-group-divider">
                            <th scope="row"></th>
                            <th></th>
                            <th>Sub Total:</th>
                            <th>£{{ $totalData['subTotal'] }}</th>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <th></th>
                            <th>Sales Tax:</th>
                            <th>£{{ $totalData['salesTax'] }}</th>
                        </tr>
                        <tr>
                            <th scope="row"></th>
                            <th></th>
                            <th>Total:</th>
                            <th>£{{ $totalData['total'] }}</th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-grid gap-2 col-6 mx-auto">
            <form action="{{ route('submit-invoice') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-custom">Save Invoice</button>
            </form>
        </div>
        <br><br>
    </main>
</body>
</html>