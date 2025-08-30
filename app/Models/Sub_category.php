<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sub_category extends Model
{
    use HasFactory;

    private static $sub_category, $image, $imageName, $directory, $imageUrl;
    protected $fillable = ['sub_category_name', 'sub_category_description', 'image', 'status']; // hacker don't inject
    // image store
    public static function getImageUrl($request){
        if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = date('YmdHis').'.'.self::$image->getClientOriginalExtension();
            self::$directory    = 'upload/subcategory_images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl     = self::$directory.self::$imageName;
            return self::$imageUrl;
        }
    }
    // data store
    public static function newSubCategory($request){
        $request->validate([
            'category_id'=>'required',
            'sub_category_name' => 'required|max:20',
            'sub_category_description' => 'required|max:2000',
            'image' => 'required|image|mimes:jpg,jpeg,gif,png|dimensions:min_width=300,min_height=300'
        ]);

        self::$sub_category =  new Sub_category();
        self::$sub_category->category_id                = $request->category_id;
        self::$sub_category->sub_category_name          = $request->sub_category_name;
        self::$sub_category->sub_category_description   = $request->sub_category_description;
        self::$sub_category->image                      = self::getImageUrl($request);;
        self::$sub_category->save();
    }
    // relationship category & subcategory
    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }

    /// update data
    public static function update_Sub_Category($request,$id){

        self::$sub_category = Sub_Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$sub_category->image))
            {
                unlink(self::$sub_category->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$sub_category->image;
        }
       self::$sub_category->category_id                 = $request->category_id;
       self::$sub_category->sub_category_name           = $request->sub_category_name;
       self::$sub_category->sub_category_description    = $request->sub_category_description;
       self::$sub_category->image                       = self::$imageUrl;
       self::$sub_category->save();
    }

    // delete data

    public static function delete_sub_category($id){
        self::$sub_category = Sub_category::find($id);

        if(file_exists(self::$sub_category->image)){
            unlink(self::$sub_category->image);
        }

        self::$sub_category->delete();
    }
}
