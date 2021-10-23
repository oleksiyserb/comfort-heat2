<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index', [
            'projects' => Projects::latest()->take(4)->get(),
        ]);
    }
}
