<x-app-layout>

    <head>
        <title>{{ $title }}</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $title }}
        </h2>
    </x-slot>

    <div class="container">
        <img class="card-img" src="{{ $header }}" alt="Card image">
    </div>

    <div class="container" style="margin-top: 1%;">
        <div class="row">
            <div class="col-md-4">
                <a id="backarrow" href="javascript:void(0)" style="float: right; margin-top: 2%;"><i class="material-icons">arrow_back</i></a>
            </div>
            <div class="col-md-8">
                <p>{{ $date }}</p>
                <h2>{{ $title }}</h2>
                <p style="text-align: justify;">{{ $content }}</p>
                <div class="container">
                    <div class="owl-carousel" id="carousel">
                        @foreach ($carousel as $carousel_data)
                        <div>
                            <img class="card-img" src="{{ $carousel_data }}" alt="Card image">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="container" style="padding: 0;">
                    <p>Share:</p>
                    <a href=""><i class="material-icons">arrow_back</i></a>
                    <a href=""><i class="material-icons">arrow_back</i></a>
                    <a href=""><i class="material-icons">arrow_back</i></a>
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
</x-app-layout>