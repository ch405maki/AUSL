<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::all();
        return inertia('Documents/Index', ['documents' => $documents]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:pdf|max:2048',
            'code' => 'nullable|string|max:100',
            'location' => 'required|string|max:255',
        ]);

        // Store the PDF
        $path = $request->file('file')->store('documents', 'public');

        // Save document details to the database
        Document::create([
            'title' => $request->title,
            'file_path' => $path,
            'code' => $request->code,
            'location' => $request->location,
        ]);

        return redirect()->route('documents')->with('success', 'Document uploaded successfully.');
    }


    public function download(Document $document)
    {
        $originalPath = $document->file_path;
        $customFilename = $document->title . '.pdf';

        return Storage::disk('public')->download($originalPath, $customFilename);
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        // Delete the file from storage
        if (Storage::exists($document->file_path)) {
            Storage::delete($document->file_path);
        }

        // Delete the record from the database
        $document->delete();

        return redirect()->route('documents')->with('success', 'Document deleted successfully.');
    }

}

