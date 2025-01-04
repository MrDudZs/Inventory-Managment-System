<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index() 
    {
        return view('categories');
    }

    public function handleForm(Request $request) 
    {
        $validatedData = $request->validate([
            'category' => 'required|in:Keyboard,Mouse,Headset,Microphone,Speakers,Monitor,allProducts',
        ]);

        if ($validatedData['category'] == 'allProducts') {
            $data = Stock::all();
        }
        else {
            $data = Stock::where('stockType', $validatedData['category'])->get();
        }

        if ($data->isEmpty()) {
            $data = Stock::all();
        }

        return view('inventory', ['data' => $data]);
    }

    public function dashboardReturn(Request $request)
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
}
