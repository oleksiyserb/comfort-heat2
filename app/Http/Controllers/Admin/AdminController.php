<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\UploadImages;

abstract class AdminController extends Controller
{
    use UploadImages;
}
