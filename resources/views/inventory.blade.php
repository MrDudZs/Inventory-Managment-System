<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventory</title>
    <link href="bootstrap-5.3.3-dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
</head>
    <body>
        @include('../includes.header')

        <main>
            <br><br>
            <div class="container">
                <a href="/categories" class="btn btn-light"><< Back to Categories</a>
                <a href="dashboard.php" class="btn btn-light"><< Back to Dashboard</a>
                <br><br>
                @php 
                    $count = 0;
                @endphp
                
                @foreach($data as $item) 
                    @if($count % 3 == 0)
                        <div class="row">
                    @endif

                    <div class="col-md-4 mb-4">
                        <div class="card" style="width: 100%; height: 16rem;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $item->stockName }}</h5>
                                <h6 class="card-subtitle mb-2 text-body-secondary\">ID: {{ $item->stockID }}</h6>
                                <p class="card-text">Category: {{ $item->stockType }}</p>
                                <p class="card-text">Brand: {{ $item->stockBrand }}</p>
                                <p class="card-text">Price: £{{ $item->stockPrice }}</p>
                                <p class="card-text">{{ $item->stockCount }} - In Stock</p>
                            </div>
                        </div>
                    </div>

                    @php
                        $count++;
                    @endphp

                    @if($count % 3 == 0) 
                        </div>  
                    @endif
                @endforeach

                @if($count % 3 != 0)
                    </div>
                @endif
            </div>
        </main>
    </body>

</html>