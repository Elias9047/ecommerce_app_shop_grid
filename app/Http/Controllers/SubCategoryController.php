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
        return view('admin.sub_category.index', ['sub_categories'=>Sub_category::all()]);
    }

    public function create()
    {
        return view('admin.sub_category.create', ['categories'=>Category::all()]);
    }

    public function store(Request $request)
    {
        Sub_category::newSubCategory($request);
        return back()->with('message', 'Sub_Category created successfully.');
    }

    public function edit(string $id)
    {
        return view('admin.sub_category.edit', [
            'sub_categories'=>Sub_category::find($id),
            'categories'=>Category::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        Sub_category::update_sub_category($request,$id);
        return redirect('/index_sub_category')->with('message','Updated Successfully!');
    }

    public function destroy(string $id)
    {
        Sub_category::delete_sub_category($id);
        return redirect('/index_sub_category')->with('delete','Deleted Successfully!');
    }

    // Ajax: fetch subcategories by category
    public function getSubcategories($category_id)
    {
        $subcategories = Sub_category::where('category_id', $category_id)->get();
        return response()->json($subcategories);
    }


}
