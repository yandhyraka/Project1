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

    <div class="container">
        <div class="row">
            <div class="col-sm" style="padding-right: 0;">
                <div class="card bg-dark text-white">
                    <img class="card-img fit" src="{{ $header[0]['image'] }}" alt="Card image" style="height: 40em;">
                    <div class="card-img-overlay">
                        <h5 class="card-title">{{ $header[0]['title'] }}</h5>
                        <p class="card-text">{{ $header[0]['content'] }}</p>
                        <p class="card-text">{{ $header[0]['date'] }}</p>
                    </div>
                </div>
            </div>
            <div class="col-sm" style="padding-left: 0;">
                <div class="row">
                    <div class="col-sm">
                        <div class="card bg-dark text-white" style="height: 100%;">
                            <img class="card-img fit" src="{{ $header[1]['image'] }}" alt="Card image" style="height: 20em;">
                            <div class="card-img-overlay">
                                <h5 class="card-title">{{ $header[1]['title'] }}</h5>
                                <p class="card-text">{{ $header[1]['content'] }}</p>
                                <p class="card-text">{{ $header[1]['date'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <div class="card bg-dark text-white">
                            <img class="card-img fit" src="{{ $header[2]['image'] }}" alt="Card image" style="height: 20em;">
                            <div class="card-img-overlay">
                                <h5 class="card-title">{{ $header[2]['title'] }}</h5>
                                <p class="card-text">{{ $header[2]['content'] }}</p>
                                <p class="card-text">{{ $header[2]['date'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        @for ($i = 0; $i < sizeof($article); $i++) { @if($i==0 || $i==3 || $i==6) <div class="row"> @endif
            <div class="col-sm">
                <div class="card" style="width: 100%;">
                    <img class="card-img-top" src="{{ $article[$i]['image'] }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $article[$i]['title'] }}</h5>
                        <p class="card-text">{{ $article[$i]['content'] }}</p>
                        <p class="card-text">{{ $article[$i]['date'] }}</p>
                    </div>
                </div>
            </div>
            @if($i==2 || $i==5 || $i==9) </div> @endif
    @endfor
    </div>

    <div class="container" style="margin: 1%;">
        <nav aria-label="Page navigation example">
            <ul class="pagination" style="margin: 0 auto;">
                @if (isset($previous) && !empty($previous))
                <li class="page-item yellowed" style="margin: auto;"><a class="page-link yellowed" href="{{ $previous }}">Previous</a></li>
                @endif
                @foreach ($pagination as $pagination)
                <li class="page-item yellowed" style="margin: auto;"><a class="page-link yellowed" href="{{ $pagination['url'] }}">{{ $pagination['number'] }}</a></li>
                @endforeach
                @if (isset($next) && !empty($next))
                <li class="page-item yellowed" style="margin: auto;"><a class="page-link yellowed" href="{{ $next }}">Next</a></li>
                @endif
            </ul>
        </nav>
    </div>
</x-app-layout>