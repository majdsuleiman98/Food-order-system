@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            <i class="fa-solid fa-circle-check"></i> {{session()->get('success')}}
        </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-2">
                <div class="card">
                    <div class="card-header text-center">Choose Category</div>
                    <div class="card-body">
                        <form action="" method="get">
                            <a class="list-group-item list-group-item-action active cat-choose" href="/home">All Categories</a>
                            @foreach ($cats as $cat)
                                <input type="submit" value="{{ $cat->category_name }}" name="category"
                                    class="list-group-item list-group-item-action  cat-choose">
                            @endforeach
                        </form>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-header text-center">Price</div>
                    <div class="card-body">
                        <div class="d-flex">
                            <input type="number" value="0" name="" id=""
                                style="width:70px; margin-right: 24px; border-color:#ced2d3; border-radius: 10%; height:30px; background-color:#ecf0f1; outline: none; text-align: center;">
                            <input type="number" value="0" name="" id=""
                                style="width:70px; border-radius: 10%; border-color:#ced2d3; height:30px; background-color:#ecf0f1; outline: none; text-align: center;">
                        </div>
                        <a href="" class="btn mt-3 btn-search"><i class="fa-solid fa-magnifying-glass"></i></a>
                    </div>
                </div>
            </div>



            <div class="col-md-10">
                <div class="card-body">
                    <div class="row">
                        @forelse ($meals as $meal)
                            <div class="card rounded shadow-sm border-0"
                                style="width: 18rem; margin-left:46px; margin-bottom:10px; padding: 0px;">
                                <img src="{{ asset('Meals/' . $meal->image) }}" class="card-img-top" alt="..."
                                    style="width:100%; height:262px;">
                                <div class="card-body ">
                                    <div style="display: flex;align-items: center;">
                                        <h5 class="card-title">{{ $meal->meal_name }}</h5>
                                        <h6 style="color: #00a8ff; margin-left: 4px;">({{ $meal->category->category_name }})
                                        </h6>
                                    </div>
                                    <p class="card-text">{{ $meal->description }}</p>
                                    <div
                                        class="card-footer border-0 bg-white p-0 d-flex justify-content-between align-items-center ">
                                        <p class="card-text pull-left mb-0" style="color: #00a8ff;font-weight: bold;">{{ $meal->price }}&#8378;</p>
                                        <a href="{{route('login')}}" class="btn btn-primary pull-right"><i
                                                class="fa-solid fa-cart-shopping"></i> Add To Card</a>
                                    </div>

                                </div>
                            </div>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                There is no food to show
                            </div>
                            <img src="{{ asset('images/empty.jpg') }}" alt="" height="440">
                        @endforelse
                    </div>
                </div>
            </div>
        </div>


    </div>
    </div>

    <style>
        body {
            background-color: #ecf0f1;
        }

        a.list-group-item input.list-group-item {
            display: block;
            font-size: 16px;
            padding: 4px;
        }

        a.list-group-item:hover,
        input.list-group-item:hover {
            background-color: #4b7dfc;
            color: #fff;
            border-radius: 6%;
        }

        .cat-choose {
            padding: 6px;
            text-align: center;
            text-transform: lowercase;

        }

        .card-header {
            font-size: 20px;
        }

        .btn-search {
            background-color: #4b7dfc;
            width: 90%;
            margin-left: 10px;
        }

        .btn-search:hover {
            background-color: #388efd;
        }
    </style>
@endsection
