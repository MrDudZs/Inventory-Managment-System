<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

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
            'salesTax' => round($subTotal / 5, 2),
            'total' => round($subTotal + $subTotal / 5, 2),
        ];

        $customerData = [
            'fullName' => $validatedData['fullName'],
            'customerEmail' => $validatedData['customerEmail'],
            'customerAddress1' => $validatedData['customerAddress1'],
            'customerAddress2' => $validatedData['customerAddress2'],
            'city' => $validatedData['city'],
            'postcode' => $validatedData['postcode'],
        ];

        // Store data in session to access when generating a pdf.
        session([
            'productData' => $productData,
        ]);

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

    public function showInvoiceHistory(Request $request)
    {
        $monthFilter = $request->query('month');
        $query = Invoice::query();

        if ($monthFilter) {
            $query->whereMonth('invoiceDate', $monthFilter);
        }

        $invoices = $query->get();

        return view('invoiceHistory', compact('invoices'));

    }
    public function submitInvoice(Request $request)
    {
        $userID = Auth::user()->id;

        // Retrieve data from session
        $productData = session('productData');

        foreach ($productData as $product) {
            $remove = $product->quantity;
            $id = $product->id;

            $current = Stock::where('stockID', $id)->value('stockCount');

            $newCount = $current - $remove;
            Stock::where('stockID', $id)->update(['stockCount' => $newCount]);
        }

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');

            Invoice::create([
                'invoiceStaff' => $userID,
                'invoicePDF' => $pdf,
                'invoiceDate' => now()->toDateString(),
            ]);

            return response()->json(['message' => 'PDF generated and successfully stored.']);
        }

        return response()->json(['message' => 'PDF not generated.']);
    }
}
