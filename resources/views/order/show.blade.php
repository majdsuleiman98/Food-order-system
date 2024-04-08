@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @foreach ($orders as $order)
                <div class="col-md-3">
                    <div class="card text-center mt-3" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title">Total Price : {{ $order->total_price }} &#8378</h5>
                            @if ($order->status == 'sipariş alındı')
                            <p class="card-text">Order Status : <span class="bg-secondary text-light" style="padding: 5px; border-radius: 6px;">{{$order->status}}</span></p>
                            @endif
                            @if ($order->status == 'reject')
                            <p class="card-text">Order Status : <span class="bg-danger text-light" style="padding: 5px; border-radius: 6px;">{{$order->status}}</span></p>
                            @endif
                            @if ($order->status == 'accept')
                            <p class="card-text">Order Status : <span class="bg-primary text-light" style="padding: 5px; border-radius: 6px;">{{$order->status}}</span></p>
                            @endif
                            @if ($order->status == 'done')
                            <p class="card-text">Order Status : <span class="bg-success text-light" style="padding: 5px; border-radius: 6px;">{{$order->status}}</span></p>
                            @endif
                            @if ($order->status == 'cargo')
                            <p class="card-text">Order Status : <span class="bg-dark text-light" style="padding: 5px; border-radius: 6px;">{{$order->status}}</span></p>
                            @endif
                            <p class="card-text" style="color: #192a56;"><i class="fa-sharp fa-solid fa-clock text-info"></i> {{ $order->date }}</p>
                            <a href="{{route('show_details',$order->id)}}" class="btn btn-primary"><i class="fa-sharp fa-solid fa-eye"></i> Show Order Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
@endsection


