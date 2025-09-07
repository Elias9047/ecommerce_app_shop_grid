<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Brand;
use App\Models\Product;

class HomeController extends Controller
{
    // home page
    public function index(){
        return view('frontEnd.home',[
            'categories'=>Category::all(),
            'sub_categories'=>Sub_category::all(),
            'brands'=>Brand::all()
        ]);
    }

    // category_product page
    public function category_product(string $id){
        return view('frontEnd.category_product.category_product',[
            'categories' => Category::all(),
            'sub_categories'=>Sub_category::all(),
            'brands'=>Brand::all(),
            'products'=> Product::where('category_id', $id)->get()
                
        ]);
    }

    //subCategory_product
      public function subCategory_product(string $id){
        return view('frontEnd.subCategory_product.subCategory_product',[
            'categories' => Category::all(),
            'sub_categories'=>Sub_category::all(),
            'brands'=>Brand::all(),
            'products'=> Product::where('sub_category_id', $id)->get()
                
        ]);
    }
    
}
