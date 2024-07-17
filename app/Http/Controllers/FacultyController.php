<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class FacultyController extends Controller
{
    public function show (){
        return Inertia::render('User/Faculty/Index');
    }
}
