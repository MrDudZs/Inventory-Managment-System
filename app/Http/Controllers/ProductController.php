<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;

class ProductController extends Controller
{
    /**
     * Summary of showNewProductForm
     * @return \Illuminate\Contracts\View\View
     */
    public function showNewProductForm()
    {
        $stockType = Stock::distinct()->pluck('stockType');

        return view('newProduct', compact('stockType'));
    }

    /**
     * Summary of newProduct
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addStock(Request $request)
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

        return redirect()->back()->with('success', 'Product stock updated.');
    }
    public function removeStock(Request $request)
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
            if ($validated['prodAmount'] > $stock->stockCount) {
                return redirect()->back()->with('error', 'The amount of stock to be removed exceeds the available stock.');
            }

            $stock->stockCount -= $validated['prodAmount'];
            $stock->save();

            return redirect()->back()->with('success', 'Product stock updated.');
        }

        return redirect()->back()->with('error', 'Product not found.');
    }

    /**
     * Summary of getBrands
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function getBrands(Request $request)
    {
        $type = $request->query('type');
        $brands = Stock::where('stockType', $type)->pluck('stockBrand')->unique();

        return response()->json($brands);
    }
    /**
     * Summary of getNames
     * @param \Illuminate\Http\Request $request
     * @return mixed|\Illuminate\Http\JsonResponse
     */
    public function getNames(Request $request)
    {
        $brand = $request->query('brand');
        $name = Stock::where('stockBrand', $brand)->pluck('stockName')->unique();

        return response()->json($name);
    }

    /**
     * Summary of showManageProductForm
     * @return \Illuminate\Contracts\View\View
     */
    public function showManageProductForm()
    {
        $stockType = Stock::distinct()->pluck('stockType');

        return view('manageProduct', compact('stockType'));
    }


    /**
     * Summary of manageProduct
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addProduct(Request $request){
        $validated = $request->validate([
            'prodType' => 'required|string',
            'prodBrand' => 'required|string',
            'prodName' => 'required|string',
            'prodPrice' => 'required|numeric|min:0',
        ]);

        $stock = new Stock();
        $stock->stockType = $validated['prodType'];
        $stock->stockBrand = $validated['prodBrand'];
        $stock->stockName = $validated['prodName'];
        $stock->stockPrice = $validated['prodPrice'];
        $stock->stockCount = 1;
        $stock->save();
        
        return redirect()->back()->with('success', 'Product added.');
    }
    public function manageProduct(Request $request)
    {

    }

    public function sales()
    {
        $dashboardController = new DashboardController();
        $salesWeek = $dashboardController->getSales('1 week');
    }
}
