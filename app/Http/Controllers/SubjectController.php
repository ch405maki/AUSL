<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SubjectController extends Controller
{

    public function create()
    {
        $subjects = Subject::orderBy('id', 'desc')->get();

        return Inertia::render('Announcement/ClosedSubjects', [
            'subjects' => $subjects,
        ]);
    }

    public function closedSubjects()
    {
        $subjects = Subject::orderBy('id', 'desc')->get();

        return Inertia::render('Main/Student/ClosedSubject/Index', [
            'subjects' => $subjects
        ]);
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

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'description' => 'required|string|max:255',
        ]);

        $subject->update($request->only('description'));

        return response()->json([
            'message' => 'Subject updated.',
            'subject' => $subject,
        ]);
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return response()->json([
            'message' => 'Subject deleted.',
        ]);
    }

}
