<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function forms()
    {
        $files = File::files(public_path('pdf'));
        $pdfs = [];

        foreach ($files as $file) {
            $pdfs[] = [
                'name' => pathinfo($file->getFilename(), PATHINFO_FILENAME),
                'path' => asset('pdf/' . $file->getFilename()),
                'size' => round($file->getSize() / 1024) . ' KB',
            ];
        }

        return Inertia::render('Main/Student/Downloadable/Index', [
            'pdfs' => $pdfs
        ]);
    }
}
