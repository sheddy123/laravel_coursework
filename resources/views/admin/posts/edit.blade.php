@extends('layouts.master')

@section('title', '2203048 edit article')

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
                <h4>Edit Article
                    <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">BACK</a>
                </h4 </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ url('admin/edit-post/'.$post->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="category_id">Category <span style="color:red">*</span></label>
                            <select name="category_id" required class="form-control">
                                <option>-- Select Category --</option>
                                @foreach ($categories as $category)
                                    <option {{$post->category_id == $category->id ? 'selected' : ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name">Post Name <span style="color:red">*</span></label>
                            <input type="text" id="name" value="{{$post->name}}" name="name" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="slug">Slug <span style="color:red">*</span></label>
                            <input type="text" name="slug" value="{{$post->slug}}" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="description">Description <span style="color:red">*</span></label>
                            <textarea type="text" id="my_summernote" name="description" class="form-control" placeholder="">{!!$post->description!!} </textarea>
                        </div>
                        <div class="mb-3">
                            {{-- <label for="yt_iframe">Youtube IFrame Link <span style="color:red">*</span></label> --}}
                            <input type="hidden" value="{{$post->yt_iframe}}" name="yt_iframe" class="form-control" placeholder="" />
                        </div>

                        <h6>SEO Tags</h6>
                        <div class="mb-3">
                            <label for="meta_title">Meta Title <span style="color:red">*</span></label>
                            <input type="text" value="{{$post->meta_title}}" name="meta_title" class="form-control" placeholder="" />
                        </div>
                        <div class="mb-3">
                            <label for="meta_description">Meta Description </label>
                            <textarea type="text" name="meta_description" class="form-control" placeholder=""> {!!$post->meta_description!!}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="meta_keyword">Meta Keyword </label>
                            <textarea type="text" value="{{$post->meta_keyword}}" name="meta_keyword" class="form-control" placeholder=""></textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-3 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" {{$post->status == '1' ? 'checked' : ''}} name="status" placeholder="" />
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary" type="submit" aria-label="update article">Update Article</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
