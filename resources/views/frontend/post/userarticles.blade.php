@extends('layouts.app')

@section('title', 'Articles')
@section('meta_description', 'Users articles')
@section('meta_keyword', '')
@section('content')
    <div class="py-4">
        <div class="container mx-auto px-24">
            <div class="row">
                <div class="col-md-9">

                    <div class="lg:grid gap-4 space-y-4 md:space-y-0 mx-4">
                        <x-link-breadcrumb />
                        <div class="category-heading">
                            <h4 class="text-[#881337]"><span class="font-bold">{{ $user_name }}</span> Articles</h4>
                        </div>
                        <br />

                    </div>

                    <div class="mx-4">
                        <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                            <header>
                                <h1 class="text-3xl text-center font-bold my-6 uppercase">
                                    POSTS
                                </h1>
                            </header>

                            <table class="w-full table-auto rounded-sm">
                                <tbody>
                                    @forelse($user_posts as $postItem)
                                    @php
                                     $length = count($postItem->comments)   
                                    @endphp
                                        <tr class="border-gray-300">
                                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                                <a href="{{ url('category/' . $postItem->category->id . '/' . $postItem->slug) }}"
                                                    class="text-red-600 capitalize">
                                                    {{ $postItem->name }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                                <span class="text-red-600 text-sm">No of comments <span class="font-bold">({{$length}})</span> </span>

                                            </td>
                                            <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                                                <span class="text-red-600 text-sm">Posted on {{ $postItem->created_at->format('d-m-Y') }} </span>

                                            </td>
                                        </tr>
                                    @empty
                                        <div class="card card-shadow mt-4">
                                            <div class="card-body">
                                                <h2>No post available</h2>
                                            </div>
                                        </div>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
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
                                    <h6
                                        class="text-sm text-orange-800 font-bold underline underline-offset-1 text-transform: capitalize">
                                        {{ $latest_post->name }}</h6>
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
