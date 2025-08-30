<?php

namespace App\Http\Controllers;

use App\Models\Sub_category;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.product.index',[
            'categories' => Category::all(),
            'sub_categories'=>Sub_category::all(),
            'brands'=>Brand::all(),
            'products'=>Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.create',[
            'categories' => Category::all(),
            'sub_categories'=>Sub_category::all(),
            'brands'=>Brand::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Product::productStore($request);
        return redirect('/index_product')->with('message', 'Product created successfully.');
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
        return view('admin.product.edit',[
            'categories' => Category::all(),
            'sub_categories'=>Sub_category::all(),
            'brands'=>Brand::all(),
            'product'=>Product::find($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Product::updateProduct($request,$id);
        return redirect('/index_product')->with('message', 'Product Updated Successfully!.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::deleteProduct($id);
        return redirect('/index_product')->with('delete', 'Product Deleted Successfully!.');
    }
}
