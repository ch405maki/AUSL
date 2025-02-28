<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Student;

class GwaController extends Controller
{

    public function index()
    {
        $students = Student::all();

        return Inertia::render('Students/Index', [
            'students' => $students,
        ]);
    }

    public function response()
    {
        return Inertia::render('Main/Student/Gwa/Create');
    }

    public function track()
    {
        return Inertia::render('Main/Student/Gwa/Index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_number' => 'required|unique:students',
            'year_level' => 'required',
            'full_name' => 'required',
            'email' => 'required|email|unique:students',
            'contact_number' => 'required',
            'document' => 'nullable',
            'gwa' => 'nullable|numeric',
            'remarks' => 'nullable',
        ]);

        $student = Student::create($request->all());

        return response()->json([
            'message' => 'Student created successfully!',
            'student' => $student,
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'printing_by' => 'nullable|string',
            'encoded_by' => 'nullable|string',
            'gwa' => 'nullable|numeric',
            'status' => 'nullable|string',
            'remarks' => 'nullable|string',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());

        return response()->json([
            'message' => 'Student updated successfully!',
            'student' => $student,
        ]);
    }

    // Add this method to handle search
    public function show($id)
    {
        $student = Student::where('student_number', $id)->first();

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return response()->json($student);
    }
}
