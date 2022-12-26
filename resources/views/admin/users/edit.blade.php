@extends('layouts.master')

@section('title', '2203048 blog users')

@section('content')
    <div class="container-fluid px-4 mt-4">
        <div class="card">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="card-header">
                <h4>Edit Users
                    <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="">Full Name</label>
                    <p class="form-control">{{ $user->name }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Email Address</label> 
                    <p class="form-control">{{ $user->email }}</p>
                </div>
                <div class="mb-3">
                    <label for="">Created At</label>
                    <p class="form-control">{{ $user->created_at->format('d/m/y') }}</p>
                </div>

                <form action="{{url('admin/update-user/'.$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="role_as">Role <span style="color:red">*</span></label>
                        <select name="role_as" class="form-control" id="role_as">
                            <option value="1"{{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                        </select>
                    </div>
                    <div class="mb-3"><button type="submit" class="btn btn-primary">Update User Role</button></div>
                </form>
            </div>
        </div>
    </div>
@endsection
