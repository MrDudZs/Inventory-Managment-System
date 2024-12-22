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
    <div class="dashboardDisplay">
        <main>
            @if ($permissionId == 1)
                @include('../includes.clerkDashboard')
            @elseif ($permissionId == 2)
                @include('../includes.adminDashboard')
            @else
                {{ session()->flush() }}
                <script>
                    window.location.href = "{{ url(path: '/login') }}";
                </script>
            @endif
        </main>
    </div>
</body>

<script src="{{ asset(path: 'bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>

</html>