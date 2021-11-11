<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.products.index', [
            'products' => Product::latest()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.products.create', [
            'categories' => Categories::where('parent_id', '>', 0)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProductStoreRequest $request
     * @return string
     */
    public function store(ProductStoreRequest $request)
    {
        $attributes = $request->all();

        Product::create($attributes);
        return redirect('/admin/products');
    }

    /**
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        return view('admin.products.show', [
            'product' => Product::where('slug', $slug)->firstOrFail(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function edit($slug)
    {
        return view('admin.products.edit', [
            'product' => Product::where('slug', $slug)->firstOrFail(),
            'categories' => Categories::where('parent_id', '>', 0)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProductUpdateRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::find($id);
        $attributes = $request->all();

        $product->update($attributes);
        return redirect('/admin/products/' . $product->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();
        return back();
    }
}
