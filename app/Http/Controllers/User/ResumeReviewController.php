<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\UserResumeReview;
use Illuminate\Http\Request;

class ResumeReviewController extends Controller
{
    public function store(Request $request)
    {
        UserResumeReview::create($request->validate([
            'review' => 'required',
            'reviewed_by' => 'required',
            'resume_id' => 'required'
        ]));
        return back()->with('success', 'review added successfully');
    }
}
