<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\UserResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Response;

class ResumeUploadController extends Controller
{
    public function create(): Response
    {
        return inertia('auth/ResumeUpload');
    }

    public function store(Request $request)
    {

        if ($request->hasFile('resume')) {
            $request->validate([
                'resume' => 'required|mimes:pdf|max:5000'
            ], [
                'resume' => 'The file should be in pdf format'
            ]);
            $file = $request->file('resume');
            $path = $file->store('resumes', 'public');

            Auth::user()->resume()->save(new UserResume([
                'filename' => $path,
                'is_open_for_review' => $request->reviewable === 'true' ? true : false,
                'open_review_description' => $request->reviewDescription ?? null
            ]));
            return redirect()->route('resumes.index')->with('success', 'Account created successfully');
        }
    }
}
