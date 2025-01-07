<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Storage;

class FormController extends Controller
{
    public function index()
    {
        return inertia('Form/Index');
    }
}
