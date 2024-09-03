<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Academic;

class AcademicController extends Controller
{
    public function guide_index(){

        $guidelines = Academic::all();

        return Inertia::render('Academics/Guidelines/Index', ['guidelines' => $guidelines]);
    }

    public function guide_store(Request $request)
    {
        // Validation rules
        $request->validate( [
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        $data = $request->all();

        $guideline = Academic::create($data);

        return redirect()->back()->with('success', 'Saved successfully.');    
    }

    public function guide_destroy($id)
    {
        $guide = Academic::findOrFail($id);
        $guide->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
