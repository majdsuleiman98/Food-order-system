@extends('layouts.side')

@section('content')

    <div class="container" style="padding-top: 3%;">

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">
                @if (count($errors) > 0)
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger" role="alert">
                    {{ $item }}
                </div>
            @endforeach
        @endif
            </div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-8">
                <form method="POST" action="{{route('newuser.create')}}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1"> Name </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1"> Email </label>
                        <input class="form-control" name="email" rows="3">
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1"> Address </label>
                        <input type="text" name="address" class="form-control"  required>
                    </div>


                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1"> Phone </label>
                        <input class="form-control" name="phone" rows="3" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1"> Password </label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1"> Confirm Password </label>
                        <input type="password" name="c_passowrd" class="form-control" required>
                    </div>

                    <div>
                        <label for="exampleFormControlInput1"> Choose role of new user </label>
                        <select name="role" class="form-control mb-3" required="">
                            <option value="" selected="" disabled="">....</option>
                                <option value="1">Admin</option>
                                <option value="0">Customer</option>
                        </select>
                    </div>


                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-plus"></i> Create New User</button>
                    </div>



                </form>
            </div>
        </div>

    </div>







@endsection
