<?php

namespace App\Http\Controllers;

use App\Http\Requests\DocEditRequest;
use App\Http\Requests\DocStoreRequest;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        $docs = Document::all()->sortBy('section_id');
        return view('public.docs', compact('sections', 'docs'));
    }

    public function AdminIndex()
    {
        $sections = Section::all();
        $docs = Document::all()->sortBy('title');
        return view('admin.docs.index', compact('sections', 'docs'));
    }

    public function create()
    {
        $sections = Section::all();
        return view('admin.docs.create', compact('sections'));
    }

    public function store(DocStoreRequest $request)
    {
        $doc = Document::create([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'section_id' => $request->input('section_id') == 0 ? null : $request->input('section_id'),
            'content' => $request->input('content'),
            'user_id' => 'admin'
        ]);

        return redirect()->route('admin.docs.index');
    }

    public function show(string $id)
    {
        $doc = Document::find($id);
        return view('admin.docs.show', compact('doc'));
    }

    public function edit(string $id)
    {
        $doc = Document::find($id);
        $sections = Section::all();
        return view('admin.docs.edit', compact('doc', 'sections'));
    }

    public function update(DocEditRequest $request, string $id)
    {
        $doc = Document::find($id);

        $doc->update([
            'title' => $request->input('title'),
            'slug' => $request->input('slug'),
            'section_id' => $request->input('section_id') == 0 ? null : $request->input('section_id'),
            'content' => $request->input('content'),
        ]);

        return redirect()->route('admin.docs.index')->with('success', 'Document updated successfully.');
    }

    public function destroy(string $id)
    {
        $doc = Document::find($id);

        if (!$doc) {
            return redirect()->route('admin.docs.index')->withErrors('error', 'Document not found.');
        }

        $doc->delete();

        return redirect()->route('admin.docs.index');
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $sections = Section::all();

        $docs = Document::where('title', 'like', '%' . $search . '%')->get();

        return view('public.docs', compact('docs', 'sections', 'search'));
    }

    public function AdminSearch(Request $request)
    {
        $search = $request->input('search');

        $docs = Document::where('title', 'like', '%' . $search . '%')->get();

        return view('admin.docs.index', compact('docs', 'search'));
    }
}
