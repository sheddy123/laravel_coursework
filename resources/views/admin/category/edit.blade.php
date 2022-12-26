@extends('layouts.master')

@section('title', '2203048 edit category')

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
                <h4>Edit Category</h4 </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/update/'.$category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Category Name <span style="color:red">*</span></label>
                            <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug <span style="color:red">*</span></label>
                            <input type="text" name="slug" value="{{$category->slug}}" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="description">Description <span style="color:red">*</span></label>
                            <textarea type="text" name="description" id="my_summernote" class="form-control" placeholder="">{!!$category->description!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image">Image <span style="color:red">*</span></label>
                            <input type="file" name="image" value="{{$category->image}}" class="form-control" placeholder="" />
                        </div>

                        <h6>SEO Tags</h6>
                        <div class="mb-3">
                            <label for="meta_title">Meta Title <span style="color:red">*</span></label>
                            <input type="text" name="meta_title" value="{{$category->meta_title}}" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="meta_description">Meta Description </label>
                            <input type="text" name="meta_description" value="{{$category->meta_description}}" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="meta_keyword">Meta Keywords</label>
                            <textarea type="text" name="meta_keyword" class="form-control" placeholder="">{!!$category->meta_keyword!!}</textarea>
                        </div>

                        <h6>Status Mode</h6>
                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="navbar_status">Navbar Status</label>
                                <input type="checkbox" {{$category->navbar_status == '1' ? 'checked' : ''}} name="navbar_status" placeholder="" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" {{$category->status == '1' ? 'checked' : ''}} name="status" placeholder="" />
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit" aria-label="update category">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
