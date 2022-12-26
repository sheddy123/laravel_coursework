<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $categories = Category::count();
        $posts = Post::count();
        $bloggers = User::where('role_as', '2')->count();
        $admins = User::where('role_as', '1')->count();
        $users = User::where('role_as', '0')->count();

        $users = $users + $bloggers;

        return view('admin.dashboard', compact('categories', 'posts', 'users', 'admins'));
    }
}
