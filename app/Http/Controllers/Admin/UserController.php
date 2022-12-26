<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //

    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    

    

    public function usersArticles($user_name)
    {
        $user = User::where('name', 'like', '%' . $user_name . '%')->first();
        //dd($user_posts);
        $latest_posts = Post::latest()->paginate(5);

        if($user){
            $user_posts = Post::where('created_by', $user->id)->get();
            return view('frontend.post.userarticles', compact('latest_posts', 'user', 'user_name', 'user_posts'));
        }
        $user_posts = [];
        return view('frontend.post.userarticles', compact('latest_posts', 'user', 'user_name', 'user_posts'));


    }
    public function update(Request $request, $user_id)
    {
        $user = User::find($user_id);

        if ($user) {
            $user->role_as = $request->role_as;
            $user->update();
            return redirect('admin/users')->with('message', 'message updated successfully');
        }
        return redirect('admin/users')->with('message', 'No user found');
    }
    
    public function edit($user_id)
    {
        $user = User::find($user_id);
        return view('admin.users.edit', compact('user'));
    }
}
