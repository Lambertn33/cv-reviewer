<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Response;

class ResumeUploadController extends Controller
{
    public function create(): Response
    {
        return inertia('auth/ResumeUpload');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
