<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\UserBlog;
use App\Models\User;
use App\Models\Admin\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class HomeCOntrolle extends Controller
{
    public  function Home()
    {
        return view('Fornt.home.home', [
            'blogs' => UserBlog::with('comments.user')->get(),
        ]);
    }



    public function pageOne($slug)
    {
        $category =  Category::where('name',$slug)->first();


        $blogs = Blog::where('category_id',$category->id)->latest()->get();
        return view('Fornt.home.page_one', compact('category','blogs'));


    }

    public  function details($id)
    {
        return view('Fornt.home.details',[
            'detail' => UserBlog::find($id)
        ]);
    }
}
