<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Categories\CategoriesStoreRequest;
use App\Http\Requests\Categories\CategoriesUpdateRequest;
use App\Models\Categories;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Redirector;

class AdminCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        Paginator::useTailwind();

        return view('admin.categories.index', [
            'categories' => Categories::latest()->paginate(20)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.categories.create', [
            'parents' => Categories::where('parent_id', 0)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CategoriesStoreRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(CategoriesStoreRequest $request)
    {
        $attributes = $request->all();

        Categories::create($attributes);
        return redirect('/admin/categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function edit($slug)
    {
        return view('admin.categories.edit', [
            'category' => Categories::where('slug', $slug)->firstOrFail(),
            'parents' => Categories::where('parent_id', 0)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CategoriesUpdateRequest $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector
     */
    public function update(CategoriesUpdateRequest $request, $id)
    {
        $category = Categories::find($id);
        $attributes = $request->all();

        $category->update($attributes);
        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        $categoryChild = $category->where('parent_id', $category->id)->get();

        if ($categoryChild->count() > 0) {
            $categoryChild->each(function ($child) {
                $child->delete();
            });
        }

        $category->delete();
        return redirect('/admin/categories');
    }
}
