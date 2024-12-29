<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use App\Models\StoreAndWearhouse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    use RegistersUsers;

    // Redirect users after registration.
    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'first_name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'dob' => ['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_name' => ['required', 'string'],
        ]);
    }

    protected function create(array $data)
    {
        $role = Role::where('name', $data['role_name'])->first();
        $permission_level = $role->name == 'admin' ? 2 : 1;

        return User::create([
            'email' => $data['email'],
            'first_name' => $data['first_name'],
            'surname' => $data['surname'],
            'dob' => $data['dob'],
            'password' => Hash::make(value: $data['password']),
            'permission_level' => $permission_level,
        ]);
    }

    public function showRegistrationForm()
    {
        $roles = Role::all();
        $locations = StoreAndWearhouse::pluck('location_name');
        return view('auth.register', compact('roles', 'locations'));
    }
}
