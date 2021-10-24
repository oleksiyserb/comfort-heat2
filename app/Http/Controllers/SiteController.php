<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use Illuminate\Routing\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.index', [
            'projects' => Projects::latest()->take(4)->get(),
        ]);
    }

    public function technical()
    {
        return view('site.technical');
    }

    public function about()
    {
        return view('site.about');
    }
}
