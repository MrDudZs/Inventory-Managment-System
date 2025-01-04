<?php
namespace App\Http\Controllers;

use App\Models\SalesAvgReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SalesAvgReportController extends Controller
{
    public function showAvgSalesReport(Request $request)
    {
        $monthFilter = $request->query('month');
        $query = SalesAvgReport::query();

        if ($monthFilter) {
            $query->whereMonth('report_generated', $monthFilter);
        }

        $salesAvgReports = $query->get();
        return view('avgSalesHistory', compact('salesAvgReports'));
    }

    public function saveAvgSalesReport(Request $request)
    {
        try {
            $data = $request->all();
            Log::info('Request Data:', $data);

            SalesAvgReport::create([
                'report_generated' => $data['report_generated'],
                'generation_time' => $data['generation_time'],
                'total_avg_levels' => $data['total_avg_levels'],
                'total_avg_sales' => $data['total_avg_sales'],
            ]);

            return response()->json(['message' => 'Average sales report saved successfully']);
        } catch (\Exception $e) {
            Log::error('Error saving avg sales report:', ['error' => $e->getMessage()]);
            return response()->json(['message' => 'Error saving avg sales report', 'error' => $e->getMessage()], 500);
        }
    }
}
