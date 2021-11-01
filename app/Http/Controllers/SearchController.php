<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index', [
            'categories' => Categories::all(),
            'products' => Product::latest()->filter(
                request(['name', 'body', 'category'])
            )->paginate(16)->withQueryString()
        ]);
    }
}
