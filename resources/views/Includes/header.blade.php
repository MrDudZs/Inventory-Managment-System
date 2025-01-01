<head>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark justify-content-between">
    <a class="navbar-brand ms-2" href="{{ route('index') }}">IMS</a>
    @if (Auth::check())
        <form action="{{ route('logout') }}" method="post" class="d-inline">
            @csrf
            <button class="btn btn-success my-2 my-sm-0 me-2" type="submit">
                Logout: {{ Auth::user()->email }}
            </button>
        </form>
    @else
        <a class="btn btn-success my-2 my-sm-0 me-2" href="{{ route('login') }}">Login</a>
    @endif
</nav>