<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    //

    public function addComment(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'comment_body' => 'required|string'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with('message', 'Please comment first');
        }
        if (Auth::check()) {
            $post = Post::where('slug', $request->slug_value)->where('status', '0')->first();
            //dd($post);
            if ($post) {
                Comment::create([
                    'post_id' => $post->id,
                    'comment_body' => $request->comment_body,
                    'user_id' => Auth::user()->id,
                ]);
            }
            return redirect()->back()->with('message', 'Successfully commented');
        }

        return redirect('login')->back()->with('message', 'Login first');
    }

    public function deleteComment(Request $request)
    {

        if (Auth::check()) {
            $comment = Comment::where('id', $request->comment_id)->where('user_id', Auth::user()->id)->first();

            if ($comment) {
                $comment->delete();
                return response()->json(
                    [
                        'status' => 200,
                        'message' => 'Comment deleted successfully.'
                    ]
                );
            }
            return response()->json(
                [
                    'status' => 500,
                    'message' => 'Request cannot be processed.'
                ]
            );
        }
        return response()->json(
            [
                'status' => 401,
                'message' => 'You need to be authenticated first'
            ]
        );
    }
}
