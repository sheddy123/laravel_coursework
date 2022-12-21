@extends('layouts.app')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                        <h4>{!! $post->name !!}</h4>
                    </div>
                    <div>
                        <h6>{{ $post->category->name . '/' . $post->name }}</h6>
                    </div>
                    <div class="card card-shadow mt-4">
                        <div class="card-body post-description">
                            {!! $post->description !!}
                        </div>
                    </div>
                    <div class="comment-area mt-4">

                        @if (session('message'))
                            <h6 class="alert alert-warning mb-3">{{ session('message') }}</h6>
                        @endif
                        <div class="card card-body">
                            <h6 class="card-title">Leave a comment</h6>
                            <form action="{{ url('comments') }}" method="POST">
                                @csrf
                                <input type="hidden" name="slug_value" value="{{ $post->slug }}">
                                <textarea name="comment_body" id="" class="form-control" cols="30" rows="5" required>

                                </textarea>
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </form>
                        </div>

                        @forelse ($post->comments as $postComment)
                            <div class="card_comment_container card card-body shadow-sm mt-3">
                                <div class="detail-area">
                                    <h6 class="user-name mb-1">
                                        @if ($postComment->user)
                                            {{ $postComment->user->name }}
                                        @endif
                                        <small class="ms-3 text-primary">Commented on:
                                            {{ $postComment->created_at->format('d-m-Y') }}</small>
                                    </h6>
                                    <p class="user-comment mb-1">
                                        {!! $postComment->comment_body !!}
                                    </p>
                                </div>
                                @if (Auth::check() && Auth::id() == $postComment->user_id)
                                    <div>
                                        <a href="" class="btn btn-primary btn-sm me-2">Edit</a>
                                        <button type="button" value="{{ $postComment->id }}"
                                            class="btn btn-danger btn-sm me-2 btnCommentDelete">Delete</button>
                                    </div>
                                @endif
                            </div>
                        @empty
                            <h6>No comment yet</h6>
                        @endforelse
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="border p-2 my-2">
                        <h4>Advertising Area</h4>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header">
                            <h4> Latest Post</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latest_posts as $latest_post)
                                <a href="{{ url('tutorial/' . $latest_post->category->id . '/' . $latest_post->slug) }}"
                                    class="text-decoration-none">
                                    <h6>>> {{ $latest_post->name }}</h6>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                }
            })
            $(document).on('click', '.btnCommentDelete', function() {
                if(confirm('Are you sure you want to delete this')){
                    var clickedItem = $(this);
                    let idComment = clickedItem.val();  

                    $.ajax({
                        type: "POST",
                        url:'/delete-comment',
                        data:{'comment_id': idComment},
                        dataType:"application/json",
                        success: function(data){
                            if(data.status == 200){
                                clickedItem.closest('.card_comment_container').remove();
                                alert(data.message);
                            }
                            else{
                                alert('something went wrong');
                            }
                        }
                    });
                }
            });
        });
    </script>
@endsection
