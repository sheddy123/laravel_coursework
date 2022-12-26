@extends('layouts.app')

@section('content')
    <div class="py-4">

        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-9">
                    <x-link-breadcrumb :slug="$post->slug" />
                    <div class="category-heading shadow-md text-transform: capitalize">
                        <h4 class="underline underline-offset-1 text-transform: capitalize">{!! $post->name !!}</h4>
                    </div>
                    {{-- <div>
                        <h6>{{ $post->category->name . '/' . $post->name }}</h6>
                    </div> --}}
                    <div class="card card-shadow mt-4">
                        <div class="card-body post-description">
                            {!! $post->description !!}
                        </div>
                        <div class=" p-8">
                            <span class="text-sm font-bold">Keywords:</span>
                            <x-meta-tags :metaTagsCsv="$post->meta_keyword" />
                        </div>
                    </div>
                    <div class="comment-area mt-4">
                        <h6 id="alertMessage"></h6>
                        {{-- @if (session('message'))
                            <h6 class="alert alert-warning mb-3 " id="alertMessage">{{ session('message') }}</h6>
                        @endif --}}

                        <div class="card card-body">

                            <form action="{{ url('comments') }}" method="POST">
                                @csrf

                                <label for="message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-[#881337]">Your
                                    message</label>
                                <textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900  rounded-lg border border-gray-300   dark:border-gray-600 dark:placeholder-gray-400 rounded-lg z-0 focus:shadow focus:outline-none h-64"
                                    placeholder="Leave a comment..." id="textAreaId" name="comment_body"></textarea>

                                <input type="hidden" name="slug_value" value="{{ $post->slug }}">
                                {{-- <textarea name="comment_body" id="" class="form-control" cols="30" rows="5" required>

                                </textarea> --}}
                                <button type="button"
                                    class="bg-[#881337] btnSubmitComment text-white rounded-none py-2 px-4 hover:bg-black mt-4" aria-label="add comment">Add Comment</button>
                            </form>
                        </div>

                        <div class="mainComment">
                            @forelse ($post->comments as $postComment)
                                <div class="card_comment_container card card-body shadow-sm mt-3"
                                    id="{{ 'card_comment_' . $postComment->id }}">
                                    <div class="detail-area">
                                        <h6 class="user-name mb-1 font-bold">
                                            @if ($postComment->user)
                                                {{ $postComment->user->name }}
                                            @endif
                                            <small class="ms-3 text-primary">Commented on:
                                                {{ $postComment->created_at->format('d-m-Y') }}</small>
                                        </h6>
                                        <p class="user-comment mb-1 text-sm" id="user_comment_{{$postComment->id}}">
                                            {!! $postComment->comment_body !!}
                                        </p>
                                    </div>

                                    @if (Auth::check() && Auth::id() == $postComment->user_id)
                                        <div>
                                            {{-- <a href="" class="btn btn-primary btn-sm me-2">Edit</a> --}}
                                            <button type="button" value="{{ $postComment->id }}"
                                                class="bg-[#312e81] text-white btnEditComment rounded-none py-2 px-4 hover:bg-black mt-4" aria-label="edit comment">Edit Comment</button>
                                            <button type="button" value="{{ $postComment->id }}"
                                                class="bg-red-700 text-white btnDeleteComment rounded-none py-2 px-4 hover:bg-black mt-4" aria-label="delete comment">Delete Comment</button>
                                        </div>
                                    @endif
                                </div>
                            @empty
                                <br />
                                <h6 class="text-sm">No comment(s) yet</h6>
                            @endforelse
                        </div>
                    </div>
                </div>

                <div class="col-md-3">
                    @include('layouts.inc.f_end-search')
                    <x-latest-posts :latest_posts="$latest_posts" />
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            })

            //Post Comment
            $(document).on('click', '.btnSubmitComment', function() {
                //if (confirm('Are you sure you want to delete this')) {

                let comment_body = $('textarea[name="comment_body"]').val();
                let slug_value = $('input[name="slug_value"]').val();

                $.ajax({
                    type: "POST",
                    url: '/comments',
                    data: {
                        'comment_body': comment_body,
                        'slug_value': slug_value
                    },
                    //dataType: "application/json",
                    success: function(data) {
                        let element = document.getElementById("alertMessage");
                        if (data.status == 201) {
                            //  console.log(data?.user_name);
                            // console.log(data);
                            const isUserAuth = {!! Auth::check() !!};
                            const userAuthId = {!! Auth::id() !!};
                            const mydate = new Date(data?.latest_comments[0].created_at);


                            let deleteTag = '';
                            if (isUserAuth && userAuthId == data?.latest_comments[0]?.user_id) {
                                deleteTag = `<div><button type="button" value="${data?.latest_comments[0]?.id}"
                                                class="bg-[#312e81] text-white btnEditComment rounded-none py-2 px-4 hover:bg-black mt-4" aria-label="edit comment">Edit Comment</button>
                                            <button type="button" value="${data?.latest_comments[0]?.id}"
                                                class="bg-red-700 text-white btnDeleteComment rounded-none py-2 px-4 hover:bg-black mt-4" aria-label="delete comment">Delete Comment</button></div>`;
                            }

                            const div = $(
                                `<div id="${'card_comment_'+data?.latest_comments[0]?.id}"  class='card_comment_container card card-body shadow-sm mt-3'><div class='detail-area'><h6 class='user-name mb-1 font-bold'>` +
                                data?.user_name +
                                "<small class='ms-3 text-primary'>Commented on:" +
                                mydate.toDateString() +
                                `</small></h6> <p id="user_comment_${data?.latest_comments[0]?.id}" class='user-comment mb-1 text-sm'>` + data
                                ?.latest_comments[0]?.comment_body + "</p></div>" +
                                deleteTag + "</div>");
                            $(".mainComment").append(div);
                            element.innerHTML = data?.message;
                            element.className = '';
                        } else {

                            element.innerHTML = data?.message;
                            element.className += ' alert';
                            element.className += ' alert-warning';
                            element.className += ' mb-3';
                            //element.classList.add("alert alert-warning mb-3");
                            //alert('something went wrong');
                        }
                    }
                });
                //}
            });
            //Delete Comment
            $(document).on('click', '.btnDeleteComment', function() {
                if (confirm('Are you sure you want to delete this')) {
                    var clickedItem = $(this);
                    let idComment = clickedItem.val();

                    $.ajax({
                        type: "POST",
                        url: '/delete-comment',
                        data: {
                            'comment_id': idComment
                        },
                        //dataType: "application/json",
                        success: function(data) {
                            if (data.status == 200) {
                                clickedItem.closest('.card_comment_container').remove();
                                // alert(data.message);
                            } else {
                                alert('something went wrong');
                            }
                        }
                    });
                }
            });

            //Edit Comment
            $(document).on('click', '.btnEditComment', function() {
                
                var clickedItem = $(this);
                let idComment = clickedItem.val();

                $.ajax({
                    type: "GET",
                    url: '/edit-comment/' + idComment,
                    // data: {
                    //     'comment_id': idComment
                    // },
                    //dataType: "application/json",
                    success: function(data) {
                        if (data.status == 200) {
                            var editBtnId = clickedItem.attr(
                                'value'); //.attr('class').split(' ');
                                console.log(editBtnId);
                            let textAreaDiv =
                                `<div class="textAreaUpDelete_${editBtnId}"><textarea id="message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 mt-2  rounded-lg border border-gray-300   dark:border-gray-600 dark:placeholder-gray-400 rounded-lg z-0 focus:shadow focus:outline-none h-64"
                                    placeholder="Leave a comment..." id="textAreaId_${editBtnId}" name="comment_body_${editBtnId}">${data?.comment?.comment_body}</textarea>
                                    <div> <button type="button"
                                    class="bg-[#881337] btnUpdateComment text-white rounded-none py-2 px-4 hover:bg-black mt-4" id="${editBtnId}" aria-label="update comment" >Update Comment</button> <button type="button"
                                    class="bg-[#93c5fd] btnCloseComment text-white rounded-none py-2 px-4 hover:bg-black mt-4" id="${editBtnId}" style="float: inline-end;">Close</button></div></div>`;
                            $("#card_comment_" + editBtnId).append(textAreaDiv);
                        } else {
                            alert('something went wrong');
                        }
                    }
                });
            });

            //Update record
            $(document).on('click', '.btnUpdateComment', function() {
                var updateBtnId = $(this).attr('id');
                let comment_body = $(`textarea[name="comment_body_${updateBtnId}"]`).val();

                $.ajax({
                    type: "POST",
                    url: '/update-comment',
                    data: {
                        'comment_id': updateBtnId,
                        'comment_body': comment_body
                    },
                    //dataType: "application/json",
                    success: function(data) {
                        if (data.status == 200) {
                            $('.textAreaUpDelete_' + updateBtnId).remove();
                            $("#user_comment_"+updateBtnId).html(comment_body);
                            alert(data?.message);
                        } else {
                            alert('something went wrong');
                        }
                    }
                });
            });

            //Close textbox edit comment
            $(document).on('click', '.btnCloseComment', function() {
                let closeBtnId = $(this).attr('id');
                $('.textAreaUpDelete_' + closeBtnId).remove();
            });
        });
    </script>
@endsection
