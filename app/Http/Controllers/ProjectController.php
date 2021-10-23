<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return view('projects.index', [
            'projects' => Projects::paginate(10)
        ]);
    }

    public function show(Projects $project)
    {
        return view('projects.show', [
            'project' => $project,
            'recommend' => Projects::latest()->take(2)->get()
        ]);
    }
}
