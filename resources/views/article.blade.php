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
            <img class="card-img fit" src="{{ $header }}" alt="Card image" style="height: 50em;">
        </div>
    </jumbotron>

    <div class="container">
        <div class="container" style="margin-top: 1%;">
            <div class="row">
                <div class="col-md-4">
                    <a id="backarrow" class="yellowed-font" href="javascript:void(0)" style="float: right; margin-top: 15%; margin-right: 15%;"><i class="material-icons">arrow_back</i></a>
                </div>
                <div class="col-md-8">
                    <p class="whited">{{ $date }}</p>
                    <h2 class="yellowed-font">{{ $title }}</h2>
                    <br>
                    <p class="whited" style="text-align: justify;">{{ $content }}</p>
                    <div class="container">
                        <div class="owl-carousel" id="carousel">
                            @foreach ($carousel as $carousel_data)
                            <div>
                                <img class="card-img" src="{{ $carousel_data }}" alt="Card image">
                            </div>
                            @endforeach
                        </div>
                    </div>
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

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Image Preview</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                @for ($i = 0; $i < sizeof($carousel); $i++) @if($i==0) <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">
                                    </li>
                                    @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i }}"></li>
                                    @endif

                                    @endfor
                            </ol>
                            <div class="carousel-inner">
                                @foreach ($carousel as $carousel_data)
                                <div class="carousel-item active">
                                    <img class="card-img" src="{{ $carousel_data }}" alt="Card image">
                                </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
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

    <script>
        $(document).ready(function() {
            $('#backarrow').click(function() {
                window.history.back();
            });

            $('#carousel').click(function() {
                $('#exampleModal').modal('show');
            });

            $('.owl-carousel').owlCarousel({
                loop: false,
                margin: 3,
                nav: true,
                dots: true,
                navText: ['<span style="margin-right: 5px;">Previous</span>', '<span>Next</span>'],
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })
        });
    </script>

    <style>
        .owl-nav {
            margin-left: 43%;
        }

        .owl-prev>span {
            font-size: 1em;
        }

        .owl-next>span {
            font-size: 1em;
        }
    </style>
</body>

</html>