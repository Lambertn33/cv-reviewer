<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResumesController extends Controller
{
    public function index()
    {
        return inertia('resumes/Index');
    }
}
