@extends('layouts.side')

@section('content')
@endsection




<div class="container " style="margin-top: 200px;">
    <div class="row ms-5">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card-body text-center">
                <table class="table table-striped" style="border-radius: 8px;">
                    <thead class="bg-dark text-light" style="border-radius: 8px;">
                        <tr style="text-align: center;">
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone Number</th>
                            <th scope="col">Address</th>
                            <th scope="col" style="width: 180px;">Login Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->created_at }}</td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <a href="{{route('newuser.show')}}" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Add New User</a>

            </div>
        </div>
    </div>
</div>
