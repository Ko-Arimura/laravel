<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Vendor;
use App\Http\Requests\ProductStoreRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->get();
        return view('products.index', compact('products'));
    }
    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }
    public function store(ProductStoreRequest $request)
    {

        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->vendor_code = $request->input('vendor_code');
        $product->save();
        return redirect("/products/{$product->id}");
    }
}
