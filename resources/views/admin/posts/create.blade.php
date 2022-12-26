@extends('layouts.master')

@section('title', '2203048 add article')

@section('content')
    <div class="container-fluid px-4">
        {{-- <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category</li>
        </ol> --}}
        <div class="row">
        </div>
        <div class="card mt-4">
            <div class="card-header shadow-md">
                <h4>Add Article</h4 </div>
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
                            <label for="category_id">Category <span style="color:red">*</span></label>
                            <select name="category_id" class="form-control">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name">Article Name <span style="color:red">*</span></label>
                            <input type="text" id="name" value="{{old('name')}}" name="name" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug <span style="color:red">*</span></label>
                            <input type="text" name="slug" value="{{old('slug')}}" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="description">Description <span style="color:red">*</span></label>
                            <textarea type="text" value="{{old('description')}}" id="my_summernote" name="description" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="yt_iframe">Youtube IFrame Link</label> --}}
                            <input type="hidden" name="yt_iframe" class="form-control" placeholder="" />
                        </div>

                        {{-- <h6>SEO Tags</h6> --}}
                        
                        <div class="mb-3">
                            <label for="meta_description">Meta Description </label>
                            <textarea type="text" value="{{old('meta_description')}}" name="meta_description" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="meta_title">Meta Title <span style="color:red">*</span></label>
                            <input type="text" value="{{old('meta_title')}}" name="meta_title" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="meta_keyword">Meta Keyword </label>
                            <textarea type="text" value="{{old('meta_keyword')}}" name="meta_keyword" class="form-control" placeholder=""></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" placeholder="" />
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit" aria-label="save article">Save Article</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
