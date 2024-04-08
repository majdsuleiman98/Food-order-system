@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            @if ($cart)
                <div class="col-md-6">
                    @if ($errors->any())
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @foreach ($cart->items as $meal)
                        <div class="card mb-2">
                            <div class="card-body " style="display: flex;justify-content:space-between" >
                                <section style="display: flex; gap: 10px;">
                                    <img src="{{ asset('Meals/' . $meal['image']) }}" class="card-img-top" alt="..."style="width:100px; height:100px; border-radius: 50%">
                                    <h5 class="card-title" style="margin-left: 6px; margin-right: 10px; margin-top: 30px; color: #666">
                                        {{ $meal['meal_name'] }}
                                    </h5>
                                </section>
                                <div class="card-text d-flex justify-content-end ms-3">
                                    <h6 style=" margin-top: 33px;">{{ $meal['price'] }}&#8378;</h6>
                                    <form action="{{ route('meal.updateqty', $meal['id']) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <input type="number"  name="qty" min="1" id="qty" value={{ $meal['qty'] }}
                                            style="margin-left: 8px; margin-top: 30px; width:50px; text-align: end;">
                                        <button type="submit" class="btn btn-secondary btn-sm"
                                            style="margin-top: -5px; background-color: #34495e; margin-left: 8px;"><i class="fa-solid fa-arrow-rotate-left"></i></button>
                                    </form>
                                    <form action="{{ route('meal.remove', $meal['id']) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-secondary btn-sm ms-1"
                                            style="height: 31px; margin-top: 29px; float: right; background-color: #34495e;"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <p><strong>Total : {{ $cart->totalprice }} &#8378;</strong></p>
                </div>
                <div class="col-md-4">
                    <div class="card text-white" style="background-color: #34495e;">
                        <div class="card-body">
                            <h3 class="card-titel">
                                Your Cart
                                <hr>
                            </h3>
                            <div class="card-text">
                                <p>
                                    Total Amount is : {{ $cart->totalprice }}&#8378
                                </p>
                                <p>
                                    Total Quantities is : {{ $cart->totalQty }}
                                </p>
                                <a href="{{route('cart.checkout')}}" class="btn btn-info">Complete The Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-info d-flex" role="alert">
                    <i class="fa-solid fa-circle-info fa-2x"></i>
                    <p style="font-size: 22px;">&nbsp There are no items in the cart</p>
                </div>
            @endif
        </div>

    </div>
    <style>
        body {
            background-color: #ecf0f1;
        }
        i:hover {
            color: #0dcaf0;
        }
    </style>

@endsection
