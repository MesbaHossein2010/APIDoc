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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        $docs = Document::all()->sortBy('section_id');
        return view('public.docs', compact('sections', 'docs'));
    }
    public function AdminIndex()
    {
        $sections = Section::all();
        $docs = Document::all()->sortBy('section_id');
        return view('admin.docs.index', compact('sections', 'docs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sections = Section::all();
        return view('admin.docs.create', compact('sections'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocStoreRequest $request)
    {
        $title = $request->input('title');
        $slug = $request->input('slug');
        $section_id = $request->input('section_id');
        $content = $request->input('content');

        $doc = Document::create([
            'title' => $title,
            'slug' => $slug,
            'section_id' => $section_id,
            'content' => $content,
            'user_id' => 'admin'
        ]);

        return redirect()->route('admin.docs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doc = Document::find($id);
        return view('admin.docs.show', compact('doc'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doc = Document::find($id);
        $sections = Section::all();
        return view('admin.docs.edit', compact('doc', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocEditRequest $request, string $id)
    {
        $doc = Document::find($id);
        $title = $request->input('title');
        $slug = $request->input('slug');
        $section_id = $request->input('section_id');
        $content = $request->input('content');

        $doc->title = $title;
        $doc->slug = $slug;
        $doc->section_id = $section_id;
        $doc->content = $content;
        $doc->save();

        return redirect()->route('admin.docs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search(Request $request)
    {
        //
    }
}
