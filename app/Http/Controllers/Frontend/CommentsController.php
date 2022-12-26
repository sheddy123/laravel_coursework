<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Mail\CommentsMailable;
use App\Http\Controllers\Controller;
use App\Services\SendEmailService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CommentsController extends Controller
{
    //
    private SendEmailService $_sendEmailService;
    public function __construct(SendEmailService $sendEmailService)
    {
        $this->_sendEmailService = $sendEmailService;
    }


    public function addComment(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'comment_body' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'message' => 'Please comment first'
                ]
            );
        }
        if (Auth::check()) {
            $post = Post::where('slug', $request->slug_value)->where('status', '0')->first();
            //dd($post);
            if ($post) {
                //Retrieve user who posted the article
                $user = User::where('id', $post->created_by)->first();

                Comment::create([
                    'post_id' => $post->id,
                    'comment_body' => $request->comment_body,
                    'user_id' => Auth::user()->id,
                ]);

                //Post Notification
                $this->_sendEmailService->sendEmail($user->name, Auth::user()->name, $request->comment_body, $user->email);
            }
            $latest_comments = Comment::orderBy('created_at', 'DESC')->get()->take(1); //Comment::latest();

            return response()->json(
                [
                    'status' => 201,
                    'message' => 'Successfully commented',
                    'latest_comments' => $latest_comments,
                    'request' => $request->all(),
                    'user_name' => Auth::user()->name
                ]
            );
        }
        return response()->json(
            [
                'status' => 401,
                'message' => 'Login first'
            ]
        );
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

    public function edit_comment($comment_id)
    {
        $comment = Comment::find($comment_id);
        if($comment){
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Success',
                    'comment' => $comment,
                    'user_name' => Auth::user()->name
                ]
            );
        }
        return response()->json(
            [
                'status' => 401,
                'message' => 'Comment does not exist',
                'user_name' => Auth::user()->name
            ]
        );
    }

    public function update(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'comment_body' => 'required|string'
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'message' => 'Please comment first'
                ]
            );
        }
        if (Auth::check()) {
            $comment = Comment::find($request->comment_id);
            
            if ($comment) {
                $comment->comment_body = $request->comment_body;
                $comment->update();
                return response()->json(
                    [
                        'status' => 200,
                        'message' => 'Successfully updated article',
                        'request' => $request->all(),
                        'user_name' => Auth::user()->name
                    ]
                );
            }
        }

        return response()->json(
            [
                'status' => 400,
                'message' => 'Invalid request'
            ]
        );
    }
}
