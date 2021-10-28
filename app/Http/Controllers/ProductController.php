<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
            'products' => Product::where('category_id', $product->category_id)->latest()->take(4)->get()
        ]);
    }
}
