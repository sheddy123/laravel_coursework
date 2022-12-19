@extends('layouts.master')

@section('title', '2203048 blog categories')

@section('content')
    <div class="container-fluid px-4">

        <div class="card mt-4">
            <div class="card-header">
                <h4>View Category
                    <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add
                        Category</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/category/' . $category->image) }}" width="50px" height="50px" alt="img"
                                        class="" />
                                </td>
                                <td>{{ $category->status == '1' ? 'Hidden' : 'Shown' }}</td>
                                <td><a href="{{url('admin/edit/'.$category->id)}}" class="btn btn-success">Edit</a></td>
                                <td><a href="{{url('admin/delete/'.$category->id)}}" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
