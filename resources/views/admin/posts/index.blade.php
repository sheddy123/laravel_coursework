@extends('layouts.master')

@section('title', '2203048 blog articles')

@section('content')
    <div class="container-fluid px-4 mt-4">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-header">
                <h4>View Articles
                    <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add Articles</a>
                </h4>
            </div>
            <div class="card-body">
                <table id="myDataTable" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Article Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{$post->id}}</td>
                            <td>{{$post->category->name}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->status == '0' ? 'Shown' : 'Hidden'}}</td>
                            <td><a href="{{url('admin/post/'.$post->id)}}" class="btn btn-success">Edit</a>
                            &nbsp;
                            &nbsp;<a href="{{url('admin/delete-post/'.$post->id)}}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
