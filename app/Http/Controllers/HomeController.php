<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Sub_category;
use App\Models\Brand;

class HomeController extends Controller
{
    public function index(){
        return view('frontEnd.home',[
            'categories'=>Category::all(),
            'sub_categories'=>Sub_category::all(),
            'brands'=>Brand::all()
        ]);
    }


    
}
