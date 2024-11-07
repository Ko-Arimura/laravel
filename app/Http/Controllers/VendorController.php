<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function show($id)
    {
        $vendor = Vendor::find($id);
        $products = $vendor->products;
        return view('vendors.show', compact('vendor', 'products'));
    }
}
