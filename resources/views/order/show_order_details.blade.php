@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-4 card">
                @if ($order1->status == 'reject')
                    <h3 class="mt-5 mb-5 text-center text-light bg-danger" style="padding: 10px; border-radius: 8px;"><i class="fa-solid fa-circle-exclamation"></i></i> Siparişiniz Rededildi</h3>
                @endif
                @if ($order1->status == 'sipariş alındı' or $order1->status == 'accept')
                    <h3 class="mt-5 mb-5 text-center text-light bg-primary" style="padding: 10px; border-radius: 8px;"><i
                            class="fa-solid fa-shop"></i> Siparişiniz Alınıd</h3>
                    <div class="cont" style="display: flex; justify-content: space-around; align-items: center;">
                        <i class="fa-solid fa-shop fa-2x text-primary"></i>
                        <hr style="height: 2px; width: 180px; " class="text-dark">
                        <i class="fa-solid fa-truck-fast fa-2x" style="opacity: 0.5;"></i>
                        <hr style="background-color: black; height: 2px; width: 180px; ">
                        <i class="fa-solid fa-circle-check fa-2x" style="opacity: 0.5;"></i>
                    </div>
                @endif
                @if ($order1->status == 'cargo')
                    <h3 class="mt-5 mb-5 text-center text-light bg-primary" style="padding: 10px; border-radius: 8px;"><i
                            class="fa-solid fa-truck-fast"></i> Siparişiniz Kargoya Verildi</h3>
                    <div class="cont" style="display: flex; justify-content: space-around; align-items: center;">
                        <i class="fa-solid fa-shop fa-2x text-primary"></i>
                        <hr style="height: 2px; width: 180px; " class="text-primary">
                        <i class="fa-solid fa-truck-fast fa-2x text-primary"></i>
                        <hr style="color: black; height: 2px; width: 180px; ">
                        <i class="fa-solid fa-circle-check fa-2x" style="opacity: 0.5;"></i>
                    </div>
                @endif
                @if ($order1->status == 'done')
                    <h3 class="mt-3 mb-3 text-center text-light bg-primary" style="padding: 10px; border-radius: 8px;"><i
                            class="fa-solid fa-circle-check"></i> Siparişiniz Teslim Edildi</h3>
                    <div class="cont" style="display: flex; justify-content: space-around; align-items: center;">
                        <i class="fa-solid fa-shop fa-2x text-primary"></i>
                        <hr style="height: 2px; width: 180px; " class="text-primary">
                        <i class="fa-solid fa-truck-fast fa-2x text-primary"></i>
                        <hr style="height: 2px; width: 180px; " class="text-primary">
                        <i class="fa-solid fa-circle-check fa-2x text-primary"></i>
                    </div>
                @endif
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <div class="card text-center" style="width: 28rem;">
                    <div class="card-body p-3 ps-5">
                        <h5 class="card-title p-2 text-primary"><i class="fa-solid fa-angles-left"></i> Order Details <i
                                class="fa-solid fa-angles-right"></i></h5>
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
                        <a href="/order/show" class="btn btn-primary m-3"><i class="fa-solid fa-arrow-left"></i> My
                            Orders</a>
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
