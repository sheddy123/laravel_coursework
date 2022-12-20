@extends('layouts.master')

@section('title', '2203048 blog users')

@section('content')
    <div class="container-fluid px-4 mt-4">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-header">
                <h4>View Users
                    <a href="{{ url('admin/add-post') }}" class="btn btn-primary float-end">Add User</a>
                </h4>
            </div>
            <div class="card-body">
                <table id="myDataTable" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role_as == '0' ? 'User' : 'Admin'}}</td>
                            <td><a href="{{url('admin/user/'.$user->id)}}" class="btn btn-success">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
