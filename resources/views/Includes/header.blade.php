<head>
    <link href="{{ asset('bootstrap-5.3.3-dist/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark"> <a class="navbar-brand" href="{{ url('/') }}">IMS</a>
    <form action="{{ route('logout') }}" method="post"> @csrf <button class="btn btn-success my-2 my-sm-0"
            type="submit"> @if (session('user_email')) Logged in: {{ session('user_email') }} @else Login @endif
        </button> </form>
</nav>