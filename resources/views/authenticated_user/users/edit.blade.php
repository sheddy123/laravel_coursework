@extends('layouts.app')

@section('title', '2203048 blog users')

@section('content')
    <div class="container-fluid px-4 mt-4">
        <nav class="flex" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ url('/admin/users') }}"
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
                            class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400 text-transform: capitalize">Admin/User(s)</span>
                    </div>
                </li>
            </ol>
        </nav>
        <div class="mt-4 bg-white shadow-md rounded">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="bg-white shadow-md p-4">
                <h4 class="font-bold">Edit Users
                    <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Full Name</label>
                    <p class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline ">{{ $user->name }}</p>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Email Address</label> 
                    <p class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline ">{{ $user->email }}</p>
                </div>
                <div class="mb-3">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="">Created At</label>
                    <p class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline ">{{ $user->created_at->format('d/m/y') }}</p>
                </div>

                <form action="{{url('admin/update-user/'.$user->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="role_as">Role <span style="color:red">*</span></label>
                        <select name="role_as" class="shadow  border appearance-none  w-full rounded py-2  text-gray-700 px-3 leading-tight focus:outline-none focus:shadow-outline form-control" id="role_as">
                            <option value="1"{{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white border-blue-700 hover:border-blue-500 font-bold py-2 px-4 rounded-full" type="submit" aria-label="update article">Update User Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
