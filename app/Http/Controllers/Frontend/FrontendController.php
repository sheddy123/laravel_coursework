<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    //
    public function index()
    {
        return view('frontend.index');
    }

    public function viewCategoryPost($category_id)
    {
        $category = Category::where('id', $category_id)->where('status', '0')->first();
        if ($category) {
            $post = Post::where('category_id', $category_id)->where('status', '0')->paginate(1);

            return view('frontend.post.index', compact('post', 'category'));
        }
        return redirect('/');
    }
}
