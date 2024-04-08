@extends('layouts.app')

@section('content')

    <div class="container" style="padding-top: 3%">

        @if (count($errors) > 0)
            @foreach ($errors->all() as $item)
                <div class="alert alert-danger" role="alert">
                    {{ $item }}
                </div>
            @endforeach
        @endif

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form method="POST" action="{{route('profile.update')}}">
                    @csrf
                    @method('PUT')
                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1"> Name </label>
                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1"> Email </label>
                        <input class="form-control" name="phone" rows="3" value="{!! $user->email !!}" readonly>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1"> Address </label>
                        <input type="text" name="address" class="form-control" value="{{ $user->address }}" required>
                    </div>


                    <div class="form-group mb-3">
                        <label for="exampleFormControlTextarea1"> Phone </label>
                        <input class="form-control" name="phone" rows="3" value="{!! $user->phone !!}" required>
                    </div>

                    <div class="form-group mb-3">
                        <label for="exampleFormControlInput1"> Password </label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <button class="btn btn-primary" type="submit"><i class="fa-solid fa-pen-to-square"></i> Update</button>
                    </div>

                </form>
            </div>
        </div>

    </div>







@endsection
