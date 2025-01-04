<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    @include('../includes.header')
    <main>
        <br><br>
        <div class="container">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-light">Back to Dashboard</a>
            <div class="row">
                <div class="col custom-dash-cols">
                    <h4>Create Account</h4>
                    <hr>
                    <div class="d-grid gap-2">
                        <div class="loginForm">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form action="{{ route('register') }}" method="post">
                                @csrf
                                <input class="input" type="text" name="first_name" placeholder="First Name"
                                    value="{{ old('first_name') }}" required>
                                <br>
                                <input class="input" type="text" name="surname" placeholder="Surname"
                                    value="{{ old('surname') }}" required>
                                <br>
                                <input class="input" type="email" name="email" placeholder="Email"
                                    value="{{ old('email') }}" required>
                                <br>
                                <input class="input" type="password" name="password" placeholder="Password" required>
                                <br>
                                <input class="input" type="password" name="password_confirmation"
                                    placeholder="Confirm Password" required>
                                <br>
                                <input class="input" type="date" name="dob" value="{{ old('dob') }}" required>
                                <br>
                                <select class="input" name="role_name" required>
                                    <option value="">Select Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <select class="input" name="location" required>
                                    <option value="">Select Location</option>
                                    @foreach ($locations as $StoresAndWearhouse)
                                        <option value="{{ $StoresAndWearhouse }}">{{ $StoresAndWearhouse }}</option>
                                    @endforeach
                                </select>
                                <br>
                                <input class="button" type="submit" value="Register">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
<script src="{{ asset('js/ux.js') }}"></script>
<script src="{{ asset('bootstrap-5.3.3-dist/js/bootstrap.js') }}"></script>

</html>