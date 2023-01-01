@extends('layouts.app')

@section('title', '2203048 add article')

@section('content')
    <div class="container-fluid px-4">
        {{-- <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category</li>
        </ol> --}}
        <div class="row">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ url('/admin/posts') }}"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-[#881337]">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z">
                                </path>
                            </svg>
                            Admin
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span
                                class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400 text-transform: capitalize">Admin/Add Post</span>
                        </div>
                    </li>
                </ol>
            </nav>
        </div>
        <div class="mt-4 bg-white shadow-md rounded">
            <div class="bg-white shadow-md p-4">
                <h4 class="font-bold">Add Article</h4 </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/add-post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="category_id">Category <span style="color:red">*</span></label>
                            <select name="category_id" class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Article Name <span style="color:red">*</span></label>
                            <input type="text" id="name" value="{{old('name')}}" name="name" class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="slug">Slug <span style="color:red">*</span></label>
                            <input type="text" name="slug" value="{{old('slug')}}" class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="description">Description <span style="color:red">*</span></label>
                            <textarea type="text" value="{{old('description')}}" id="my_summernote" name="description" class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control" placeholder=""></textarea>
                        </div>
                        <div class="mb-3">
                            {{-- <label class="block text-gray-700 text-sm font-bold mb-2" for="yt_iframe">Youtube IFrame Link</label> --}}
                            <input type="hidden" name="yt_iframe" class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control" placeholder="" />
                        </div>
                        
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="meta_description">Meta Description </label>
                            <textarea type="text" value="{{old('meta_description')}}" name="meta_description" class="shadow h-48  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control" placeholder=""></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="meta_title">Meta Title <span style="color:red">*</span></label>
                            <input type="text" value="{{old('meta_title')}}" name="meta_title" class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label class="block text-gray-700 text-sm font-bold mb-2" for="meta_keyword">Meta Keyword </label>
                            <textarea type="text" value="{{old('meta_keyword')}}" name="meta_keyword" class="shadow h-48 border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control" placeholder=""></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white border-blue-700 hover:border-blue-500 font-bold py-2 px-4 rounded-full" type="submit" aria-label="save article">Save Article</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
