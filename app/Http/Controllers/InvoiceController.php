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
        $validatedData = $request->validate([
            'fullName' => 'required|string',
            'customerEmail' => 'required|email',
            'customerAddress1' => 'required|string',
            'customerAddress2' => 'nullable|string',
            'city' => 'required|string',
            'postcode' => 'required|string|min:5',

            'products' => 'required|array',
            'products.*.product' => 'required|string|exists:stock,stockName',
            'products.*.quantity' => 'required|integer|min:1',
        ]);

        $selectedProduct = $validatedData['products'];
        $productData = [];

        foreach ($selectedProduct as $product) {
            $productD = Stock::where('stockName', $product['product'])->select('stockID', 'stockPrice')->first();
            $productD->name = $product['product'];
            $productD->quantity = $product['quantity'];
            $productD->id = $productD['stockID'];
            $productD->price = $productD['stockPrice'];
            $productD->total = $productD->quantity * $productD->price;
            $productData[] = $productD;
        }

        $subTotal = 0;
        foreach ($productData as $product) {
            $subTotal += $product->price;
        }

        $totalData = [
            'subTotal' => $subTotal,
            'salesTax' => $subTotal / 5,
            'total' => $subTotal + $subTotal / 5,
        ];

        $customerData = [
            'fullName' => $validatedData['fullName'],
            'customerEmail' => $validatedData['customerEmail'],
            'customerAddress1' => $validatedData['customerAddress1'],
            'customerAddress2' => $validatedData['customerAddress2'],
            'city' => $validatedData['city'],
            'postcode' => $validatedData['postcode'],
        ];

        return view('generatePDF', [
            'customerData' => $customerData,
            'productData' => $productData,
            'totalData' => $totalData,
        ]);
    }

    public function fetchData(Request $request) 
    {
        $value = $request->input('value');
        $data = Stock::where('stockType', $value)->select('stockId', 'stockName')->get();

        return response()->json($data);
    }
}
