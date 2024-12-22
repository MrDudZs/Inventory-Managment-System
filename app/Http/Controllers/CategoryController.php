<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;

class CategoryController extends Controller
{
    public function index() 
    {
        return view('categories');
    }

    public function handleForm(Request $request) 
    {
        $validatedData = $request->validate([
            'category' => 'required|in:Keyboard,Mouse,Headset,Microphone,Speakers,Monitor,allProducts',
        ]);

        if ($validatedData['category'] == 'allProducts') {
            $data = Stock::all();
        }
        else {
            $data = Stock::where('stockType', $validatedData['category'])->get();
        }

        if ($data->isEmpty()) {
            $data = Stock::all();
        }

        return view('inventory', ['data' => $data]);
    }
}
