<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class ProductController extends Controller
{
    public function showNewProductForm()
    {
        $stockType = Stock::distinct()->pluck('stockType');

        return view('newProduct', compact('stockType'));
    }
    public function newProduct(Request $request)
    {
        $validated = $request->validate([
            'prodType' => 'required|string',
            'prodBrand' => 'required|string',
            'prodName' => 'required|string',
            'prodAmount' => 'required|integer|min:1|max:999',
        ]);

        $stock = Stock::where('stockType', $validated['prodType'])
            ->where('stockBrand', $validated['prodBrand'])
            ->where('stockName', $validated['prodName'])
            ->first();

        if ($stock) {
            $stock->stockCount += $validated['prodAmount'];
            $stock->save();
        }

        return redirect()->back()->with('success', 'Product stuck updated.');
    }

    public function getBrands(Request $request)
    {
        $type = $request->query('type');
        $brands = Stock::where('stockType', $type)->pluck('stockBrand')->unique();

        return response()->json($brands);
    }

    public function getNames(Request $request)
    {
        $brand = $request->query('brand');
        $name = Stock::where('stockBrand', $brand)->pluck('stockName')->unique();

        return response()->json($name);
    }
}
