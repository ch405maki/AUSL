<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Inertia\Inertia;
use App\Models\Document;

class StudentController extends Controller
{
    public function form (){
        
        $documents = Document::where('location', 'student')->get();

        return Inertia::render('Main/Student/Downloadable/Index', ['documents' => $documents]);
    }
}
