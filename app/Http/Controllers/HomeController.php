<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        // Require authentication for accessing controller
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }
}
