<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_category;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.brand.index',['brands'=>Brand::all()],['categories'=>Category::all()],['sub_categories'=>Sub_category::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.brand.create',[
            'categories'=>Category::all(),
            'sub_categories'=>Sub_category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Brand::brandStore($request);
        return redirect('/index_brand')->with('message', 'Brand created successfully.');
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
        // return view('admin.brand.edit',['brands'=>Brand::find($id)],['categories'=>Category::all()],['sub_categories'=>Sub_category::all()]);
        return view('admin.brand.edit',[
            'brand' => Brand::find($id),
            'categories'=>Category::all(),
            'sub_categories'=>Sub_category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Brand::updateBrand($request,$id);
        return redirect('/index_brand')->with('message','Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Brand::deleteBrand($id);
        return redirect('/index_brand')->with('delete','Deleted Successfully!');
    }
}
