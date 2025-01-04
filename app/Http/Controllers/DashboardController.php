<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Invoice;
use App\Models\StoreAndWearhouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Show the dashboard.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        $permissionId = $user->permission_level;

        if ($permissionId == 1) {
            return redirect()->route('clerk.dashboard');
        } elseif ($permissionId == 2) {
            return redirect()->route('admin.dashboard');
        }

        return view('dashboard', compact('permissionId'));
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function showAdminDashboard()
    {
        $user = Auth::user();

        $department = StoreAndWearhouse::where('location_name', $user->location)->pluck('location_type')->first();

        $lowStocks = Stock::where('stockCount', '<', 16)->get();
        $cumulativeSalesWeek = $this->getCumulativeSales('1 week');
        $averageStockWeek = $this->getAverageStock('1 week');
        $cumulativeSalesMonth = $this->getCumulativeSales('1 month');
        $averageStockMonth = $this->getAverageStock('1 month');
        $stockType = Stock::distinct()->pluck('stockType');

        return view('includes.adminDashboard', compact('lowStocks', 'cumulativeSalesWeek', 'averageStockWeek', 'cumulativeSalesMonth', 'averageStockMonth', 'stockType', 'user', 'department'));
    }

    /**
     * Show the clerk dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function showClerkDashboard()
    {
        
        $user = Auth::user();
        
        $department = StoreAndWearhouse::where('location_name', $user->location)->pluck('location_type')->first();
        
        $lowStocks = Stock::where('stockCount', '<', 16)->get();
        $cumulativeSalesWeek = $this->getCumulativeSales('1 week');
        $averageStockWeek = $this->getAverageStock('1 week');
        $cumulativeSalesMonth = $this->getCumulativeSales('1 month');
        $averageStockMonth = $this->getAverageStock('1 month');

        return view('includes.clerkDashboard', compact('lowStocks', 'cumulativeSalesWeek', 'averageStockWeek', 'cumulativeSalesMonth', 'averageStockMonth', 'user', 'department'));
    }

    /**
     * Get sales data for a given time period.
     *
     * @param string $timeScale
     * @return float
     */

    private function getCumulativeSales($timeScale)
    {
        $currentDate = now();
        $startDate = now()->sub($timeScale);

        $sales = Invoice::whereBetween('invoiceDate', [$startDate, $currentDate])
            ->join('saleshistory', 'invoice.invoiceID', '=', 'saleshistory.saleID')
            ->join('stock', 'saleshistory.saleStockID', '=', 'stock.stockID')
            ->selectRaw('SUM(stock.stockPrice * saleshistory.saleCount) as cumulativeSales')
            ->value('cumulativeSales');

        return number_format($sales ?? 0.0, 2, '.', '');
    }


    private function getAverageStock($timeScale)
    {
        $currentDate = now();
        $startDate = now()->sub($timeScale);

        $stockSoldCount = Invoice::whereBetween('invoiceDate', [$startDate, $currentDate])
            ->join('saleshistory', 'invoice.invoiceID', '=', 'saleshistory.saleID')
            ->join('stock', 'saleshistory.saleStockID', '=', 'stock.stockID')
            ->select('saleshistory.saleCount')
            ->get();

        $cumulativeStockSold = 0;

        foreach ($stockSoldCount as $row) {
            $cumulativeStockSold += $row->saleCount;
        }

        $averageStock = $stockSoldCount->count() > 0 ? $cumulativeStockSold / $stockSoldCount->count() : 0;

        return $averageStock;
    }



    public function getStockData()
    {
        $stocks = Stock::select('stockName', 'stockCount', 'stockSold')->get();
        return response()->json($stocks);
    }

    public function getSalesData()
    {
        $stocks = Stock::select('stockCount', 'stockSold')->get();
        return response()->json($stocks);
    }
}
