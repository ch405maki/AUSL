<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Office;
use Illuminate\Support\Facades\Storage;

class OfficeController extends Controller
{
    public function index(){
        $offices = Office::all();

        return Inertia::render('Office/Index', ['offices' => $offices]);
    }

    public function store(Request $request)
    {
        // Validation rules
        $request->validate( [
            'office_name' => 'required|string|max:255',
            'office_function' => 'required|string',
            'office_location' => 'required|string|max:255',
            'office_email' => 'required|email|max:255',
            'office_contact' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', // 10MB Max
        ]);

        $data = $request->all();
        

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/offices');
            $data['image'] = Storage::url($path);
        }

        $office = Office::create($data);

        return redirect()->back()->with('success', 'Saved successfully.');    
    }

    public function destroy($id)
    {
        $office = Office::findOrFail($id);
        $office->delete();

        return redirect()->back()->with('success', 'Deleted successfully.');
    }
}
