<?php

namespace App\Http\Controllers\UI;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UIController extends Controller
{
    //
    public function index()
    {
        return view('ui.index');
    }

    public function viewCategoryPost($category_id)
    {
        $category = Category::where('id', $category_id)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category_id)->where('status', '0')->paginate(1);

            return view('ui.post.index', compact('post', 'category'));
        }
        return redirect('/');
    }

    public function viewPost(string $category_id, string $post_slug)
    {
        $category = Category::where('id', $category_id)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category_id)->where('slug', $post_slug)->where('status', '0')->first();
            //$latest_posts = Post::where('category_id', $category_id)->where('status', '0')->orderBy('created_at', 'DESC')->get()->take(5);
            $latest_posts = Post::orderBy('created_at', 'DESC')->get()->take(5);

            return view('ui.post.view', compact('post', 'latest_posts'));
        }
        return redirect('/');
    }
}
