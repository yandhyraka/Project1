<x-app-layout>

    <head>
        <title>Home</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl yellowed-font leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-sm" style="padding-right: 0;">
                <div class="card bg-dark text-white">
                    <img class="card-img fit" src="{{ $header[0]['image'] }}" alt="Card image" style="height: 40em;">
                    <div class="down">
                        <h2 class="card-title yellowed-font">{{ $header[0]['title'] }}</h2>
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
                            <div class="down">
                                <h2 class="card-title yellowed-font">{{ $header[1]['title'] }}</h2>
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
                            <div class="down">
                                <h2 class="card-title yellowed-font">{{ $header[2]['title'] }}</h2>
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
        @for ($i = 0; $i < sizeof($article); $i++) { @if($i==0 || $i%3==0) <div class="row">
            @endif
            @if (array_key_exists('no_article', $article[$i]))
            <div class="col-sm"></div>
            @else
            <div class="col-sm">
                <div class="card" style="width: 100%; height: 25rem;">
                    <img class="card-img-top fit" src="{{ $article[$i]['image'] }}" style="height: 12.5em;">
                    <div class="card-body">
                        <h5 class="card-title yellowed-font">{{ $article[$i]['title'] }}</h5>
                        <p class="card-text">{{ $article[$i]['content'] }}</p>
                        <p class="card-text down">{{ $article[$i]['date'] }}</p>
                    </div>
                </div>
            </div>
            @endif
            @if($i==2 || $i%3==2) </div> @endif
    @endfor
    </div>

    <div class="container" style="height:1rem; margin-top: 1%; margin-bottom: 1%;">
        <div class="row">
            <div class="col-sm"></div>
            <div class="col-sm">
                <nav class="pagination" aria-label="Page navigation example" style="text-align: center;">
                    <ul class="pagination">
                        @if (isset($previous) && !empty($previous))
                        <li class="page-item yellowed"><a class="page-link yellowed" href="{{ $previous }}">Previous</a></li>
                        @endif
                        @foreach ($pagination as $pagination)
                        <li class="page-item yellowed"><a class="page-link yellowed" href="{{ $pagination['url'] }}">{{ $pagination['number'] }}</a></li>
                        @endforeach
                        @if (isset($next) && !empty($next))
                        <li class="page-item yellowed"><a class="page-link yellowed" href="{{ $next }}">Next</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
        <div class="col-sm"></div>
    </div>
</x-app-layout>