<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => Projects::where('is_published', 1)->paginate(10)
        ]);
    }

    public function show(Projects $project)
    {
        return view('projects.show', [
            'project' => $project,
            'recommend' => Projects::where('is_published', 1)->latest()->take(2)->get()
        ]);
    }
}
