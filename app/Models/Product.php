<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

        private static $product, $image, $imageName, $directory, $imageUrl;
        protected $fillable = [
            'category_id', 'sub_category_id', 'brand_id',
            'product_name', 'product_code', 'product_model',
            'stock_amount', 'regular_price', 'discount_price',
            'short_description', 'long_description', 'image'
        ]; // hacker don't inject

    // image store
    public static function getImageUrl($request){
         if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = date('YmdHis').'.'.self::$image->getClientOriginalExtension();
            self::$directory    = 'upload/product_images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl     = self::$directory.self::$imageName;
            return self::$imageUrl;
        }


       
    }
// data store
public static function productStore($request){

    
    $request->validate([
        'category_id'           => 'required',
        'sub_category_id'       => 'required',
        'brand_id'              => 'required|max:20',
        'product_name'          => 'required|max:200',
        'product_code'          => 'required',
        'product_model'         => 'nullable',
        'regular_price'         => 'required',
        'discount_price'        => 'required',
        'short_description'     => 'nullable',
        'long_description'      => 'nullable',
        'image'                 => 'required|image|mimes:jpg,jpeg,gif,png'
    ]);

    self::$product = new Product();
    self::$product->category_id             = $request->category_id;
    self::$product->sub_category_id         = $request->sub_category_id;
    self::$product->brand_id                = $request->brand_id;
    self::$product->product_name            = $request->product_name;
    self::$product->product_code            = $request->product_code;
    self::$product->product_model           = $request->product_model;
    self::$product->stock_amount            = $request->stock_amount;
    self::$product->regular_price           = $request->regular_price;
    self::$product->discount_price          = $request->discount_price;
    self::$product->short_description       = $request->short_description;
    self::$product->long_description        = $request->long_description;
    self::$product->image                   = self::getImageUrl($request);
    self::$product->save();
}

//update data
public static function updateProduct($request,$id){

        self::$product = Product::find($id);
        if ($request->hasFile('image'))
        {
            if (file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$product->image;
        }
        self::$product->category_id             = $request->category_id;
        self::$product->sub_category_id         = $request->sub_category_id;
        self::$product->brand_id                = $request->brand_id;
        self::$product->product_name            = $request->product_name;
        self::$product->product_code            = $request->product_code;
        self::$product->product_model           = $request->product_model;
        self::$product->regular_price           = $request->regular_price;
        self::$product->discount_price          = $request->discount_price;
        self::$product->short_description       = $request->short_description;
        self::$product->long_description        = $request->long_description;
        // self::$product->image                   = self::getImageUrl($request);

         self::$product->image = self::$imageUrl;
        self::$product->save();
    }



// Delete Data

public static function deleteProduct($id){
    self::$product  = Product::find($id);

   if (file_exists(public_path(self::$product->image))) {
    unlink(public_path(self::$product->image));
}

    self::$product->delete();
}



// relationships
public function category(){
    return $this->belongsTo(Category::class,'category_id');
}

public function sub_category(){
    return $this->belongsTo(Sub_Category::class,'sub_category_id');
}

public function brand(){
    return $this->belongsTo(Brand::class,'brand_id');
}

}
