<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Banner;
use App\Models\OnLoadBanner;


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

    public function updateState(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        // Toggle the state or update other details
        $banner->state = !$banner->state;
        $banner->save();

        // Return a response or redirect
        return redirect()->route('banner')->with('success', 'Banner created successfully!');
    }

    public function bannerDestroy ($id){
        $banner= Banner::findOrFail($id);
        $banner->delete();

        return redirect()->route('banner');
    }

    // Onload Banner Section

    public function onloadbannerIndex (){

        $onLoadBanners = OnLoadBanner::all();

        return Inertia::render('Settings/OnLoadBanner/Index', ['onLoadBanners' => $onLoadBanners]);

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'text' => 'required|string',
            'icon' => 'required|string',
            'confirmButtonText' => 'required|string',
            'cancelButtonText' => 'required|string',
            'url' => 'required|url',
            'state' => 'required|boolean',
        ]);

        OnLoadBanner::create($validated);

        return redirect()->route('onload')->with('success', 'Banner created successfully.');
    }

    // Method to update the banner
    public function updateOnloadState(Request $request, $id)
    {
        $banner = OnLoadBanner::findOrFail($id);

        // Toggle the state or update other details
        $banner->state = !$banner->state;
        $banner->save();

        // Return a response or redirect
        return redirect()->route('onload');
    }

    public function OnloadDestroy ($id){
        $banner= OnLoadBanner::findOrFail($id);
        $banner->delete();

        return redirect()->route('onload');
    }
    
}
