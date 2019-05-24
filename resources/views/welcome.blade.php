<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="canonical shortcut icon" href="{{ url('/gambar/logo4.png') }}">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Custom fonts for this template -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <!-- Plugin CSS -->
    <link href="{{asset('vendor/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{asset('css/creative.min.css')}}" rel="stylesheet">

    <!-- Styles -->
    <style>
        html,
        body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

        body
            {
                height: 99%;
                background-attachment: fixed;
                background-size: cover;
                color: white;
                text-shadow: 1px 1px 10px rgba(0,0,0,0.5);
                border-radius: 0;
                border: 0;
            }
    </style>
</head>

<body>
    <!-- Masthead -->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end">
                    <h1 class="text-uppercase text-white font-weight-bold">Granada Book Store</h1>
                    <hr class="divider my-4">
                </div>

                <div class="col-lg-10 align-self-baseline">
                    <p class="text-white-75 font-weight-light mb-5">Toko Buku Itu Bukti Nyata Bahwa Keragaman Selera Bisa Kumpul Di Bawah Satu Atap Tanpa Saling Mencela. Bookstores Are The Least Discriminative Place In The World.</p>

                    @if (Route::has('login'))
                        @auth
                            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                        @else
                            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </header>

</body>

</html>
