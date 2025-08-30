<?php

namespace App\Http\Controllers;

use App\Models\Sub_category;
use Illuminate\Http\Request;
use App\Models\Category;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.sub_category.index',['sub_categories'=>Sub_category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sub_category.create',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Sub_category::newSubCategory($request);
        return back()->with('message', 'Sub_Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view ('admin.sub_category.edit',['sub_categories'=>Sub_category::find($id)],['categories'=>Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Sub_category::update_sub_category($request,$id);
        return redirect('/index_sub_category')->with('message','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Sub_category::delete_sub_category($id);
        return redirect('/index_sub_category')->with('delete','Deleted Successfully!');
    }
}
