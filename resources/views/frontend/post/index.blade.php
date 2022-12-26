@extends('layouts.app')

@section('title', "$category->name")
@section('meta_description', "$category->meta_description")
@section('meta_keyword', "$category->meta_keyword")
@section('content')
    <div class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-9">

                    <div class="lg:grid gap-4 space-y-4 md:space-y-0 mx-4">
                        <div class="category-heading">
                            <h4 class="text-[#881337]">{{ $category->name }}</h4>
                        </div>
                        <br />
                    </div>
                    @forelse($post as $postItem)
                        <div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
                            <!-- Item 1 -->
                            <div class="bg-gray-50 border border-gray-200 rounded p-6">
                                <div class="flex">
                                    <img class="hidden w-48 mr-6 md:block" src="images/acme.png" alt="" />
                                    <div>
                                        <h3 class="text-2xl">
                                            <a href="{{ url('category/' . $category->id . '/' . $postItem->slug) }}">Senior
                                                Laravel Developer</a>
                                        </h3>
                                        <div class="text-xl font-bold mb-4">{{ $postItem->name }}</div>
                                        <ul class="flex">
                                            <li
                                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                                <a href="#">Laravel</a>
                                            </li>
                                            <li
                                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                                <a href="#">API</a>
                                            </li>
                                            <li
                                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                                <a href="#">Backend</a>
                                            </li>
                                            <li
                                                class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs">
                                                <a href="#">Vue</a>
                                            </li>
                                        </ul>
                                        <div class="text-sm mt-4">
                                            <span class="ms-3">Posted by: {{ $postItem->user->name }}</span>
                                        </div>
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
                        {{ $post->links() }}
                    </div>
                </div>
                <div class="col-md-3">
                    @include('layouts.inc.f_end-search')
                    
                </div>
            </div>
        </div>
    </div>
@endsection
