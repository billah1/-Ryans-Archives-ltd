<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class UserBlog extends Model
{
    use HasFactory;
    protected $guarded = [];
    public  static $info;
    public  static  function addblog($request)
    {
       

        self::$info = new UserBlog();
        self::$info->title = $request->title;
        self::$info->content = $request->content;
        self::$info->user_id = Auth::id(); 
        self::$info->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

public function comments()
{
    return $this->hasMany(Comment::class, 'blog_id');
}

}
