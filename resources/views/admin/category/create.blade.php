@extends('layouts.master')

@section('title', '2203048 add category')

@section('content')
    <div class="container-fluid px-4">
        {{-- <h1 class="mt-4">Add Category</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category</li>
        </ol> --}}
        <div class="row">
        </div>
        <div class="card mt-4">
            <div class="card-header">
                <h4>Add Category</h4 </div>
                <div class="card-body">
                    {{-- @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif --}}
                    <form action="{{ url('admin/add-category') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Category Name <span style="color:red">*</span></label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="" />

                            @error('name')
                            <p class="text-red-500 text-xs mt-1">Category name is required</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug <span style="color:red">*</span></label>
                            <input type="text" name="slug" value="{{old('slug')}}" class="form-control" placeholder="" />
                            @error('slug')
                            <p class="text-red-500 text-xs mt-1">Slug field is required</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Description</label>
                            <textarea type="text" id="my_summernote" value="{{old('description')}}" name="description" class="form-control" placeholder=""></textarea>
                            @error('description')
                            <p class="text-red-500 text-xs mt-1">Description field is required</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image">Image <span style="color:red">*</span></label>
                            <input type="file" name="image" required class="form-control" placeholder="" />
                        </div>

                        <h6>SEO Tags</h6>
                        <div class="mb-3">
                            <label for="meta_title">Meta Title <span style="color:red">*</span></label>
                            <input type="text" name="meta_title" value="{{old('meta_title')}}" class="form-control" placeholder="" />
                            @error('meta_title')
                            <p class="text-red-500 text-xs mt-1">Meta Title field is required</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="meta_description">Meta Description </label>
                            <input type="text" name="meta_description" value="{{old('meta_description')}}" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="meta_keyword">Meta Keywords <span style="color:red">*</span></label>
                            <textarea type="text" name="meta_keyword" value="{{old('meta_keyword')}}" class="form-control" placeholder=""></textarea>
                            @error('meta_keyword')
                            <p class="text-red-500 text-xs mt-1">Meta Keyword field is required</p>
                            @enderror
                        </div>

                        <h6>Status Mode</h6>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="navbar_status">Navbar Status</label>
                                <input type="checkbox" name="navbar_status" placeholder="" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status" placeholder="" />
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit" aria-label="save category">Save Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
