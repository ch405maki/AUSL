<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Banner;
class SettingsController extends Controller
{
    public function bannerIndex (){
        $banners = Banner::all();
        return Inertia::render('Settings/Banner/Index', ['banners' => $banners,]);
    }

    public function storeBanner(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'link' => 'required|url',
            'state' => 'required|boolean',
        ]);

        Banner::create($validated);

        return redirect()->route('banner')->with('success', 'Banner created successfully!');
    }

    public function updateState(Request $request)
    {
        $banner = Banner::find($request->id);
        if ($banner) {
            $banner->state = $request->state;
            $banner->save();
        }
        return redirect()->back()->with('success', 'Banner state updated successfully.');
    }
    
}
