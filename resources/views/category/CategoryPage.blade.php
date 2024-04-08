@extends('layouts.side')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2"></div>
            <div class="col-md-2" style="width: 24rem;">
                <div class="card">
                    <div class="card-header text-center bg-info">Add New Category</div>
                    <form action="{{ route('cat.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Category Name</label>
                                <input type="text" name="category_name" id="" class="form-control mt-2"
                                    placeholder="category name">
                            </div>
                            <br>
                            <div class="form-group text-center">
                                <button class="btn btn-primary" type="submit"><i class="fa-solid fa-circle-plus"></i> Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center bg-info">Categories</div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                <i class="fa-solid fa-circle-check me-3"></i>{{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered text-center table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" style="width: 110px;">category id</th>
                                    <th scope="col">category name</th>
                                    <th scope="col">update</th>
                                    <th scope="col">delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr>
                                        <th style="width: 110px;" scope="row">{{ $category->id }}</th>
                                        <td hidden>{{ $category->id }}</td>
                                        <td>{{ $category->category_name }}</td>
                                        <td style="width:130px;"><a class="btn btn-primary editbtn"><i class="fa-solid fa-pen-to-square"></i> Update</a></td>
                                        <td style="width:130px;"><a href="{{ route('cat.delete', $category->id) }}"
                                                class="btn btn-danger" id="delete"><i class="fa-solid fa-trash-can"></i> Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">update category name</h1>
                </div>
                <div class="modal-body">
                    <form action="{{ route('cat.update') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="id" class="col-form-label">category id:</label>
                            <input type="text" class="form-control" name="id" id="id" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="category_name" class="col-form-label">category name:</label>
                            <input type="text" class="form-control" id="category_name" name="category_name">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.editbtn').on('click', function() {
                $('#exampleModal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children('td').map(function() {
                    return $(this).text();
                }).get();
                $('#id').val(data[0]);
                $('#category_name').val(data[1]);
            });
        });
    </script>
@endsection
