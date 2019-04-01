<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->paginate(5);
        return view('admin.categories.index')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);
        Category::create(['name' => $request['name']]);
        return redirect(route('category.index'))->with('success', 'Category created successfully.');
    }

    /**
     * Display the specified resource.
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Category            $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $category->update(['name' => $request['name']]);
        return redirect(route('category.index'))->with('success', 'Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param  \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect(route('category.index'))->with('success', 'Category trashed successfully.');
    }

    public function trashed(){
        $categories = Category::onlyTrashed()->orderBy('deleted_at','desc')->paginate(5);
        return view('admin.categories.trashed')->with('categories',$categories);
    }

    public function restoreTrashed($category){
        $trashedCategory = Category::onlyTrashed()->find($category);
        $trashedCategory->restore();
        return back()->with('success','Restored category successfully.');
    }

    public function deleteTrashed($category){
        $trashedCategory = Category::onlyTrashed()->find($category);
        $trashedCategory->forceDelete();
        return back()->with('success','Category deleted successfully.');
    }
}
