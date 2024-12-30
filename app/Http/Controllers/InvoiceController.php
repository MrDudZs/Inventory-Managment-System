<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Invoice;
use Barryvdh\Snappy\Facades\SnappyPdf;

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

        // Store data in session to access when generating a pdf.
        session([
            'customerData' => $customerData,
            'productData' => $productData,
            'totalData' => $totalData,
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

    public function submitInvoice(Request $request)
    {
        $user = Auth::user();

        // Retrieve data from session
        $customerData = session('customerData');
        $productData = session('productData');
        $totalData = session('totalData');

        $data = [
            'customerData' => $customerData,
            'productData' => $productData,
            'totalData' => $totalData,
        ];

        $htmlContent = view('generatePDF', $data)->render();
        // $pdf = SnappyPdf::loadHTML($htmlContent);
        // $pdfContent = $pdf->output();

        $tempHtmlFile = tempnam(sys_get_temp_dir(), 'invoice') . '.html';
        file_put_contents($tempHtmlFile, $htmlContent);
    
        // Define the output image file path
        $outputImageFile = tempnam(sys_get_temp_dir(), 'invoice') . '.png';
    
        // Full path to wkhtmltoimage
        $wkhtmltoimagePath = base_path('app\Services\wkhtmltoimage.exe');
    
        // Convert HTML to image using wkhtmltoimage
        $command = "$wkhtmltoimagePath $tempHtmlFile $outputImageFile";
        exec($command, $output, $return_var);
    
        if ($return_var !== 0) {
            return response()->json(['message' => 'Failed to generate image.'], 500);
        }
    
        // Check if the image file exists
        if (!file_exists($outputImageFile)) {
            return response()->json(['message' => 'Image file not found.'], 500);
        }
    
        // Read the image content
        $imageContent = file_get_contents($outputImageFile);

        Invoice::create([
            'invoiceStaff' => $user->staffID,
            'invoicePDF' => $pdfContent,
            'invoiceDate' => now()->toDateString(),
        ]);

        unlink($tempHTMLFile);
        unlink($outputImageFile);

        return response()->json(['message' => 'PDF generated and successfully stored.']);
    }
}
