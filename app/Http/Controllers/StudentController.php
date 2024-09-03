<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class StudentController extends Controller
{
    public function show (){
        return Inertia::render('Main/Student/Index');
    }
}
