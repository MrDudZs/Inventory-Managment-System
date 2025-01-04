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
    public function manageProduct(Request $request)
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

    public function sales()
    {
        $dashboardController = new DashboardController();
        $salesWeek = $dashboardController->getSales('1 week');
    }
}
