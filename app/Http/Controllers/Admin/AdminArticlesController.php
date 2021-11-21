<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Articles\ArticlesStoreRequest;
use App\Http\Requests\Articles\ArticlesUpdateRequest;
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Redirector;

class AdminArticlesController extends AdminController
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        Paginator::useTailwind();

        return view('admin.articles.index', [
            'articles' => Article::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticlesStoreRequest $request
     * @return Application|RedirectResponse|Redirector
     */
    public function store(ArticlesStoreRequest $request)
    {
        $article = Article::create(array_merge($request->input(), [
            'image' => $this->uploadAndResizeImage($request->file('image'), 'articles')
        ]));

        return redirect('/admin/articles/' . $article->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('admin.articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $slug
     * @return Application|Factory|View
     */
    public function edit($slug)
    {
        $article = Article::where('slug', $slug)->firstOrFail();

        return view('admin.projects.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ArticlesUpdateRequest $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(ArticlesUpdateRequest $request, $id)
    {
        $article = Article::find($id);

        $attributes = $request->all();
        $attributes['is_published'] ?? $attributes['is_published'] = 0;

        if($attributes['image'] ?? false) {
            $this->unlinkImage($article->image);
            $attributes['image'] = $this->uploadAndResizeImage($attributes['image'], 'articles');
        }

        $article->update($attributes);
        return redirect('/admin/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function destroy($id)
    {
        $article = Article::find($id);

        $this->unlinkImage($article->image);
        $article->delete();

        return redirect('/admin/articles');
    }
}
