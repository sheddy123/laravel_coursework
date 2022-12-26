@extends('layouts.master')

@section('title', '2203048 blog categories')

@section('content')
    <div class="container-fluid px-4">

        <div class="card mt-4">
            <div class="card-header">
                <h4>View Category
                    @if (Auth::user()->role_as == '1')
                        <a href="{{ url('admin/add-category') }}" class="btn btn-primary btn-sm float-end">Add
                            Category</a>
                    @endif
                </h4>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <table id="myDataTable" class="table table-striped" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Status</th>
                            @if (Auth::user()->role_as == '1')
                                <th>Action</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/category/' . $category->image) }}" width="50px"
                                        height="50px" alt="img" class="" />
                                </td>
                                <td>{{ $category->status == '1' ? 'Hidden' : 'Shown' }}</td>
                                @if (Auth::user()->role_as == '1')
                                    <td>
                                        {{-- <a href="{{ url('admin/edit/' . $category->id) }}" class="btn btn-success">Edit</a>
                                    &nbsp;&nbsp;<a href="{{ url('admin/delete/' . $category->id) }}"
                                        class="btn btn-danger">Delete</a> --}}
                                        <button type="button" class="btn btn-danger deleteCatBtn"
                                            value="{{ $category->id }}">Delete</button>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Modal section --}}
    <div class="modal fade" id="deleteCatModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('admin/delete') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_id" id="category_id" />
                        <h6>Are you sure you want to delete?</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.deleteCatBtn', function(e) {
                e.preventDefault();
                var catId = $(this).val();
                $("#category_id").val(catId);
                $('#deleteCatModal').modal("show");
            });
        });
    </script>
@endsection
