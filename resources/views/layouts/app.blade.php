<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="canonical shortcut icon" href="{{ url('/gambar/logo4.png') }}">

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <!-- <link href="{{ asset('css/style.css') }}" rel="stylesheet"> -->

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/creative.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/all.css')}}" rel="stylesheet">

    <style type="text/css">
        body
        {
            background-image: url('/gambar/5.jpg');
            height: 50%;
            width: 100%;
        }
        .col-50{
            padding: 0 16px;
            -ms-flex: 50%; /* IE10 */
            flex: 50%;
        }
        input[type=text] {
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        #kodepos {
            margin-bottom: 10px;
            display: block;
        }
        .icon-container {
            margin-bottom: 20px;
            padding: 7px 0;
            font-size: 24px;
        }
        @media (max-width: 800px) {
            .row {
                flex-direction: column-reverse;
            }
        }
        .product-section-images {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 1px;
        }
        .selected {
            border: 4px solid lightblue;
        }
        .product-thumbnail {
            display: flex;
            align-items: center;
            border: 1px lightgray;
            min-height: 66px;
            cursor: pointer;
        }
        .product-thumbnail:hover {
            border: 1px solid lightblue;
        }
    </style>
    @include('layouts.script')
</head>
    

<body>
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-primary navbar-laravel">

            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{ url('/') }}">
                    <h4>{{ config('app.name', 'Laravel') }}</h4>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                

                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item">
                            <a href="{{ route('carts.index') }}" class="btn btn-primary" data-toggle="tooltip" title="Lihat Keranjang">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Cart
                                <span class="badge badge-pill badge-light">
                                    {{ count(session('cart',[])) }}
                                </span>
                            </a>
                        </li>
                        
                        @if (Auth::check())
                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Product</a>
                              
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.products.index') }}">List</a>

                                <a class="dropdown-item" href="{{ route('admin.products.create') }}">Tambah</a>
                                    
                            </div>
                                
                        </div>

                        <div class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> Order</a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.orders.index') }}">List</a>
                            </div>
                        </div>
                        @endif
                    </ul>
                </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    @yield('extra-js')
</body>

</html>
