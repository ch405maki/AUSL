<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Carousell;
use Illuminate\Support\Facades\Storage;

class CarousellController extends Controller
{
    public function index()
    {
        $carousells = Carousell::all();
        return Inertia::render('Carousell/Index', ['carousells' => $carousells]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/carousell');
            $imagePath = Storage::url($imagePath);
        }

        Carousell::create([
            'image' => $imagePath,
        ]);

        return redirect()->route('carousell');
    }

    public function destroy($id)
    {
        $carousell = Carousell::findOrFail($id);
        $carousell->delete();

        return redirect()->route('carousell');
    }
}