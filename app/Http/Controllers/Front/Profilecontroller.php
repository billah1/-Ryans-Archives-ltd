<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\UserBlog;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\BufferingLogger;

class Profilecontroller extends Controller
{
    protected $info;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Fornt.profile.userinfo',[
            'user' => auth()->user(),
            'blog' => UserBlog::all()


        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        UserBlog::addblog($request);
        return redirect()->route('user.profile.create');
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
    public function edit( $id)
    {
        return view('Fornt.profile.profileedit',[
            'info' => User::findorFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request,  $id)
    {
//        return User::all();

        $user = User::findorFail($id);
        $user->update([
            'phone'=>$request->input('phone'),
            'address'=>$request->input('address'),

        ]);
        return redirect()->route('user.profile.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->info = UserBlog::find($id);
        {
            unlink($this->info->image);
        }
        $this->info->delete();
        return redirect()->back();




    }
}
