@extends('layouts.side')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-2"></div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header text-center bg-info">Meals</div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            <i class="fa-solid fa-circle-check me-3"></i>{{ session('message') }}
                        </div>
                    @endif
                    <table class="table table-bordered text-center table-hover">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 80px;">meal id</th>
                                <th scope="col">meal image</th>
                                <th scope="col">meal name</th>
                                <th scope="col" style="width: 360px;">description</th>
                                <th scope="col">category</th>
                                <th scope="col">price</th>
                                <th scope="col">update</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($meals) > 0)
                                @foreach ($meals as $meal)
                                    <tr>
                                        {{-- /Meals/{{ $meal->image  }} --}}
                                        <th scope="row">{{ $meal->id }}</th>
                                        <td><img src="{{asset('Meals/'.$meal->image)}} " width="80px" height="80px" alt=""></td>{{-- {{asset($meal->image)}} --}}
                                        <td>{{ $meal->meal_name }}</td>
                                        <td>{{ $meal->description }}</td>
                                        <td>{{ $meal->category->category_name }}</td>
                                        <td>{{ $meal->price }}&#8378;</td>
                                        <td><a href="{{ route('meal.edit', $meal->id) }}" class="btn btn-primary" style="width: fit-content;"><i class="fa-solid fa-pen-to-square"></i> Update</a>
                                        </td>
                                        <td><a href="{{ route('meal.delete', $meal->id) }}"
                                                class="btn btn-danger"><i class="fa-solid fa-trash-can"></i> Delete</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <div class="alert alert-danger" role="alert">
                                    There is no meal to display
                                </div>
                            @endif

                        </tbody>
                    </table>
                    {{ $meals->links() }}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
