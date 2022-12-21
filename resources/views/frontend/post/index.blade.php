@extends('layouts.app')

@section('title', "$category->name")
@section('meta_description', "$category->meta_description")
@section('meta_keyword', "$category->meta_keyword")
@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="category-heading">
                        <h4>{{ $category->name }}</h4>
                    </div>
                    @forelse($post as $postItem)
                        <div class="card card-shadow mt-4">
                            <a href="{{ url('tutorial/' . $category->id . '/' . $postItem->slug) }}"
                                class="text-decoration-none">
                                <div class="card-body">
                                    <h2 class="post-heading">{{ $postItem->name }}</h2>
                                </div>
                            </a>
                            <h6>Posted on: {{ $postItem->created_at->format('d-m-Y') }}
                                <span class="ms-3">Posted by: {{ $postItem->user->name }}</span>
                            </h6>
                        </div>

                    @empty
                        <div class="card card-shadow mt-4">
                            <div class="card-body">
                                <h2>No post available</h2>
                            </div>
                        </div>
                    @endforelse
                    <div class="your-paginate mt-2">
                        {{ $post->links() }}
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="border p-2">
                        <h4>Advertising Area</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
