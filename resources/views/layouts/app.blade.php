<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Food Order</title>
    {{-- {{ config('app.name', 'Laravel') }} --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">



    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    {{-- bootstrap css --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    {{-- main js --}}
    {{-- <script src="{{asset('js/main.js')}}"></script> --}}
    {{-- fontawesome --}}
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    {{-- bootstrap js --}}
    {{-- <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> --}}
    <!--sweetAlert-->

    <link rel="stylesheet" href="{{ asset('boots/sweetalert.min.css') }}">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <!--sweetAlert-->

    <link rel="stylesheet" href="//cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">

                @if (Auth::check())
                <nav class="navbar">
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <a href="{{route('home')}}" class="btn btn-outline-dark me-2">Shopping Page</a>
                            <a href="{{ url('/') }}" class="btn btn-outline-dark ms-3">Home</a>
                            <form action="{{route('home')}}" method="get">
                                @csrf
                                <button  class="btn btn-outline-dark ms-3" type="submit">Search</button>
                                <input class="form-control me-5 ms-2" type="search" placeholder="Search" aria-label="Search" name="srch"
                                    style="width:500px;">
                            </form>
                        </form>
                    </div>
                </nav>
                @endif


                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary text-light me-1"
                                        href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link btn btn-danger text-light"
                                        href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else


                            <a href="{{route('cart.show')}}" class="nav-link shopping-card" ><i class="fa-solid fa-bag-shopping fa-2x" style="color: #00a8ff;"></i></a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre
                                    style="border: 2px #00a8ff solid; border-radius: 8%; margin-left: 20px; padding-left: 18px; padding-right: 18px;">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/') }}"><i class="fa-solid fa-house"></i> Home</a>
                                    <a class="dropdown-item" href="{{route('home')}}"><i class="fa-solid fa-shop"></i> Shopping Page</a>
                                    <a class="dropdown-item" href="{{route('profile')}}"><i class="fa-regular fa-user"></i> My Profile</a>
                                    <a class="dropdown-item" href="/order/show"><i class="fa-sharp fa-solid fa-clock-rotate-left"></i> My Orders</a>


                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    {{-- bootstrap js --}}
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js') }}"></script>

    <script>
        $(document).on("click", "#delete", function(e) {
            e.preventDefault();
            var link = $(this).attr("href");
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = link;
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>




    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <script>
        @if (Session::has('message_id'))
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info("{{ Session::get('message_id') }}");

                    break;

                case 'success':
                    toastr.success("{{ Session::get('message_id') }}");
                    break;

                case 'warning':
                    toastr.warning("{{ Session::get('message_id') }}");
                    break;

                case 'error':
                    toastr.error("{{ Session::get('message_id') }}");
                    break;
            }
        @endif
    </script>
    <style>
        .shopping-card {
            position: relative;
        }
        .shopping-card::before {
            content: "{{session()->has('cart')?session()->get('cart')->totalQty:'0'}}";
            position: absolute;
            width: 18px;
            height: 18px;
            background-color: #00a8ff;
            border-radius: 50%;
            color: white;
            top: -4px;
            right: -6px;
            text-align: center;
            font-size: 12px;
        }
    </style>
</body>

</html>
