<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected static $blog;
   
    public static function createBlog($request)
    {
        self::$blog                     = new Blog();
        self::$blog->category_id        = $request->category_id;
        self::$blog->name               = $request->name;
        self::$blog->description        = $request->description;
        self::$blog->save();
    }

    public static function updatedBlog($request, $id)
    {
        self::$blog                    = Blog::find($id);
        self::$blog->category_id     = $request->category_id;
        self::$blog->name            = $request->name;
        self::$blog->description     = $request->description;
        self::$blog->save();
    }
    public  function  category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
