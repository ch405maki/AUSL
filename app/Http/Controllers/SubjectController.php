<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();

        return Inertia::render('Announcement/ClosedSubjects', [
            'subjects' => $subjects,
        ]);
    }

    public function description()
    {
        return response()->json(Subject::all());
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $subject = Subject::create([
            'description' => $request->description,
        ]);

        return response()->json([
            'message' => 'Subject created successfully.',
            'subject' => $subject,
        ], 201);
    }


    public function show($id)
    {
        $subject = Subject::findOrFail($id);
        return response()->json($subject);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $subject = Subject::findOrFail($id);
        $subject->update([
            'description' => $request->description,
        ]);

        return response()->json($subject);
    }

    public function destroy($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();

        return response()->json(['message' => 'Subject deleted']);
    }
}
