<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stock;

class CategoryController extends Controller
{
    public function index() 
    {
        return view('categories');
    }

    public function handleForm(Request $request) 
    {
        $validatedData = $request->validate([
            'stockType' => 'required|string',
        ]);

        $data = stock::where('stockType', $validatedData['stockType'])->get();

        return view('/inventory', ['data' => $data]);
    }
}
