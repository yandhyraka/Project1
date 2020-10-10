<!DOCTYPE html>
<html lang="en">

<head>
    <title>ROCKAROMA -SIT-</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
        </div>
    </jumbotron>

    <div class="container">
        <div class="row" style="padding-top: 5%">
            <div class="col-sm-5">
                <h4 style="color: #FFD143"><strong>SEARCH RESULT</strong></h4>
            </div>
            <div class="col-sm-7">
                <div class="text-right">
                    <div style="width:35%; margin: 1% 0 0 60%;">
                        <form method="GET" action="{{ route('search.index') }}">
                            <input style="width:58%" name="search" type="text">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @if (!isset($article[0]['title']) || empty($article[0]['title']))
        <h5 class="font-semibold text-xl yellowed-font leading-tight" style="margin-bottom: 52%;">
            Sorry there are no article found...
        </h5>
        @endif
        <div style="margin-bottom: 52%;">
            @for ($i = 0; $i < sizeof($article); $i++) @if($i==0 || $i%3==0) <div class="row" style="padding-top: 35px; padding-left: 25px; padding-right: 25px;">
                @endif
                @if (array_key_exists('no_article', $article[$i]))
                <div class="col-md-4 col-sm-8"></div>
                @else
                <div class="col-md-4 col-sm-8">
                    <center>
                        <div class="card" style="width: 17.75rem;">
                            <a href="{{ $article[$i]['url'] }}">
                                <div class="container-card">
                                    <img src="{{ $article[$i]['image'] }}" alt="Avatar" class="image-card fit" style="height: 12.5em;">
                                    <div class="overlay">
                                        <div class="text-card">Read More</div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <p class="card-text" style="text-align: left;">
                                        <strong style="color: #FFD143">{{ $article[$i]['title'] }}</strong>
                                        <br>
                                        <label style="color: white">{{ $article[$i]['content'] }}</label>
                                    </p>
                                </div>
                            </a>
                        </div>
                    </center>
                </div>
                @endif
                @if($i==2 || $i%3==2) </div> @endif
        @endfor
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