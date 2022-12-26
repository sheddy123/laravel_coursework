{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}


@extends('layouts.app')

@section('title', 'Articles')
@section('meta_description', 'Collection of articles')
@section('meta_keyword', '')
@section('content')
    <div class="py-4">
        <div class="container mx-auto">
            <div class="row">
                <div class="col-md-9">

                    <div class="lg:grid gap-4 space-y-4 md:space-y-0 mx-4">
                        <x-link-breadcrumb />
                        <div class="category-heading">
                            <h4 class="text-[#881337]">Latest Articles</h4>
                        </div>
                        <br />

                    </div>

                    <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

                        @forelse($latest_posts as $postItem)
                            <!-- Item 1 -->
                            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                                <div class="flex">
                                    <img class="hidden w-48 mr-6 md:block"
                                        src="{{ asset('uploads/category/' . $postItem->category->image) }}"
                                        alt="" />
                                    <div>
                                        <h3 class="text-1xl font-bold">
                                            <a class="hover:text-[#881337] underline underline-offset-1 text-transform: capitalize"
                                                href="{{ url('category/' . $postItem->category->id . '/' . $postItem->slug) }}">{{ $postItem->name }}</a>
                                        </h3>
                                        <x-meta-tags :metaTagsCsv="$postItem->meta_keyword" />
                                        <div class="text-lg mt-4">
                                            <span class="font-bold">Category: {{ $postItem->category->name }}</span><br />
                                            <a href="{{ url('user/' . $postItem->user->name) }}"><span class="text-sm">Posted
                                                    by: {{ $postItem->user->name }}</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <div class="card card-shadow mt-4">
                                <div class="card-body">
                                    <h2>No post available</h2>
                                </div>
                            </div>
                        @endforelse
                        <div class="your-paginate mt-2">
                            {{-- {{ $post->links() }} --}}
                        </div>
                        <br/>
                    </div>
                </div>
                <div class="col-md-3">
                    @include('layouts.inc.f_end-search')
                    {{-- <x-latest-posts :latest_posts="$latest_posts" /> --}}
                    <div class="card mt-3 shadow-sm">
                        <div class="card-header">
                            <h4 class="font-bold"> Latest Post(s)</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($latest_posts as $latest_post)
                                <a href="{{ url('category/' . $latest_post->category->id . '/' . $latest_post->slug) }}"
                                    class="text-decoration-none ">
                                    <h6 class="text-sm text-orange-800 font-bold text-transform: capitalize"> <span
                                            class="text-sm font-bold no-underline">>></span> <span
                                            class="underline underline-offset-1"> {{ $latest_post->name }}</span></h6>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-6 p-4">
            {{ $latest_posts->links() }}
        </div>
    </div>
@endsection
