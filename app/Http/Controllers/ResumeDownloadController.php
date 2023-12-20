<?php

namespace App\Http\Controllers;

use App\Models\UserResume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ResumeDownloadController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UserResume $resume)
    {
        if (!Storage::disk('public')->exists($resume->filename)) {
            abort(404);
        }

        $filename = Str::random(6).".{$resume->filename}";
        $path = Storage::disk('public')->path($resume->filename);
        $type = mime_content_type($path);

        $header = [
            'Content-Type'        => $type,
            'Content-Disposition' => 'inline; filename="' . $filename . '"'
        ];

        return response()->file($path, $header);
    }
}
