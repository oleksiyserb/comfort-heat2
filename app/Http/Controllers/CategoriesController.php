<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Projects;

class CategoriesController extends Controller
{
    public function show(Categories $category)
    {

        $parentCategories = Categories::all();

        $subcategories = $parentCategories->filter(function ($item) {
            return $item->parent_id > 0;
        })->values();
        $parentCategories = $parentCategories->where('parent_id', 0);

        $products = $category->products()->with('images')->paginate(6);

        $projects = Projects::latest()->take(2)->get();

        return view('categories.show', compact(
            'category',
            'subcategories',
            'parentCategories',
            'products',
            'projects'
        ));
    }
}
