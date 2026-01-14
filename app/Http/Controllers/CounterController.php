<?php

namespace App\Http\Controllers;

use App\Models\CountdownEvent;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CounterController extends Controller
{
    public function index()
    {
        $events = CountdownEvent::orderBy('target_date', 'desc')->get();

        return Inertia::render('Settings/Counter/Index', [
            'events' => $events,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'target_date' => 'required|date',
            'type' => 'required|string',
            'is_active' => 'boolean',
        ]);

        CountdownEvent::create($request->all());

        return redirect()->back()->with('success', 'Countdown event created.');
    }

    public function update(Request $request, CountdownEvent $event)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'target_date' => 'required|date',
            'type' => 'required|string',
            'is_active' => 'boolean',
        ]);

        $event->update($request->all());

        return redirect()->back()->with('success', 'Countdown event updated.');
    }

    public function destroy(CountdownEvent $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'Countdown event deleted.');
    }

    public function toggleActive(CountdownEvent $event)
    {
        $event->update(['is_active' => !$event->is_active]);
        return redirect()->back()->with('success', 'Event status updated.');
    }
}
