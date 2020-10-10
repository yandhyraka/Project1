<!DOCTYPE html>
<html lang="en">

<head>
    <title>ROCKAROMA -SIT-</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.green.min.css" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <style>
        body {
            background-image: url("{{asset('img/bg.bottomSquare.png')}}");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: bottom;
        }

        .container-card {
            position: relative;
        }

        .image-card {
            display: block;
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0;
            height: 100%;
            opacity: 0;
            transition: .4s ease;
            background-color: #BD7E28;
        }

        .container-card:hover .overlay {
            opacity: 0.7;
        }

        .text-card {
            color: white;
            font-size: 20px;
            position: absolute;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            text-align: center;
        }

        h2#linkback a:hover {
            text-decoration: underline;
        }

        .masthead {
            margin-bottom: 10rem;
        }

        .masthead-brand {
            margin-bottom: 0;
        }

        .nav-masthead .nav-link {
            padding: .25rem 0;
            font-weight: 500;
            color: #ffd143;
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: #FFD143;
            opacity: 0.4;
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #FFD143;
            border-bottom-color: #FFD143;
        }

        @media (min-width: 48em) {
            .masthead-brand {
                float: left;
            }

            .nav-masthead {
                float: right;
            }
        }

        .act-floating-btn {
            background: #BD7E28;
            display: block;
            width: 120px;
            height: auto;
            line-height: 50px;
            text-align: center;
            color: white;
            font-size: 30px;
            font-weight: bold;
            border-radius: 50%;
            -webkit-border-radius: 50%;
            text-decoration: none;
            transition: ease all 0.3s;
            position: fixed;
            right: 30px;
            bottom: 50px;
        }

        .act-btn:hover {
            background: blue
        }
    </style>
</head>

<body>
    <div class="bg"></div>
    <jumbotron class="mb-0">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-menu-background" style="background-color: black; opacity: 0.7;"></div>
            <div class="carousel-menu">
                <div class="container">
                    <header class="masthead mb-auto">
                        <div class="inner">
                            <h3 class="masthead-brand" style="color: #FFDF6C;">ROCK AROMA</h3>
                            <nav class="nav nav-masthead justify-content-center">
                                <a class="nav-link" href="{{ route('dashboard') }}">HOME</a>
                                @if (session()->has('password_hash_web'))
                                <a class="nav-link" href="{{ route('admins') }}">MANAGE</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="nav-link" style="margin-left: 25% ;" href="{{ route('logout') }}" onclick="event.preventDefault();this.closest('form').submit();">LOGOUT</a>
                                </form>
                                @else
                                <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                                @endif
                            </nav>
                        </div>
                    </header>
                </div>
            </div>
            <img class="card-img fit" src="{{ url('/images/no-image.png') }}" alt="Card image" style="height: 50em;">
        </div>
    </jumbotron>

    <div class="container">
        <div class="container" style="margin-top: 1%;">
            <div class="row">
                <div class="col-md-4">
                    <a id="backarrow" class="yellowed-font" href="javascript:void(0)" style="float: right; margin-top: 15%; margin-right: 15%;"><i class="material-icons">arrow_back</i></a>
                </div>
                <div class="col-md-8">
                    <h2 class="yellowed-font">CONTACT US</h2>
                    <br>
                    <p class="whited" style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vel sagittis leo. Proin luctus, erat at interdum tincidunt, nisi magna aliquam quam, laoreet malesuada tellus mi vitae neque. Curabitur ac purus in leo blandit congue sit amet vitae urna. Pellentesque tincidunt, ipsum vitae venenatis eleifend, nunc mauris rhoncus ligula, accumsan maximus urna augue ac mauris. Vestibulum at mauris in tellus semper consectetur. In hac habitasse platea dictumst. Nunc nec metus viverra, dignissim dui sit amet, molestie urna. Pellentesque facilisis vehicula justo sit amet accumsan. Maecenas scelerisque mi ac urna ultrices, in sollicitudin nunc consequat. Curabitur sit amet lacinia nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. In vitae ligula aliquam, lobortis augue in, lacinia arcu. Nunc fringilla elit eu erat imperdiet, at euismod dui rutrum. Vivamus pellentesque nulla facilisis, finibus orci nec, vestibulum magna.
                    </p>
                    <br>
                    <div class="container">
                        <p class="whited">SHARE:</p>
                        <a href="" class="yellowed-font"><img src="{{ url('/images/ig.png') }}" alt="" class="icon"></a>
                        <a href="" class="yellowed-font"><img src="{{ url('/images/fb.png') }}" alt="" class="icon"></a>
                        <a href="" class="yellowed-font"><img src="{{ url('/images/tw.png') }}" alt="" class="icon" style="width: 25px;"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer" style="background-color: #FFD143;">
        <div class="container yellowed" style="padding: 0 1%;">
            <a href="{{ route('about') }}" style="margin: 0 1%;" class="footer">About us</a>
            <a href="{{ route('contact') }}" style="margin: 0 1%;" class="footer">Contact us</a>
        </div>
    </footer>
</body>

</html>