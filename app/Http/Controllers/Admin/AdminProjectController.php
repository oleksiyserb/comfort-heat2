<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\ProjectStoreRequest;
use App\Models\Projects;
use App\Traits\UploadImages;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Routing\Redirector;

class AdminProjectController extends Controller
{

    use UploadImages;
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        Paginator::useTailwind();

        return view('admin.projects.index', [
            'projects' => Projects::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ProjectStoreRequest $request)
    {
        $project = Projects::create(array_merge($request->input(), [
            'image' => $this->uploadAndResizeImage($request->file('image'), 'projects')
        ]));

        return redirect('/admin/projects/' . $project->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param Projects $projects
     * @return Application|Factory|View
     */
    public function show($slug)
    {
        $project = Projects::where('slug', $slug)->firstOrFail();

        return view('admin.projects.show', [
            'project' => $project
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
        $project = Projects::where('slug', $slug)->firstOrFail();

        return view('admin.projects.edit', [
            'project' => $project,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Application|Redirector|RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $project = Projects::find($id);

        $attributes = $request->all();
        $attributes['is_published'] ?? $attributes['is_published'] = 0;

        if($attributes['image'] ?? false) {
            $this->unlinkImage($project->image);
            $attributes['image'] = $this->uploadAndResizeImage($attributes['image'], 'projects');
        }

        $project->update($attributes);
        return redirect('/admin/projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $project = Projects::find($id);

        $this->unlinkImage($project->image);
        $project->delete();

        return redirect('/admin/projects');
    }
}
