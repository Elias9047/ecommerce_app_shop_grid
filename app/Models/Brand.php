<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

        private static $brand, $image, $imageName, $directory, $imageUrl;
        protected $fillable = ['brand_name', 'brand_description', 'image', 'status']; // hacker don't inject
    // image store
    public static function getImageUrl($request){
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = date('YmdHis').'.'.self::$image->getClientOriginalExtension();
            self::$directory    = 'upload/brand_images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl     = self::$directory.self::$imageName;
            return self::$imageUrl;
        }
    }
    // data store
    public static function brandStore($request){
        $request->validate([
            'category_id'=>'required',
            'sub_category_id'=>'required',
            'brand_name' => 'required|max:20',
            'brand_description' => 'required|max:200',
            'image' => 'required|image|mimes:jpg,jpeg,gif,png'
        ]);

        self::$brand =  new Brand();
        self::$brand->category_id                = $request->category_id;
         self::$brand->sub_category_id           = $request->sub_category_id;
        self::$brand->brand_name                 = $request->brand_name;
        self::$brand->brand_description          = $request->brand_description;
        self::$brand->image                      = self::getImageUrl($request);;
        self::$brand->save();
    }

    // brand update

    public static function updateBrand($request,$id){

        self::$brand = Brand::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$brand->image))
            {
                unlink(self::$brand->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$brand->image;
        }
       self::$brand->category->category_id                      = $request->category_id;
       self::$brand->sub_category->sub_category_id              = $request->sub_category_id;
       self::$brand->brand_name                                 = $request->brand_name;
       self::$brand->brand_description                          = $request->brand_description;
       self::$brand->image                                      = self::$imageUrl;
       self::$brand->save();
    }

    //  Delete

    public static function deleteBrand($id){
        self::$brand =  Brand::find($id);

         if(file_exists(self::$brand->image)){
            unlink(self::$brand ->image);
        }
        self::$brand->delete();
    }


        // relationship category & subcategory
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

     public function sub_category(){
        return $this->belongsTo(Sub_Category::class,'sub_category_id');
    }


}
