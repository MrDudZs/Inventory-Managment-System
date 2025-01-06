<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                <h4>Generate Reports:</h4>
                <hr>
                <div class="d-grid gap-2">
                    <button type="button" class="btn-dashboard" id="stock-report">Inventory levels</button>
                    <button type="button" class="btn-dashboard" id="avg-sales-history">Average stock levels</button>
                </div>
            </div>

            <div class="col custom-dash-cols">
                <h4>Products:</h4>
                <hr>
                <div class="d-grid gap-2">
                    @include('../includes.addStock', ['stockTypes' => $stockType])
                    @include('../includes.removeStock', ['stockTypes' => $stockType])
                    @include('../includes.addProduct', ['stockTypes' => $stockType])
                    @include('../includes.manageProducts', ['stockTypes' => $stockType])
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 col-md-4 custom-dash-cols">
                <h4>History: </h4>
                <hr>
                <div class="d-grid gap-2">
                    <button type="button" id="invoiceHistory" class="btn-dashboard">Invoices</button>
                    <button type="button" id="stockReportHistory" class="btn-dashboard">Stock - Sales</button>
                    <button type="button" id="salesReportHistory" class="btn-dashboard">Avg Sales Reports</button>
                </div>
            </div>
            <div class="col custom-dash-cols">
                <h4>Invoices:</h4>
                <hr>
                <div class="d-grid gap-2">
                    <button type="button" class="btn-dashboard"
                        onclick='window.location.href = "{{ url('create-invoice') }}"'>
                        Create Invoice
                    </button>
                </div>
            </div>
            <div class="col custom-dash-cols">
                <h4>This Week:</h4>
                <hr>
                <div class="stockStats">
                    <p class="productSoldStat">Product Sold: £{{ $cumulativeSalesWeek }}</p>
                    <p class="averageStockStat">Avg Stock: {{ $averageStockWeek }}</p>
                </div>
                <hr>
                <h4>This Month:</h4>
                <hr>
                <div class="stockStats">
                    <p class="productSoldStat">Product Sold: £{{ $cumulativeSalesMonth }}</p>
                    <p class="averageStockStat">Avg Stock: {{ $averageStockMonth }}</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col custom-dash-cols">
                <h4>Low Stock:</h4>
                <hr>
                @foreach($lowStocks as $stock) 
                    <p>{{ $stock->stockBrand }}, {{ $stock->stockName }}. Stock left: {{ $stock->stockCount }}</p>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-7-5 custom-dash-cols">
                <h4>Stock Level - Stock Sold:</h4>
                <div class="d-grid gap-2">
                    <canvas id="barChart" width="50" height="25"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-7-5 custom-dash-cols">
                <h4>Average Stock - Average Sold</h4>
                <div class="d-grid gap-2">
                    <canvas id="doughnutChart"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col custom-dash-cols">
                <h4>Create User:</h4>
                <hr>
                <div class="d-grid gap-2">
                    <a href="{{ route('register') }}" class="btn btn-light">Create User</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset(path: 'bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/donutchart.js') }} "></script>
    <script src="{{ asset('js/barchart.js') }}"></script>
    <script src="{{ asset('js/stockReport.js') }}"></script>
    <script src="{{ asset('js/salesAvgReport.js')}}"></script>
    <script>
        document.getElementById('stockReportHistory').addEventListener('click', function () {
            window.location.href =
                " {{ url('/stock-history') }}";
        });
        document.getElementById('salesReportHistory').addEventListener('click', function () {
            window.location.href = "{{ url('/avg-sales-history') }}";
        });

        document.getElementById('invoiceHistory').addEventListener('click', function () {
            window.location.href = "{{ url('/invoice-history') }}";
        }); 
    </script>
</body>

</html>