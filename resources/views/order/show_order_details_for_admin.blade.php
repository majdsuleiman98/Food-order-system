@extends('layouts.side')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-5"></div>
            <div class="col-md-6">
                <div class="card text-center" style="width: 28rem;">
                    <div class="card-body p-3 ps-5">
                        <h5 class="card-title p-3 text-primary"><i class="fa-solid fa-angles-left text-primary"></i> Order Details <i class="fa-solid fa-angles-right text-primary"></i></h5>
                        @foreach ($order as $item)
                            <div class="cont mt-3 ps-5" style="display: flex; gap: 40px;">
                                <img src="{{ asset('Meals/' . $item->meal->image) }}" class="card-img-top"
                                    alt="..."style="width:70px; height:70px; border-radius: 50%">
                                <div class="info d-block ms-2" style="text-align: left;">
                                    <p> Name : <strong>{{ $item->meal->meal_name }}</strong></p>
                                    <p> Price : <strong>{{ $item->meal->price }}</strong>&#8378</p>
                                    <p> Quantity : <strong>{{ $item->quantity }}</strong></p>
                                </div>
                            </div>
                        @endforeach
                        <a href="/home" class="btn btn-primary m-3"><i class="fa-solid fa-arrow-left"></i> User Orders</a>
                    </div>
                </div>
            </div>


        </div>

    </div>
    <style>
        body {
            background-color: #ecf0f1;
        }
    </style>
@endsection
