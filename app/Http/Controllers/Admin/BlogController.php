<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\Blog;
use App\Models\Admin\Category;


class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     private $blog;
     /**
      * Display a listing of the resource.
      */
     public function index()
     {
         return view('back.blog.index', [
             'blogs' => Blog::all(),
         ]);
     }
 
     /**
      * Show the form for creating a new resource.
      */
     public function create()
     {
         return view('back.blog.creat',[
             'categories'    => Category::all(),
         ]);
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store(Request $request)
     {
         Blog::createBlog($request);
         return redirect()->back()->with('success','Blog create successfully.');
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
         return view('back.blog.edit',[
             'categories'    => Category::all(),
             'blog' => Blog::find($id)
         ]);
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update(Request $request, string $id)
     {
         Blog::updatedBlog($request,$id);
         return redirect()->back()->with('success','Blog Update successfully.');
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(string $id)
     {
         $this->blog = Blog::find($id);
         $this->blog->delete();
         return redirect()->back()->with('success','Blog delete Successfully.');
     }
 
}
