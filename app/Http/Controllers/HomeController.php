<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category = Category::all();
        if ($category) {
            if (request('name') ?? false) {
                $latest_posts = Post::latest()->where('name', 'like', '%' . request('name') . '%')->paginate(5);
            } else {
                $latest_posts = Post::latest()->paginate(5);
            }
            
            return view('home', compact('latest_posts', 'category'));
        }
    }
}
