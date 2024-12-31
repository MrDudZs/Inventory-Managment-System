<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    @include('../includes.header')
    <main>
        <br>
        <a href="{{ route('dashboard') }}" class="btn btn-light"><< Back to Dashboard</a>

        <br>
        <div class="container p-3 my-3 bg-white" id="content">
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
        <div id="page"></div>
        <button id="submit" type="submit" class="btn btn-custom">Create Invoice PDF</button>
        <br><br>
    </main>
</body>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js'></script>
<script>
    var doc = new jsPDF(); 
    var specialElementHandlers = { 
        '#editor': function (element, renderer) { 
            return true; 
        } 
    };
    $('#submit').click(function () { 
        doc.fromHTML($('#content').html(), 15, 15, { 
            'width': 250, 
            'elementHandlers': specialElementHandlers 
        }); 

        var pdf = doc.output('blob');
        var formData = new FormData();
        formData.append('pdf', pdf);

        fetch('/submit-invoice', {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            alert('PDF successfully saved');
        })
        .catch(error => {
            alert('Error saving PDF');
        });
    });
</script>
</html>