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

    <style>
        body {
            font-family: "Lato", sans-serif;
        }

        .sidenav {
            height: 100%;
            width: 250px;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #192a56;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 0px;
            text-decoration: none;
            font-size: 20px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: #f1f1f1;
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 16px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {
                padding-top: 15px;
            }

            .sidenav a {
                font-size: 18px;
            }
        }

        .user-name {
            color: white;
            text-align: center;
            margin-bottom: 30px;
        }

        .fa-user {
            color: white;
            position: relative;
            left: 36%;
            margin-bottom: 10px;
        }

        hr {
            color: white;
        }

        i {
            color: white;
        }

        .sidenav div {
            display: flex;
            align-items: center
            justify-content: center;
            border-bottom: 1px #818181 solid;
            padding: 6px 0px;
        }
        .sidenav div i {
            margin: 16px 10px 0px 12px;
        }
    </style>

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

    <div id="mySidenav" class="sidenav">
        <i class="fa-solid fa-user fa-5x"></i>
        <h2 class="user-name">{{ Auth::user()->name }}</h2>
        <hr>
        <div>
            <i class="fa-solid fa-house-user"></i>
            <a href="{{ url('/') }}">Home</a>
        </div>
        <div>
            <i class="fa-solid fa-truck"></i>
            <a href="{{ route('home') }}">Users Orders</a>
        </div>

        <div>
            <i class="fa-solid fa-users"></i>
            <a href="{{ route('admin.userspage') }}">Users</a>
        </div>

        <div>
            <i class="fa-solid fa-code-branch"></i>
            <a href="{{ route('cat.show') }}">Categories</a>
        </div>
        <div>
            <i class="fa-solid fa-circle-plus"></i>
            <a href="{{ route('meal.create') }}">Add New Meal</a>
        </div>
        <div>
            <i class="fa-solid fa-eye"></i>
            <a href="{{ route('meal.index') }}">Show All Meals</a>
        </div>
        <div>
            <i class="fa-solid fa-right-from-bracket"></i>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
        </div>

    </div>
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

</body>

</html>
