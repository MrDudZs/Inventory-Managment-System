<?php
namespace App\Http\Controllers;

use App\Models\StockReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockReportController extends Controller
{
    public function showStockReport(Request $request)
    {
        $stockTypeFilter = $request->query('stock_type');
        $monthFilter = $request->query('month');

        $query = StockReport::query();

        if ($stockTypeFilter) {
            $query->where('stock_type', $stockTypeFilter);
        }
        if ($monthFilter) {
            $query->whereMonth('report_generated', $monthFilter);
        }

        $stockReports = $query->get();

        return view('stockReport', compact('stockReports'));
    }
}
