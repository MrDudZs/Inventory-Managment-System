<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avg Sales History</title>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>

<body>
    <div class="header">
        @include('../includes.header')
    </div>
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-light">Back to Dashboard</a>
        <div class="row">
            <div class="col custom-dash-cols">
                <h4>Avg Stock - Sales History:</h4>
                <hr>
                <form method="GET" action="{{ url('/avg-sales-history') }}">
                    <label for="month">Month:</label>
                    <select name="month" id="month">
                        <option value="">All</option>
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}">{{ DateTime::createFromFormat('!m', $i)->format('F') }}</option>
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
                                <th>Total Avg Levels</th>
                                <th>Total Avg Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($salesAvgReports as $report)
                                <tr>
                                    <td>{{ $report->report_generated }}</td>
                                    <td>{{ $report->generation_time }}</td>
                                    <td>{{ $report->total_avg_levels }}</td>
                                    <td>{{ $report->total_avg_sales }}</td>
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