<?php

namespace App\Http\Controllers;

use App\Models\UserResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResumesController extends Controller
{
    public function index()
    {
        $resumesForReview = UserResume::with('user')->where('is_open_for_review', true)->paginate(5);
        return inertia('resumes/Index', [
            'resumes' => $resumesForReview
        ]);
    }

    public function show(UserResume $resume)
    {
        
    }
}
