<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::orderBy('created_at','desc')->paginate(5);
        return view('admin.tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'tag' => 'required',
        ]);

        Tag::create([
            'tag' => $request['tag'],
        ]);

        return redirect(route('tag.index'))->with('success','Tag created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit')->with('tag',$tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validate($request,[
            'tag' => 'required',
        ]);

        $tag->update([
            'tag' => $request['tag'],
        ]);

        return redirect(route('tag.index'))->with('success','Tag updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return back()->with('success','Tag deleted successfully.');
    }

    public function trashed(){
        $trashedTags = Tag::onlyTrashed()->orderBy('deleted_at','desc')->paginate(5);
        return view('admin.tags.trashed')->with('trashedTags',$trashedTags);
    }

    public function restoreTrashed($tag){
        $trashedTag = Tag::onlyTrashed()->find($tag);
        $trashedTag->restore();
        return redirect(route('tag.trashed'))->with('success','Tag restored successfully.');
    }

    public function deleteTrashed($tag){
        $trashedTag = Tag::onlyTrashed()->find($tag);
        $trashedTag->forceDelete();
        return redirect(route('tag.trashed'))->with('success','Tag deleted successfully.');
    }
}
