<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stock Report History</title>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="header">
        @include('../includes.header')
    </div>
    <div class="container">

        <a href="{{ route('admin.dashboard') }}" class="btn btn-light">
            << Back to Dashboard</a>
                <div class="row">
                    <div class="col custom-dash-cols">
                        <h4>Stock Level - Stock Sales History:</h4>
                        <hr>
                        <form method="GET" action="{{ url('/stock-history') }}">
                            <label for="stock_type">Stock Type:</label>
                            <select name="stock_type" id="stock_type">
                                <option value="">All</option>
                                @foreach ($stockReports->pluck('stock_type')->unique() as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>

                            <label for="month">Month:</label>
                            <select name="month" id="month">
                                <option value="">All</option>
                                @for ($i = 1; $i <= 12; $i++)
                                    <option value="{{ $i }}">
                                        {{ DateTime::createFromFormat('!m', $i)->format('F') }}
                                    </option>
                                @endfor
                            </select>
                            <button type="submit">Filter</button>
                        </form>
                        <hr>
                        <div class="d-grid gap-2">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Report Generated</th>
                                        <th>Generation Time</th>
                                        <th>Stock Type</th>
                                        <th>Stock Level</th>
                                        <th>Sales Level</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($stockReports as $report)
                                        <tr>
                                            <td>{{ $report->report_generated }}</td>
                                            <td>{{ $report->generation_time }}</td>
                                            <td>{{ $report->stock_type }}</td>
                                            <td>{{ $report->stock_level }}</td>
                                            <td>{{ $report->sales_level }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
    </div>

    <script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>
</body>

</html>