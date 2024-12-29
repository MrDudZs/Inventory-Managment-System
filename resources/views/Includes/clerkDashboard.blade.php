<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="{{ asset(path: 'bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset(path: 'css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="header">
        @include('../includes.header')
    </div>
    <div class="container">
        <div class="row">
            <div class="col custom-dash-cols">
                <h4>User:</h4>
                <hr>
                <div class="d-grid gap-2">
                    <label>ID: <span>{{ $user->id }}</span></label>
                    <label>Name: <span>{{ $user->first_name }} {{ $user->surname }}</span></label>
                    <label>Location: <span>{{ $user->location }}</span></label>
                    <label>Department: <span>{{ $department }}</span></label>
                </div>
                </div>
                <div class="col custom-dash-cols">
                    <h4>Low Stock:</h4>
                    <hr>
                    @foreach ($lowStocks as $stock)
                        <p>{{ $stock->stockBrand }}, {{ $stock->stockName }}. Stock left: {{ $stock->stockCount }}</p>
                    @endforeach
                </div>
                <div class="col custom-dash-cols">
                    <h4>Invoices:</h4>
                    <hr>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn-dashboard"
                            onclick='window.location.href = "{{ url('createInvoice') }}"'>Create Invoice</button>
                        <button type="button" class="btn-dashboard"
                            onclick='window.location.href = "{{ url('invoiceHistory') }}"'>Invoice History</button>
                    </div>
                </div>
                <div class="col custom-dash-cols">
                    <h4>Products:</h4>
                    <hr>
                    <div class="d-grid gap-2">
                        <button type="button" class="btn-dashboard"
                            onclick='window.location.href = "{{ url('categories') }}"'>Categories</button>
                        <button type="button" class="btn-dashboard"
                            onclick='window.location.href = "{{ url('search') }}"'>Search</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-4 custom-dash-cols">
                    <h4>This Week:</h4>
                    <hr>
                    <div class="stockStats">
                        <p class="productSoldStat">Product Sold: £{{ $salesWeek }}</p>
                    </div>
                    <hr>
                    <h4>This Month:</h4>
                    <hr>
                    <div class="stockStats">
                        <p class="productSoldStat">Product Sold: £{{ $salesMonth }}</p>
                    </div>
                </div>
            </div>
        </div>
</body>

<script src="{{ asset(path: 'bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>

</html>