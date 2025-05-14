<?php

namespace App\Http\Controllers;

use App\Http\Requests\SectionEditRequest;
use App\Http\Requests\SectionStoreRequest;
use App\Models\Document;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function AdminIndex()
    {
        $sections = Section::all()->sortBy('title');
        return view('admin.sections.index', compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch documents with null section_id
        $documents = Document::whereNull('section_id')->get();
        return view('admin.sections.create', compact('documents'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(SectionStoreRequest $request)
    {
        // Create the section
        $section = Section::create([
            'title' => $request->title,
        ]);

        // Assign selected documents to the new section (if any were selected)
        if ($request->filled('documents')) {
            // Update the section_id of each selected document
            Document::whereIn('id', $request->documents)->update(['section_id' => $section->id]);
        }

        return redirect()->route('admin.sections.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $section = Section::find($id);
        $docs = $section->docs;
        return view('admin.docs.index', compact('docs', 'section'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section = Section::findOrFail($id);
        $documents = \App\Models\Document::whereNull('section_id')
            ->orWhere('section_id', $section->id)
            ->get();

        return view('admin.sections.edit', compact('section', 'documents'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(SectionEditRequest $request, string $id)
    {
        $section = Section::findOrFail($id);

        // Update the section's title
        $section->update([
            'title' => $request->title,
        ]);

        // Unassign all documents currently linked to this section
        Document::where('section_id', $section->id)->update(['section_id' => null]);

        // Assign selected documents to this section (if any were selected)
        if ($request->filled('documents')) {
            Document::whereIn('id', $request->documents)->update(['section_id' => $section->id]);
        }

        return redirect()->route('admin.sections.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $section = Section::findOrFail($id);

        // Empty the section_id of all documents related to this section
        $section->docs()->update(['section_id' => null]);

        // Now delete the section
        $section->delete();

        return redirect()->route('admin.sections.index');
    }

    public function AdminSearch(Request $request)
    {
        $search = $request->input('search');

        $sections = Section::where('title', 'like', '%' . $search . '%')->get();

        return view('admin.sections.index', compact('sections', 'search'));
    }
}
