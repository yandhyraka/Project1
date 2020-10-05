<x-app-layout>

    <head>
        <title>Home</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-bottom: -21%;">
        <div class="row">
            <div class="col-sm" style="padding-right: 0;">
                <div class="card bg-dark text-white" style="height: 50%;">
                    <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image" style="height: 100%;">
                    <div class="card-img-overlay">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                        <p class="card-text">Last updated 3 mins ago</p>
                    </div>
                </div>
            </div>
            <div class="col-sm" style="padding-left: 0;">
                <div class="row" style="height: 25%;">
                    <div class="col-sm" style="height: 100%;">
                        <div class="card bg-dark text-white" style="height: 100%;">
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image" style="height: 100%;">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text">Last updated 3 mins ago</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" style="height: 25%;">
                    <div class="col-sm" style="height: 100%;">
                        <div class="card bg-dark text-white" style="height: 100%;">
                            <img class="card-img" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image" style="height: 100%;">
                            <div class="card-img-overlay">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text">Last updated 3 mins ago</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/11/29/05/45/astronomy-1867616__340.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <nav aria-label="Page navigation example">
            <ul class="pagination" style="margin: 1% 38.7%;">
                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</x-app-layout>