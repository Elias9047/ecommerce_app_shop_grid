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
        return view('admin.brand.index', [
            'brands'=>Brand::all(),
            'categories'=>Category::all(),
            'sub_categories'=>Sub_category::all()
        ]);
    }

    public function create()
    {
        return view('admin.brand.create', [
            'categories'=>Category::all(),
            'sub_categories'=>Sub_category::all()
        ]);
    }

    public function store(Request $request)
    {
        Brand::brandStore($request);
        return redirect('/index_brand')->with('message', 'Brand created successfully.');
    }

    public function edit(string $id)
    {
        return view('admin.brand.edit', [
            'brand' => Brand::find($id),
            'categories'=>Category::all(),
            'sub_categories'=>Sub_category::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        Brand::updateBrand($request,$id);
        return redirect('/index_brand')->with('message','Updated Successfully!');
    }

    public function destroy(string $id)
    {
        Brand::deleteBrand($id);
        return redirect('/index_brand')->with('delete','Deleted Successfully!');
    }

    // Ajax: fetch brands by subcategory
    public function getBrands($sub_category_id)
    {
        $brands = Brand::where('sub_category_id', $sub_category_id)->get();
        return response()->json($brands);
    }

}
