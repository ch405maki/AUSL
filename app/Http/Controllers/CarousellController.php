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
        $carousells = Carousell::orderBy('order', 'asc')->get();
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

    public function updateOrder(Request $request)
    {
        $validated = $request->validate([
            'carousells.*.id' => 'required|exists:carousells,id',
            'carousells.*.order' => 'required|integer|min:1',
        ]);

        foreach ($validated['carousells'] as $carousell) {
            $item = Carousell::find($carousell['id']);
            $item->order = $carousell['order'];
            $item->save();
        }

        return redirect()->back()->with('success', 'Order updated successfully.');
    }

    public function destroy($id)
    {
        $carousell = Carousell::findOrFail($id);
        $carousell->delete();

        return redirect()->route('carousell');
    }

}