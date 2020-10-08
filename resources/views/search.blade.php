<x-app-layout>

    <head>
        <title>Searh</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <x-slot name="header">
        <h2 class="font-semibold text-xl yellowed-font leading-tight">
            {{ __('Search Result') }}
        </h2>
    </x-slot>

    <div class="container">
        @if (!isset($article) || empty($article))
        <h2 class="font-semibold text-xl yellowed-font leading-tight" style="margin-bottom: 52%;">
            Sorry there are no article found...
        </h2>
        @endif
        <div style="margin-bottom: 52%;">
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
    </div>
</x-app-layout>