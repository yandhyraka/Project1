<x-app-layout>

    <head>
        <title>Article</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="container">
        <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
    </div>

    <div class="container" style="margin-top: 1%;">
        <div class="row">
            <div class="col-md-4">
                <a id="backarrow" href="javascript:void(0)" style="float: right; margin-top: 2%;"><i class="material-icons">arrow_back</i></a>
            </div>
            <div class="col-md-8">
                <p>Date</p>
                <h2>Title</h2>
                <p style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec maximus eu diam at volutpat. Nam quis fermentum libero, sollicitudin scelerisque mi. Donec malesuada, velit quis commodo congue, odio magna auctor nibh, ut congue mauris augue at massa. Sed eget dolor sed ante dictum pharetra sed suscipit tellus. Nullam lacus purus, porta quis sem eu, sodales porttitor nisl. Proin gravida, sapien eget tristique egestas, velit est vestibulum diam, gravida sagittis nunc dolor nec velit. Vestibulum orci ante, accumsan eget faucibus eget, auctor vitae mauris. Nulla nisi tellus, lobortis vitae cursus eget, varius sit amet orci. Fusce ullamcorper hendrerit lectus, id venenatis orci condimentum vitae. Donec ex leo, condimentum non felis rutrum, aliquet consequat neque. Aenean a augue velit.

                    Donec ac mauris ut odio mollis sodales. Vestibulum mollis tincidunt urna non pellentesque. Nunc scelerisque nibh semper nibh molestie volutpat. Vestibulum porttitor nisi arcu, at tempor elit blandit nec. Curabitur feugiat in augue ac dignissim. Aliquam quis lectus eget mauris feugiat suscipit at in justo. Donec ut faucibus ante. Vivamus hendrerit purus ac sapien vehicula, id tempor nunc congue. Integer convallis velit eu vestibulum malesuada. Vestibulum ex risus, aliquet in nulla et, dignissim sagittis lacus. Praesent nunc tellus, tempus in egestas at, pharetra at justo. Cras cursus elit quis elementum eleifend. Donec vel sem et quam mattis dignissim sit amet non mi.

                    Praesent vitae malesuada orci. Praesent aliquam ultrices lacus, et vestibulum est ullamcorper sed. Pellentesque augue lacus, vestibulum sit amet massa porttitor, interdum placerat ex. Donec pellentesque ipsum id malesuada posuere. Vivamus sed gravida arcu, eu commodo ipsum. Aliquam metus lacus, condimentum vitae lectus at, dictum fringilla tellus. Etiam enim magna, porta non pulvinar vel, fermentum a tortor. Nam consequat feugiat purus, non feugiat orci porttitor id. Etiam dictum leo id odio vulputate, eu tristique mauris fringilla. Praesent vehicula dui eros, mattis efficitur nisl sodales sed. Vivamus venenatis iaculis nisl, non placerat turpis pellentesque id. Suspendisse turpis metus, sagittis vel turpis at, semper ullamcorper ante. Phasellus elit sem, malesuada ac eros in, vulputate maximus metus.

                    Proin bibendum, enim id congue pharetra, tortor felis blandit felis, vel facilisis orci justo ac neque. Sed aliquam, diam nec efficitur aliquam, libero arcu auctor enim, ac commodo metus mi nec diam. In id nisi nec dui molestie iaculis. Aenean vestibulum efficitur enim ultrices scelerisque. Integer nec dui auctor, pretium ligula ac, tincidunt leo. Sed venenatis urna tortor, laoreet ultricies lacus ultricies at. Etiam sit amet ultricies turpis, a sollicitudin sem. Pellentesque accumsan lacus commodo, condimentum mi in, molestie leo. Nam mi purus, elementum vel malesuada eget, facilisis nec urna.

                    Sed et luctus neque, eget vestibulum est. Maecenas hendrerit mattis justo nec pulvinar. Phasellus sed sollicitudin massa, et feugiat enim. Mauris congue vehicula metus, ac condimentum mauris elementum ac. Mauris gravida ante nec est pretium scelerisque. Aliquam scelerisque augue at mi faucibus ultrices. Integer pulvinar ultricies tellus, ut interdum ligula condimentum in. Nunc volutpat nisi sit amet nulla scelerisque fermentum. Fusce dapibus, quam at condimentum suscipit, orci libero ornare sem, quis feugiat libero nisl et lorem. In eu mi pretium, elementum dolor sit amet, dapibus diam. Vestibulum suscipit molestie sapien. Pellentesque ipsum dolor, eleifend id dui nec, fringilla ornare diam. Sed iaculis vel tellus in facilisis. Proin sit amet eros quis risus sollicitudin vulputate. Etiam rhoncus, est sit amet pharetra posuere, nisl orci dignissim leo, id venenatis ex dui nec leo.</p>
                <div class="container">
                    <div class="owl-carousel" id="carousel">
                        <div>
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                        </div>
                        <div>
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                        </div>
                        <div>
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                        </div>
                        <div>
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                        </div>
                        <div>
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                        </div>
                        <div>
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                        </div>
                        <div>
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                        </div>
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
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                            </div>
                            <div class="carousel-item">
                                <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                            </div>
                            <div class="carousel-item">
                                <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image">
                            </div>
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
                loop: true,
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