<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;

class InvoiceController extends Controller
{
    public function create() 
    {
        return view('createInvoice');
    }

    public function handleForm(Request $request) 
    {

    }

    public function fetchData(Request $request) 
    {
        $value = $request->input('value');
        $data = Stock::where('stockType', $value)->select('stockId', 'stockName')->get();

        return response()->json($data);
    }
}
