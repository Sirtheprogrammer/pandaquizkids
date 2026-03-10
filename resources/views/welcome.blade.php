@extends('layouts.public')

@section('content')
<!-- filter chips (with icons) -->
<nav class="pqk-categories" aria-label="Game categories">
    <button class="pqk-chip pqk-chip--active" data-filter="all" type="button"><i class="fas fa-rainbow"></i> All games</button>
    @php
        $categoryIcons = [
            'puzzle'   => 'fa-puzzle-piece',
            'coloring' => 'fa-paint-brush',
            'brain'    => 'fa-lightbulb',
            'memory'   => 'fa-brain',
            'logic'    => 'fa-calculator',
        ];
    @endphp
    @foreach($categories as $category)
        @php
            $icon = $categoryIcons[$category->slug] ?? 'fa-gamepad';
        @endphp
        <button class="pqk-chip" data-filter="{{ $category->slug }}" type="button"><i class="fas {{ $icon }}"></i> {{ $category->name }}</button>
    @endforeach
</nav>

<!-- game grid — dynamically rendered from DB -->
<main class="pqk-grid">
    @php
        $categoryLabels = [
            'puzzle'   => ['label' => 'Puzzle',       'icon' => 'fa-puzzle-piece'],
            'coloring' => ['label' => 'Coloring',     'icon' => 'fa-palette'],
            'brain'    => ['label' => 'Brainstorm',   'icon' => 'fa-brain'],
            'memory'   => ['label' => 'Memory',       'icon' => 'fa-eye'],
            'logic'    => ['label' => 'Logic &amp; math', 'icon' => 'fa-calculator'],
        ];

        $decoMap = [
            'easy'   => ['icon' => 'fa-star',    'text' => 'easy'],
            'medium' => ['icon' => 'fa-bolt',    'text' => 'medium'],
            'hard'   => ['icon' => 'fa-fire',    'text' => 'hard'],
        ];
    @endphp

    @foreach ($games as $game)
        @php
            $cat   = $game->category ?? 'puzzle';
            $label = $categoryLabels[$cat] ?? ['label' => ucfirst($cat), 'icon' => 'fa-gamepad'];
            $deco  = $decoMap[$game->difficulty] ?? ['icon' => 'fa-rotate-left', 'text' => $game->levels . ' lvls'];
        @endphp
        <article class="pqk-game" data-category="{{ $cat }}">
            <div class="pqk-game-picture">
                @if ($game->image)
                    <img src="{{ $game->image }}" alt="{{ $game->title }}" style="width:100%; height:100%; object-fit:cover;">
                @else
                    <i class="fas {{ $label['icon'] }}"></i>
                @endif
            </div>
            <div class="pqk-game-content">
                <h2 class="pqk-game-title">{{ $game->title }}</h2>
                <span class="pqk-cat-tag"><i class="fas {{ $label['icon'] }}"></i> {{ $label['label'] }}</span>
                <p class="pqk-game-text">{{ $game->description }}</p>
                <div class="pqk-game-footer">
                    <a href="{{ route('games.play', ['gameId' => $game->slug]) }}" class="pqk-play">
                        <i class="fas fa-play"></i> Play now
                    </a>
                    <span class="pqk-deco">
                        <i class="fas {{ $deco['icon'] }}"></i> {{ $deco['text'] }}
                    </span>
                </div>
            </div>
        </article>
    @endforeach
</main>
@endsection