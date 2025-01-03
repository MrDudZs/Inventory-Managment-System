<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Invoice;
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
        $lowStocks = Stock::where('stockCount', '<', 16)->get();
        $salesWeek = $this->getSales('1 week');
        $salesMonth = $this->getSales('1 month');

        return view('includes.adminDashboard', compact('lowStocks', 'salesWeek', 'salesMonth'));
    }

    /**
     * Show the clerk dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function showClerkDashboard()
    {
        $lowStocks = Stock::where('stockCount', '<', 16)->get();
        $salesWeek = $this->getSales('1 week');
        $salesMonth = $this->getSales('1 month');

        return view('includes.clerkDashboard', compact('lowStocks', 'salesWeek', 'salesMonth'));
    }

    /**
     * Get sales data for a given time period.
     *
     * @param string $timeScale
     * @return float
     */
    private function getSales($timeScale)
    {
        $currentDate = now();
        $startDate = now()->sub($timeScale);

        $sales = Invoice::whereBetween('invoiceDate', [$startDate, $currentDate])
            ->join('saleshistory', 'invoice.invoiceID', '=', 'saleshistory.saleID')
            ->join('stock', 'saleshistory.saleStockID', '=', 'stock.stockID')
            ->selectRaw('SUM(stock.stockPrice * saleshistory.saleCount) as cumulativeSales')
            ->value('cumulativeSales');

        return $sales ?? 0;
    }
}
