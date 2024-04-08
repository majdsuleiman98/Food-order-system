@extends('layouts.side')

@section('content')
@endsection


<div class="row mb-3 mt-5">
    <div class="col-md-3"></div>
    <div class="col-md-1">
        <div class="card shadow"
            style="width: 16rem; color: white;  background-image: linear-gradient(to bottom right, rgb(36, 198, 238), rgb(12, 106, 247)); border: none;">
            <div class="card-body d-flex">
                <i class="fa-solid fa-cart-arrow-down fa-2x"></i>
                <h5 class="card-title ms-3">Orders Count : </h5>
                <p class="card-text ms-2" style="font-weight: bold;">{{ $order_count }}</p>

            </div>
            <a href="{{ route('home') }}"
                style="color: white; text-decoration: none; font-size: 16px; text-align: center; margin-bottom: 6px;">See
                More >></a>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-1">
        <div class="card shadow"
            style="width: 16rem; background-image: linear-gradient(to bottom right, rgb(36, 198, 238), rgb(12, 106, 247)); border: none;">
            <div class="card-body d-flex">
                <i class="fa-solid fa-user-group fa-2x"></i>
                <h5 class="card-title ms-3 text-light">Users Count : </h5>
                <p class="card-text ms-2 text-light" style="font-weight: bold;">{{ $user_count }}</p>
            </div>
            <a href="{{ route('admin.userspage') }}"
                style="color: white; text-decoration: none; font-size: 16px; text-align: center; margin-bottom: 6px;">See
                More >></a>

        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-1">
        <div class="card shadow"
            style="width: 16rem; background-image: linear-gradient(to bottom right, rgb(36, 198, 238), rgb(12, 106, 247)); border: none;">
            <div class="card-body d-flex">
                <i class="fa-solid fa-utensils fa-2x"></i>
                <h5 class="card-title ms-3 text-light">Meals Count : </h5>
                <strong class="card-text ms-2 text-light" style="font-weight: bold;">{{ $meal_count }}</strong>

            </div>
            <a href="{{ route('meal.index') }}"
                style="color: white; text-decoration: none; font-size: 16px; text-align: center; margin-bottom: 6px;">See
                More >></a>
        </div>
    </div>
    <div class="col-md-1"></div>
    <div class="col-md-1">
        <div class="card shadow"
            style="width: 16rem; background-image: linear-gradient(to bottom right, rgb(36, 198, 238), rgb(12, 106, 247)); border: none;">
            <div class="card-body d-flex">
                <i class="fa-solid fa-code-branch fa-2x"></i>
                <h5 class="card-title ms-3 text-light">Category Count : </h5>
                <p class="card-text ms-2 text-light" style="font-weight: bold;">{{ $category_count }}</p>
            </div>
            <a href="{{ route('cat.show') }}"
                style="color: white; text-decoration: none; font-size: 16px; text-align: center; margin-bottom: 6px;">See
                More >></a>
        </div>
    </div>
</div>



<div class="container mt-5">
    <div class="row ms-5">
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <div class="card-body text-center">
                <table class="table table-striped">
                    <thead class="bg-dark text-light">
                        <tr style="text-align: center;">
                            <th scope="col">name</th>
                            <th scope="col">mail</th>
                            <th scope="col">phone</th>
                            <th scope="col">address</th>
                            <th scope="col" style="width: 120px;">date</th>
                            <th scope="col">price</th>
                            <th scope="col">status </th>
                            <th scope="col" style="width: 270px;">actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->user->email }}</td>
                                <td>{{ $order->user->phone }}</td>
                                <td>{{ $order->user->address }}</td>
                                <td>{{ $order->date }}</td>
                                <td>{{ $order->total_price }}&#8378</td>
                                @if ($order->status == 'sipariş alındı')
                                    <td style="text-align: center;"><span class="bg-secondary text-light text-center"
                                            style="text-align: center; padding: 5px; border-radius: 10%; margin-top:2px; display:flex;align-items:center;justify-content: center">received</span>
                                    </td>
                                @endif
                                @if ($order->status == 'reject')
                                    <td style="text-align: center;"><span class="bg-danger text-light text-center"
                                            style=" text-align: center; padding: 4px 14px; border-radius: 10%; margin-top:2px; width: 67px; display:flex;align-items:center;justify-content: center">{{ $order->status }}</span>
                                    </td>
                                @endif
                                @if ($order->status == 'accept')
                                    <td style="text-align: center;"><span class="bg-primary text-light text-center"
                                            style="text-align: center; padding: 4px 12px; border-radius: 10%; margin-top:2px; width: 67px; display:flex;align-items:center;justify-content: center">{{ $order->status }}</span>
                                    </td>
                                @endif
                                @if ($order->status == 'done')
                                    <td style="text-align: center;"><span class="bg-success text-light text-center"
                                            style="text-align: center; padding: 4px 16px; border-radius: 10%; margin-top:2px; width: 67px; display:flex;align-items:center;justify-content: center">{{ $order->status }}</span>
                                    </td>
                                @endif
                                @if ($order->status == 'cargo')
                                    <td style="text-align: center;"><span class="bg-dark text-light text-center"
                                            style="text-align: center; padding: 4px 16px; border-radius: 10%; margin-top:2px; width: 67px; display:flex;align-items:center;justify-content: center">{{ $order->status }}</span>
                                    </td>
                                @endif
                                <form action="{{ route('order.status', $order->id) }}" method="POST">
                                    @csrf
                                    <td>
                                        <button type="submit" value="accept" name="status"
                                            style="background:none; border: none;"><i
                                                class="fa-solid fa-circle-check text-primary fa-2x"></i></button>
                                        <button type="submit" value="reject" name="status"
                                            style="background:none; border: none;"><i
                                                class="fa-solid fa-circle-xmark text-danger fa-2x"></i></button>
                                                <button type="submit" value="cargo" name="status"
                                            style="background:none; border: none;"><i class="fa-solid fa-truck-fast text-dark fa-2x"></i></button>
                                        <button type="submit" value="done" name="status"
                                            style="background:none; border: none;"><i
                                                class="fa-solid fa-check-double text-success fa-2x"></i></button>
                                        <a href="{{ route('show_order_details_for_admin', $order->id) }}"
                                            class="btn" style="width: 55px; text-align: start;"><i
                                                class="fa-regular fa-eye fa-2x text-info"
                                                style="margin-top: -16px;"></i></a>
                                    </td>
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<style>
    button i:hover,
    table a:hover {
        transform: scale(1.1);
    }
</style>
