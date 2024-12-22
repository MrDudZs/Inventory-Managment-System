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
     * @return \Illuminate\View\View
     */
    public function show()
    {
        $user = Auth::user();
        $permissionId = $user->permission_level;

        return view('dashboard', compact('permissionId'));
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

        $sales = Invoice::whereBetween('invoiceDate', [$startDate, $currentDate])->sum('invoiceCost');

        return $sales;
    }
}
