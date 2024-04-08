<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Food Order</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *,
        :after,
        :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg,
        video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }

        .bg-white {
            --tw-bg-opacity: 1;
            background-color: rgb(255 255 255 / var(--tw-bg-opacity))
        }

        .bg-gray-100 {
            --tw-bg-opacity: 1;
            background-color: rgb(243 244 246 / var(--tw-bg-opacity))
        }

        .border-gray-200 {
            --tw-border-opacity: 1;
            border-color: rgb(229 231 235 / var(--tw-border-opacity))
        }

        .border-t {
            border-top-width: 1px
        }

        .flex {
            display: flex
        }

        .grid {
            display: grid
        }

        .hidden {
            display: none
        }

        .items-center {
            align-items: center
        }

        .justify-center {
            justify-content: center
        }

        .font-semibold {
            font-weight: 600
        }

        .h-5 {
            height: 1.25rem
        }

        .h-8 {
            height: 2rem
        }

        .h-16 {
            height: 4rem
        }

        .text-sm {
            font-size: .875rem
        }

        .text-lg {
            font-size: 1.125rem
        }

        .leading-7 {
            line-height: 1.75rem
        }

        .mx-auto {
            margin-left: auto;
            margin-right: auto
        }

        .ml-1 {
            margin-left: .25rem
        }

        .mt-2 {
            margin-top: .5rem
        }

        .mr-2 {
            margin-right: .5rem
        }

        .ml-2 {
            margin-left: .5rem
        }

        .mt-4 {
            margin-top: 1rem
        }

        .ml-4 {
            margin-left: 1rem
        }

        .mt-8 {
            margin-top: 2rem
        }

        .ml-12 {
            margin-left: 3rem
        }

        .-mt-px {
            margin-top: -1px
        }

        .max-w-6xl {
            max-width: 72rem
        }

        .min-h-screen {
            min-height: 100vh
        }

        .overflow-hidden {
            overflow: hidden
        }

        .p-6 {
            padding: 1.5rem
        }

        .py-4 {
            padding-top: 1rem;
            padding-bottom: 1rem
        }

        .px-6 {
            padding-left: 1.5rem;
            padding-right: 1.5rem
        }

        .pt-8 {
            padding-top: 2rem
        }

        .fixed {
            position: fixed
        }

        .relative {
            position: relative
        }

        .top-0 {
            top: 0
        }

        .right-0 {
            right: 0
        }

        .shadow {
            --tw-shadow: 0 1px 3px 0 rgb(0 0 0 / .1), 0 1px 2px -1px rgb(0 0 0 / .1);
            --tw-shadow-colored: 0 1px 3px 0 var(--tw-shadow-color), 0 1px 2px -1px var(--tw-shadow-color);
            box-shadow: var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)
        }

        .text-center {
            text-align: center
        }

        .text-gray-200 {
            --tw-text-opacity: 1;
            color: rgb(229 231 235 / var(--tw-text-opacity))
        }

        .text-gray-300 {
            --tw-text-opacity: 1;
            color: rgb(209 213 219 / var(--tw-text-opacity))
        }

        .text-gray-400 {
            --tw-text-opacity: 1;
            color: rgb(156 163 175 / var(--tw-text-opacity))
        }

        .text-gray-500 {
            --tw-text-opacity: 1;
            color: rgb(107 114 128 / var(--tw-text-opacity))
        }

        .text-gray-600 {
            --tw-text-opacity: 1;
            color: rgb(75 85 99 / var(--tw-text-opacity))
        }

        .text-gray-700 {
            --tw-text-opacity: 1;
            color: rgb(55 65 81 / var(--tw-text-opacity))
        }

        .text-gray-900 {
            --tw-text-opacity: 1;
            color: rgb(17 24 39 / var(--tw-text-opacity))
        }

        .underline {
            text-decoration: underline
        }

        .antialiased {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .w-5 {
            width: 1.25rem
        }

        .w-8 {
            width: 2rem
        }

        .w-auto {
            width: auto
        }

        .grid-cols-1 {
            grid-template-columns: repeat(1, minmax(0, 1fr))
        }

        @media (min-width:640px) {
            .sm\:rounded-lg {
                border-radius: .5rem
            }

            .sm\:block {
                display: block
            }

            .sm\:items-center {
                align-items: center
            }

            .sm\:justify-start {
                justify-content: flex-start
            }

            .sm\:justify-between {
                justify-content: space-between
            }

            .sm\:h-20 {
                height: 5rem
            }

            .sm\:ml-0 {
                margin-left: 0
            }

            .sm\:px-6 {
                padding-left: 1.5rem;
                padding-right: 1.5rem
            }

            .sm\:pt-0 {
                padding-top: 0
            }

            .sm\:text-left {
                text-align: left
            }

            .sm\:text-right {
                text-align: right
            }
        }

        @media (min-width:768px) {
            .md\:border-t-0 {
                border-top-width: 0
            }

            .md\:border-l {
                border-left-width: 1px
            }

            .md\:grid-cols-2 {
                grid-template-columns: repeat(2, minmax(0, 1fr))
            }
        }

        @media (min-width:1024px) {
            .lg\:px-8 {
                padding-left: 2rem;
                padding-right: 2rem
            }
        }

        @media (prefers-color-scheme:dark) {
            .dark\:bg-gray-800 {
                --tw-bg-opacity: 1;
                background-color: rgb(31 41 55 / var(--tw-bg-opacity))
            }

            .dark\:bg-gray-900 {
                --tw-bg-opacity: 1;
                background-color: rgb(17 24 39 / var(--tw-bg-opacity))
            }

            .dark\:border-gray-700 {
                --tw-border-opacity: 1;
                border-color: rgb(55 65 81 / var(--tw-border-opacity))
            }

            .dark\:text-white {
                --tw-text-opacity: 1;
                color: rgb(255 255 255 / var(--tw-text-opacity))
            }

            .dark\:text-gray-400 {
                --tw-text-opacity: 1;
                color: rgb(156 163 175 / var(--tw-text-opacity))
            }

            .dark\:text-gray-500 {
                --tw-text-opacity: 1;
                color: rgb(107 114 128 / var(--tw-text-opacity))
            }
        }
    </style>
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="header">
        <div class="continer">
            <div class="logo">
                <img src="{{ asset('images/food logo_8466881.png') }}" alt="logo">
                <p>acıktım</p>
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#portfolio">Portfolio</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#footer">Contact</a></li>
                    @if (!Auth::check())
                        <li><a href="{{ asset('/menu') }}">Menu</a></li>
                    @endif

                </ul>
                @if (Auth::check())
                    @if (Auth()->user()->is_admin == 1)
                        <a href="{{ route('home') }}" class="btn btn-primary me-2">Admin Page</a>
                    @else
                        <a href="{{ route('home') }}" class="btn btn-primary me-2">Shopping Page</a>
                    @endif
                    <li class="nav-item dropdown btn btn-primary text-light">


                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ url('/') }}"><i class="fa-solid fa-house"></i>
                                Home</a>
                            <a class="dropdown-item" href="{{ route('home') }}"><i class="fa-solid fa-shop"></i>
                                Shopping Page</a>
                            <a class="dropdown-item" href="{{ route('profile') }}"><i class="fa-regular fa-user"></i>
                                My Profile</a>
                            <a class="dropdown-item" href="/order/show"><i
                                    class="fa-sharp fa-solid fa-clock-rotate-left"></i> My Orders</a>
                            <a class="dropdown-item"
                                href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i
                                    class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @else
                    <div class="form">
                        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
                        <a href="{{ route('register') }}" class="btn btn-primary">SingUp</a>
                    </div>
                @endif
            </nav>
        </div>
    </div>
    <!-- end header -->
    <!-- start landing -->
    <div class="landing">
        <div class="text">
            <div class="content">
                <h2>
                    <span class="text-danger" style="font-weight: 900;">Acıktım Restaurant</span><br />
                    Canınız Çektiği Yemeği Ara Hemen Sipariş Ver.</h2>

                    <div class="srch">
                        <form action="{{route('home')}}" method="get" class="d-flex">
                            @csrf
                            <button  class="btn btn-danger ms-3 p-3" type="submit">Search</button>
                            <input class="form-control me-5 ms-2 p-3" type="search" placeholder="Search" style="background-color: transparent; color:white;" aria-label="Search" name="srch"
                                style="width:500px;">
                        </form>
                </div>
            </div>
        </div>
        {{-- <div class="srch" style="display: flex; justify-content: center; align-items: center;">
            <form action="{{route('home')}}" method="get">
                @csrf
                <button  class="btn btn-outline-dark ms-3" type="submit" style="background-color: white;">Search</button>
                <input class="form-control me-5 ms-2" type="search" placeholder="Search" aria-label="Search" name="srch"
                    style="width:500px;">
            </form>
        </div> --}}


    </div>
    <!-- end landing -->
    <!-- start Services -->
    <div class="services" id="services">
        <div class="continer">
            <div class="main-heading">
                <h2>Services</h2>
                <p>
                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                    tincidunt.
                </p>
            </div>
            <div class="services-continer">
                <div class="srv">
                    <i class="fa-solid fa-mug-hot fa-2x"></i>
                    <div class="text">
                        <h3>Vorem amet intuitive</h3>
                        <p>
                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet
                            elit, eget
                            tincidunt nibh pulvinar a. Curabitur aliquet quam.
                        </p>
                    </div>
                </div>
                <div class="srv">
                    <i class="fa-solid fa-pizza-slice fa-2x"></i>
                    <div class="text">
                        <h3>Vorem amet intuitive</h3>
                        <p>
                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet
                            elit, eget
                            tincidunt nibh pulvinar a. Curabitur aliquet quam.
                        </p>
                    </div>
                </div>
                <div class="srv">
                    <i class="fa-solid fa-fish fa-2x"></i>
                    <div class="text">
                        <h3>Vorem amet intuitive</h3>
                        <p>
                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet
                            elit, eget
                            tincidunt nibh pulvinar a. Curabitur aliquet quam.
                        </p>
                    </div>
                </div>
                <div class="srv">
                    <i class="fa-solid fa-bowl-rice fa-2x"></i>
                    <div class="text">
                        <h3>Vorem amet intuitive</h3>
                        <p>
                            Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet
                            elit, eget
                            tincidunt nibh pulvinar a. Curabitur aliquet quam.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Services -->
    <!-- start video -->
    <div class="video">
        <video src="{{ asset('images/Food Reel _ FH Studio.mp4') }}" loop autoplay muted></video>
    </div>
    <!-- end video -->
    <!-- start portfolio -->
    <div class="portfolio" id="portfolio">
        <div class="continer">
            <div class="main-heading">
                <h2>portfolio</h2>
                <p>
                    Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Mauris blandit aliquet elit, eget
                    tincidunt nibh pulvinar a. Curabitur aliquet quam.
                </p>
            </div>

        </div>
        <div class="images-continer">
            <div class="box">
                <img src="{{ asset('images/ben-kolde-FFqNATH27EM-unsplash.jpg') }}" alt="">
                <div class="caption">
                    <h4>Awesome Image</h4>
                    <button class="order">order</button>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('images/louis-hansel-KQR3ENYfrpw-unsplash.jpg') }}" alt="">
                <div class="caption">
                    <h4>Awesome Image</h4>
                    <button class="order">order</button>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('images/likemeat-CbNAuxSZTFo-unsplash.jpg') }}" alt="">
                <div class="caption">
                    <h4>Awesome Image</h4>
                    <button class="order">order</button>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('images/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}" alt="">
                <div class="caption">
                    <h4>Awesome Image</h4>
                    <button class="order">order</button>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('images/likemeat-CbNAuxSZTFo-unsplash.jpg') }}" alt="">
                <div class="caption">
                    <h4>Awesome Image</h4>
                    <button class="order">order</button>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('images/ben-kolde-FFqNATH27EM-unsplash.jpg') }}" alt="">
                <div class="caption">
                    <h4>Awesome Image</h4>
                    <button class="order">order</button>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('images/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}" alt="">
                <div class="caption">
                    <h4>Awesome Image</h4>
                    <button class="order">order</button>
                </div>
            </div>
            <div class="box">
                <img src="{{ asset('images/louis-hansel-KQR3ENYfrpw-unsplash.jpg') }}" alt="">
                <div class="caption">
                    <h4>Awesome Image</h4>
                    <button class="order">order</button>
                </div>
            </div>
        </div>
        <a href="{{ route('home') }}" class="more">See More</a>
    </div>
    <!-- end portfolio -->
    <div class="container">
        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>01</h2>
                    <h3>A promotion for every order</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, totam velit? Iure nemo labore
                        inventore?</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>02</h2>
                    <h3>At your door in minutes</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, totam velit? Iure nemo labore
                        inventore?</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="box">
                <div class="content">
                    <h2>03</h2>
                    <h3>Thousand kinds of happiness</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, totam velit? Iure nemo labore
                        inventore?</p>
                    <a href="#">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end about -->

    <!-- start footer -->
    <div class="pg-footer" id="footer">
        <footer class="footer">
            <svg class="footer-wave-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 100"
                preserveAspectRatio="none">
                <path class="footer-wave-path"
                    d="M851.8,100c125,0,288.3-45,348.2-64V0H0v44c3.7-1,7.3-1.9,11-2.9C80.7,22,151.7,10.8,223.5,6.3C276.7,2.9,330,4,383,9.8 c52.2,5.7,103.3,16.2,153.4,32.8C623.9,71.3,726.8,100,851.8,100z">
                </path>
            </svg>
            <div class="footer-content">
                <div class="footer-content-column">
                    <div class="footer-logo">
                        <a class="footer-logo-link" href="#">
                            <span class="hidden-link-text">Acıktım</span>
                            <h1>Acıktım</h1>
                        </a>
                    </div>
                    <div class="footer-menu">
                        <h2 class="footer-menu-name"> Get Started</h2>
                        <ul id="menu-get-started" class="footer-menu-list">
                            <li class="menu-item menu-item-type-post_type menu-item-object-product">
                                <a href="#home">Home</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-product">
                                <a href="#about">About</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-product">
                                <a href="#portfolio">Portfolio</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-product">
                                <a href="#contact">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-content-column">
                    <div class="footer-menu">
                        <h2 class="footer-menu-name"> Company</h2>
                        <ul id="menu-company" class="footer-menu-list">
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Contact</a>
                            </li>
                            <li class="menu-item menu-item-type-taxonomy menu-item-object-category">
                                <a href="#">News</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Careers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-menu">
                        <h2 class="footer-menu-name"> Legal</h2>
                        <ul id="menu-legal" class="footer-menu-list">
                            <li
                                class="menu-item menu-item-type-post_type menu-item-object-page menu-item-privacy-policy menu-item-170434">
                                <a href="#">Privacy Notice</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Terms of Use</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-content-column">
                    <div class="footer-menu">
                        <h2 class="footer-menu-name"> Quick Links</h2>
                        <ul id="menu-quick-links" class="footer-menu-list">
                            <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                <a target="_blank" rel="noopener noreferrer" href="#">Support Center</a>
                            </li>
                            <li class="menu-item menu-item-type-custom menu-item-object-custom">
                                <a target="_blank" rel="noopener noreferrer" href="#">Service Status</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Security</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Blog</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type_archive menu-item-object-customer">
                                <a href="#">Customers</a>
                            </li>
                            <li class="menu-item menu-item-type-post_type menu-item-object-page">
                                <a href="#">Reviews</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footer-content-column">
                    <div class="footer-call-to-action">
                        <h2 class="footer-call-to-action-title"> Let's Chat</h2>
                        <p class="footer-call-to-action-description"> Have a support question?</p>
                        <a class="footer-call-to-action-button button" href="#" target="_self"> Get in Touch
                        </a>
                    </div>
                    <div class="footer-call-to-action">
                        <h2 class="footer-call-to-action-title"> You Call Us</h2>
                        <p class="footer-call-to-action-link-wrapper"> <a class="footer-call-to-action-link"
                                href="tel:0124-64XXXX" target="_self"> 0124-64XXXX </a></p>
                    </div>
                </div>
                <div class="footer-social-links"> <svg class="footer-social-amoeba-svg"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 236 54">
                        <path class="footer-social-amoeba-path"
                            d="M223.06,43.32c-.77-7.2,1.87-28.47-20-32.53C187.78,8,180.41,18,178.32,20.7s-5.63,10.1-4.07,16.7-.13,15.23-4.06,15.91-8.75-2.9-6.89-7S167.41,36,167.15,33a18.93,18.93,0,0,0-2.64-8.53c-3.44-5.5-8-11.19-19.12-11.19a21.64,21.64,0,0,0-18.31,9.18c-2.08,2.7-5.66,9.6-4.07,16.69s.64,14.32-6.11,13.9S108.35,46.5,112,36.54s-1.89-21.24-4-23.94S96.34,0,85.23,0,57.46,8.84,56.49,24.56s6.92,20.79,7,24.59c.07,2.75-6.43,4.16-12.92,2.38s-4-10.75-3.46-12.38c1.85-6.6-2-14-4.08-16.69a21.62,21.62,0,0,0-18.3-9.18C13.62,13.28,9.06,19,5.62,24.47A18.81,18.81,0,0,0,3,33a21.85,21.85,0,0,0,1.58,9.08,16.58,16.58,0,0,1,1.06,5A6.75,6.75,0,0,1,0,54H236C235.47,54,223.83,50.52,223.06,43.32Z">
                        </path>
                    </svg>
                    <a class="footer-social-link linkedin" href="#" target="_blank">
                        <span class="hidden-link-text">Linkedin</span>
                        <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                            {{-- <path class="footer-social-icon-path"
                                d="M9,25H4V10h5V25z M6.501,8C5.118,8,4,6.879,4,5.499S5.12,3,6.501,3C7.879,3,9,4.121,9,5.499C9,6.879,7.879,8,6.501,8z M27,25h-4.807v-7.3c0-1.741-0.033-3.98-2.499-3.98c-2.503,0-2.888,1.896-2.888,3.854V25H12V9.989h4.614v2.051h0.065 c0.642-1.18,2.211-2.424,4.551-2.424c4.87,0,5.77,3.109,5.77,7.151C27,16.767,27,25,27,25z">
                            </path> --}}
                            <i class="fa-brands fa-linkedin-in fa-2x"></i>
                        </svg>
                    </a>
                    <a class="footer-social-link twitter" href="#" target="_blank">
                        <span class="hidden-link-text">Twitter</span>
                        <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26 26">
                            {{-- <path class="footer-social-icon-path"
                                d="M 25.855469 5.574219 C 24.914063 5.992188 23.902344 6.273438 22.839844 6.402344 C 23.921875 5.75 24.757813 4.722656 25.148438 3.496094 C 24.132813 4.097656 23.007813 4.535156 21.8125 4.769531 C 20.855469 3.75 19.492188 3.113281 17.980469 3.113281 C 15.082031 3.113281 12.730469 5.464844 12.730469 8.363281 C 12.730469 8.773438 12.777344 9.175781 12.867188 9.558594 C 8.503906 9.339844 4.636719 7.246094 2.046875 4.070313 C 1.59375 4.847656 1.335938 5.75 1.335938 6.714844 C 1.335938 8.535156 2.261719 10.140625 3.671875 11.082031 C 2.808594 11.054688 2 10.820313 1.292969 10.425781 C 1.292969 10.449219 1.292969 10.46875 1.292969 10.492188 C 1.292969 13.035156 3.101563 15.15625 5.503906 15.640625 C 5.0625 15.761719 4.601563 15.824219 4.121094 15.824219 C 3.78125 15.824219 3.453125 15.792969 3.132813 15.730469 C 3.800781 17.8125 5.738281 19.335938 8.035156 19.375 C 6.242188 20.785156 3.976563 21.621094 1.515625 21.621094 C 1.089844 21.621094 0.675781 21.597656 0.265625 21.550781 C 2.585938 23.039063 5.347656 23.90625 8.3125 23.90625 C 17.96875 23.90625 23.25 15.90625 23.25 8.972656 C 23.25 8.742188 23.246094 8.515625 23.234375 8.289063 C 24.261719 7.554688 25.152344 6.628906 25.855469 5.574219 ">
                            </path> --}}
                            <i class="fa-brands fa-twitter"></i>
                        </svg>
                    </a>
                    <a class="footer-social-link youtube" href="#" target="_blank">
                        <span class="hidden-link-text">Youtube</span>
                        <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">
                            {{-- <path class="footer-social-icon-path"
                                d="M 15 4 C 10.814 4 5.3808594 5.0488281 5.3808594 5.0488281 L 5.3671875 5.0644531 C 3.4606632 5.3693645 2 7.0076245 2 9 L 2 15 L 2 15.001953 L 2 21 L 2 21.001953 A 4 4 0 0 0 5.3769531 24.945312 L 5.3808594 24.951172 C 5.3808594 24.951172 10.814 26.001953 15 26.001953 C 19.186 26.001953 24.619141 24.951172 24.619141 24.951172 L 24.621094 24.949219 A 4 4 0 0 0 28 21.001953 L 28 21 L 28 15.001953 L 28 15 L 28 9 A 4 4 0 0 0 24.623047 5.0546875 L 24.619141 5.0488281 C 24.619141 5.0488281 19.186 4 15 4 z M 12 10.398438 L 20 15 L 12 19.601562 L 12 10.398438 z">
                            </path> --}}
                            <i class="fa-brands fa-youtube"></i>
                        </svg>
                    </a>
                    <a class="footer-social-link github" href="#" target="_blank">
                        <span class="hidden-link-text">Github</span>
                        <svg class="footer-social-icon-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32">
                            {{-- <path class="footer-social-icon-path"
                                d="M 16 4 C 9.371094 4 4 9.371094 4 16 C 4 21.300781 7.4375 25.800781 12.207031 27.386719 C 12.808594 27.496094 13.027344 27.128906 13.027344 26.808594 C 13.027344 26.523438 13.015625 25.769531 13.011719 24.769531 C 9.671875 25.492188 8.96875 23.160156 8.96875 23.160156 C 8.421875 21.773438 7.636719 21.402344 7.636719 21.402344 C 6.546875 20.660156 7.71875 20.675781 7.71875 20.675781 C 8.921875 20.761719 9.554688 21.910156 9.554688 21.910156 C 10.625 23.746094 12.363281 23.214844 13.046875 22.910156 C 13.15625 22.132813 13.46875 21.605469 13.808594 21.304688 C 11.144531 21.003906 8.34375 19.972656 8.34375 15.375 C 8.34375 14.0625 8.8125 12.992188 9.578125 12.152344 C 9.457031 11.851563 9.042969 10.628906 9.695313 8.976563 C 9.695313 8.976563 10.703125 8.65625 12.996094 10.207031 C 13.953125 9.941406 14.980469 9.808594 16 9.804688 C 17.019531 9.808594 18.046875 9.941406 19.003906 10.207031 C 21.296875 8.65625 22.300781 8.976563 22.300781 8.976563 C 22.957031 10.628906 22.546875 11.851563 22.421875 12.152344 C 23.191406 12.992188 23.652344 14.0625 23.652344 15.375 C 23.652344 19.984375 20.847656 20.996094 18.175781 21.296875 C 18.605469 21.664063 18.988281 22.398438 18.988281 23.515625 C 18.988281 25.121094 18.976563 26.414063 18.976563 26.808594 C 18.976563 27.128906 19.191406 27.503906 19.800781 27.386719 C 24.566406 25.796875 28 21.300781 28 16 C 28 9.371094 22.628906 4 16 4 Z ">
                            </path> --}}
                            <i class="fa-brands fa-github"></i>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="footer-copyright">
                <div class="footer-copyright-wrapper">
                    <p class="footer-copyright-text">
                        <a class="footer-copyright-link" href="#" target="_self"> ©2022. | Designed By: Acıktım restaurant | All rights reserved. </a>
                    </p>
                </div>
            </div>
        </footer>
    </div>
    <!-- end footer -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

</html>
