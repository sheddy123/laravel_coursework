<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PostFormRequest;
use Illuminate\Support\Str;

class PostController extends Controller
{
    //

    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('status', '0')->get();
        return view('admin.posts.create', compact('categories'));
    }

    public function create_post(PostFormRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        $post = new Post;
        $post->name = $data['name'];
        $post->category_id = $data['category_id'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->created_by = Auth::user()->id;
        $post->status = $request->status == true ? '1' : '0';

        $post->save();

        return redirect('admin/posts')->with('message', 'Post added successfully');
    }

    public function edit_post($post_id)
    {
        $categories = Category::where('status', '0')->get();
        $post = Post::find($post_id);
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(PostFormRequest $request, $post_id)
    {
        $data = $request->validated();
        //dd($data);
        $post = Post::find($post_id);
        $post->name = $data['name'];
        $post->category_id = $data['category_id'];
        $post->slug = Str::slug($data['slug']);
        $post->description = $data['description'];
        $post->yt_iframe = $data['yt_iframe'];
        $post->meta_title = $data['meta_title'];
        $post->meta_description = $data['meta_description'];
        $post->meta_keyword = $data['meta_keyword'];
        $post->created_by = Auth::user()->id;
        $post->status = $request->status == true ? '1' : '0';

        $post->update();

        return redirect('admin/posts')->with('message', 'Post updated successfully');
    }
    public function delete_post($id)
    {
        $post = Post::find($id);

        if ($post) {
            $post->delete();
            return redirect('admin/posts')->with('message', 'Post deleted successfully');
        }
        return redirect('admin/posts')->with('message', 'Post Not Found');
    }
}
