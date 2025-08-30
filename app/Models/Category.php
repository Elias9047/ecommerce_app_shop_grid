<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    private static $category, $image, $imageName, $directory, $imageUrl;
    protected $fillable = ['category_name', 'category_description', 'image', 'status']; // hacker don't inject
    //image store
    public static function getImageUrl($request)
    {
         if ($request->file('image')) {
            self::$image = $request->file('image');
            self::$imageName = time().'.'.self::$image->getClientOriginalExtension();
            self::$directory    = 'upload/subcategory_images/';
            self::$image->move(self::$directory, self::$imageName);
            self::$imageUrl     = self::$directory.self::$imageName;
            return self::$imageUrl;
        }
    }
    // store
    public static function newCategory($request)
    {
         $request->validate([
            'category_name' => 'required|max:20',
            'category_description' => 'required|max:2000',
            'image' => 'required|image|mimes:jpg,jpeg,gif,png|dimensions:min_width=300,min_height=300'
        ]);

        self::$category = new Category();
        self::$category->category_name           = $request->category_name;
        self::$category->category_description    = $request->category_description;
        self::$category->image                   = self::getImageUrl($request);
        self::$category->save();
    }

    //data update
     public static function updateCategory($request, $id)
    {
        self::$category = Category::find($id);
        if ($request->file('image'))
        {
            if (file_exists(self::$category->image))
            {
                unlink(self::$category->image);
            }
            self::$imageUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imageUrl = self::$category->image;
        }

        self::$category->category_name           = $request->category_name;
        self::$category->category_description    = $request->category_description;
        self::$category->image          = self::$imageUrl;
        self::$category->save();
    }

    // delete data

     public static function deleteCategory($id)
    {
        self::$category = Category::find($id);
        if (file_exists(self::$category->image))
        {
            unlink(self::$category->image);
        }
        self::$category->delete();
    }

}
