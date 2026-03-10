<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PandaQuizKids · playful games</title>

    <!-- Fonts & icons (kid‑friendly, solid) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome 6 (free) for crisp icons / game pictures -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* ---------- CSS VARIABLES FOR LIGHT & DARK THEMES ---------- */
        :root {
            /* light theme (default) - MashaQuiz inspired */
            --bg-body: #F5F5F5;           /* light gray */
            --text-primary: #333333;      /* dark gray */
            --text-secondary: #666666;
            --accent-orange: #FF6B35;
            --accent-light: #FFE5D9;
            --accent-yellow: #FFD700;
            --accent-panel: #FFE082;
            --header-icon-bg: #FF1F66;    /* hot pink */
            --header-icon-text: #FFFFFF;
            --header-shadow: #C41551;
            --chip-bg: #FFFFFF;
            --chip-border: #FF1F66;
            --chip-shadow: #FF1F66;
            --chip-active-bg: #FF1F66;
            --chip-active-text: #FFFFFF;
            --card-bg: #FFFFFF;
            --card-border: #EEEEEE;
            --card-shadow: #CCCCCC;
            --picture-overlay: none;
            --tag-bg: #FFE082;
            --tag-border: #FFC107;
            --play-bg: #FF1F66;
            --play-text: #FFFFFF;
            --play-shadow: #C41551;
            --sidebar-bg: #FF1F66;        /* hot pink */
            --sidebar-border: #FFFFFF;
            --sidebar-link-bg: #FFD700;
            --sidebar-link-shadow: #FF1F66;
            --footer-bg: #FF1F66;
            --footer-border: #FFFFFF;
            --footer-text: #FFFFFF;
            --menu-btn-bg: #FFFFFF;
            --menu-btn-text: #FF1F66;
            --overlay-bg: rgba(0,0,0,0.4);
            --icon-color: inherit;
        }

        /* dark theme */
        .dark-theme {
            --bg-body: #1A1A1A;           /* very dark */
            --text-primary: #FFFFFF;       /* white */
            --text-secondary: #E0E0E0;
            --accent-orange: #FF8C5A;     /* lighter orange for visibility */
            --accent-light: #2A2A2A;
            --accent-yellow: #FFD700;
            --accent-panel: #2A2A2A;
            --header-icon-bg: #FF1F66;
            --header-icon-text: #FFFFFF;
            --header-shadow: #C41551;
            --chip-bg: #333333;            /* slightly lighter dark */
            --chip-border: #FF1F66;
            --chip-shadow: #FF1F66;
            --chip-active-bg: #FF1F66;
            --chip-active-text: #FFFFFF;
            --card-bg: #2A2A2A;
            --card-border: #444444;        /* lighter border for dark mode */
            --card-shadow: #000000;
            --tag-bg: #FF1F66;
            --tag-border: #FFFFFF;
            --play-bg: #FF1F66;
            --play-text: #FFFFFF;
            --play-shadow: #C41551;
            --sidebar-bg: #FF1F66;
            --sidebar-border: #FFFFFF;
            --sidebar-link-bg: #FFD700;
            --sidebar-link-shadow: #FF1F66;
            --footer-bg: #FF1F66;
            --footer-border: #FFFFFF;
            --footer-text: #FFFFFF;
            --menu-btn-bg: #333333;        /* dark button background */
            --menu-btn-text: #FFD700;      /* golden yellow text */
            --overlay-bg: rgba(0,0,0,0.7);
            --icon-color: inherit;
        }

        /* Dark theme adjustments for buttons */
        .dark-theme .pqk-theme-btn,
        .dark-theme .pqk-menu-btn {
            background: #333333;
            border: 3px solid #444444;
            color: #FFD700;
        }

        .dark-theme .pqk-game-title {
            color: #FFFFFF;
        }

        .dark-theme .pqk-game-text {
            color: #E0E0E0;
        }

        /* apply variables */
        body {
            font-family: 'Quicksand', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-primary);
            min-height: 100vh;
            width: 100%;
            line-height: 1.4;
            transition: background-color 0.2s, color 0.2s;
        }

        /* ---------- RESET & FULLSCREEN ---------- */
        html, body {
            margin: 0;
            padding: 0;
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .pqk-full {
            width: 100%;
            padding: 0 1.2rem 2rem;
        }

        /* ---------- HEADER with hamburger + theme toggle (nowrap fix) ---------- */
        .pqk-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin: 0 -1.2rem 2rem -1.2rem;
            gap: 0.5rem;                /* reduced gap for tight screens */
            flex-wrap: wrap;
            background: linear-gradient(135deg, #FF1F66 0%, #E91E8C 100%);
            padding: 1rem 1.2rem;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 12px rgba(255,31,102,0.3);
            width: calc(100% + 2.4rem);
        }

        @media (min-width: 901px) {
            .pqk-header {
                flex-wrap: nowrap;
                padding: 0.8rem 1.2rem;
            }
        }

        .pqk-brand {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex: 0 0 auto;              /* don't shrink, don't grow */
            min-width: 0;                 /* enable flex shrink */
        }

        .pqk-brand-icon {
            background-color: var(--header-icon-bg);
            color: var(--header-icon-text);
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.4rem;
            font-weight: 700;
            box-shadow: 0 6px 0 var(--header-shadow);
            transition: transform 0.2s ease;
            line-height: 1;
            flex-shrink: 0;               /* icon stays fixed */
        }

        .pqk-brand-text {
            min-width: 0;                  /* allow text to shrink */
            overflow: hidden;              /* hide overflow if needed, but we'll control via font size */
        }

        .pqk-brand-text h1 {
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1.1;
            color: #FFFFFF;
            letter-spacing: -0.02em;
            white-space: nowrap;           /* keep title on one line */
            overflow: hidden;
            text-overflow: ellipsis;       /* gracefully truncate if too long */
            text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
        }

        .pqk-brand-text span {
            font-size: 0.9rem;
            font-weight: 600;
            color: #FFFFFF;
            background-color: #FFD700;
            padding: 0.3rem 0.8rem;
            border-radius: 40px;
            display: inline-block;
            margin-top: 4px;
            border: 2px solid #FFFFFF;
            white-space: nowrap;           /* keep span on one line */
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        /* header categories (only visible on large screens) */
        .pqk-header-categories {
            display: none;
            gap: 0;
        }

        @media (min-width: 901px) {
            .pqk-header-categories {
                display: flex;
                flex: 1;
                gap: 0;
                justify-content: center;
                margin: 0 1rem;
            }
        }

        .pqk-header-categories .pqk-chip {
            flex: 1;
            max-width: 130px;
            border-radius: 0;
            border: 1px solid rgba(255,255,255,0.3);
            background-color: transparent;
            color: #FFFFFF;
            font-size: 1rem;
            padding: 0.6rem 0.8rem;
            box-shadow: none;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .pqk-header-categories .pqk-chip:first-child {
            border-radius: 8px 0 0 8px;
        }

        .pqk-header-categories .pqk-chip:last-child {
            border-radius: 0 8px 8px 0;
        }

        .pqk-header-categories .pqk-chip:hover {
            background-color: rgba(255,255,255,0.2);
            transform: none;
        }

        .pqk-header-categories .pqk-chip--active {
            background-color: #FFD700;
            color: #FF1F66;
            border-color: #FFD700;
            box-shadow: none;
        }

        .pqk-header-categories .pqk-chip i {
            display: none;
        }

        /* header actions: theme toggle + hamburger */
        .pqk-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-shrink: 0;                /* prevent actions from shrinking */
        }

        .pqk-theme-btn {
            background: #FFFFFF;
            border: 3px solid #FFFFFF;
            color: #FF1F66;
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            transition: all 0.1s ease;
            flex-shrink: 0;
        }

        .pqk-theme-btn:active {
            transform: translateY(2px);
            box-shadow: 0 2px 4px rgba(0,0,0,0.15);
        }

        .pqk-menu-btn {
            background: #FFFFFF;
            border: 3px solid #FFFFFF;
            color: #FF1F66;
            width: 52px;
            height: 52px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            transition: all 0.1s ease;
            flex-shrink: 0;
        }

        .pqk-menu-btn:active, .pqk-theme-btn:active {
            transform: translateY(5px);
            box-shadow: 0 2px 0 var(--header-shadow);
        }

        /* ---------- SIDEBAR (off‑canvas, solid) ---------- */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: var(--overlay-bg);
            backdrop-filter: none;
            z-index: 998;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.2s, visibility 0.2s;
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: -320px;
            width: 280px;
            height: 100%;
            background-color: var(--sidebar-bg);
            border-right: 5px solid var(--sidebar-border);
            box-shadow: 8px 0 0 var(--sidebar-border);
            z-index: 999;
            padding: 2rem 1.5rem;
            transition: left 0.25s ease-out;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .sidebar.open {
            left: 0;
        }

        .sidebar-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .sidebar-close {
            align-self: flex-end;
            background: #FFD700;
            color: #FF1F66;
            width: 44px;
            height: 44px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            border: 3px solid #FFFFFF;
            cursor: pointer;
            box-shadow: 0 4px 0 #FFC700;
            transition: 0.1s;
        }

        .sidebar-close:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #FFC700;
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .sidebar nav a {
            background-color: #FFD700;
            color: #FF1F66;
            text-decoration: none;
            font-size: 1.4rem;
            font-weight: 700;
            padding: 1rem 1.2rem;
            border-radius: 14px;
            border: 3px solid #FFFFFF;
            box-shadow: 0 4px 0 #FFC700;
            transition: all 0.1s;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sidebar nav a i {
            font-size: 1.6rem;
            width: 2rem;
        }

        .sidebar nav a:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #FFC700;
        }

        /* hidden on large screens since categories are in header */
        .pqk-categories {
            display: flex;
            gap: 0.8rem;
            overflow-x: auto;
            padding: 0.5rem 0 1.2rem;
            margin-bottom: 1rem;
            -webkit-overflow-scrolling: touch;
        }

        @media (min-width: 901px) {
            .pqk-categories {
                display: none;
            }
        }

        .pqk-chip {
            background-color: #FFFFFF;
            border: 3px solid #FF1F66;
            color: #FF1F66;
            font-weight: 700;
            font-size: 1.1rem;
            padding: 0.8rem 1.5rem;
            border-radius: 50px;
            box-shadow: 0 4px 0 #FF1F66;
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.1s ease;
            flex-shrink: 0;
        }

        .pqk-chip i {
            margin-right: 6px;
        }

        .pqk-chip:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #FF1F66;
        }

        .pqk-chip--active {
            background-color: #FF1F66;
            color: #FFFFFF;
            border-color: #FF1F66;
            box-shadow: 0 4px 0 #C41551;
        }

        /* ---------- GAME GRID (full width) ---------- */
        .pqk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 1.5rem 0 2rem;
        }

        .pqk-game {
            background-color: #FFFFFF;
            border: 4px solid #FF1F66;
            border-radius: 20px;
            box-shadow: 0 8px 0 rgba(255,31,102,0.2), 0 4px 12px rgba(255,31,102,0.15);
            overflow: hidden;
            transition: all 0.15s ease;
            display: flex;
            flex-direction: column;
        }

        .pqk-game:hover {
            transform: scale(1.02) translateY(-4px);
            box-shadow: 0 12px 0 rgba(255,31,102,0.25), 0 6px 16px rgba(255,31,102,0.2);
        }

        /* game picture area — solid background with icon */
        .pqk-game-picture {
            height: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-bottom: 4px solid var(--card-border);
            font-size: 5rem;
            color: var(--text-primary);
            transition: background 0.2s;
        }

        /* per‑category picture backgrounds (solid) */
        .pqk-game[data-category="puzzle"] .pqk-game-picture { background: linear-gradient(135deg, #87CEEB 0%, #B0E0E6 100%); }
        .pqk-game[data-category="coloring"] .pqk-game-picture { background: linear-gradient(135deg, #FFB6C1 0%, #FFC0CB 100%); }
        .pqk-game[data-category="brain"] .pqk-game-picture { background: linear-gradient(135deg, #98D98E 0%, #7ED321 100%); }
        .pqk-game[data-category="memory"] .pqk-game-picture { background: linear-gradient(135deg, #DDA0DD 0%, #EE82EE 100%); }
        .pqk-game[data-category="logic"] .pqk-game-picture { background: linear-gradient(135deg, #FFD700 0%, #FFA500 100%); }

        .pqk-game-content {
            padding: 1.2rem 1.2rem 1.4rem;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .pqk-game-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
        }

        .pqk-cat-tag {
            background-color: #FF1F66;
            border: 2px solid #FF1F66;
            color: #FFFFFF;
            border-radius: 30px;
            padding: 0.4rem 1rem;
            font-size: 0.9rem;
            font-weight: 700;
            display: inline-block;
            width: fit-content;
            box-shadow: 0 2px 0 #C41551;
        }

        .pqk-cat-tag i {
            margin-right: 4px;
        }

        .pqk-game-text {
            font-size: 1rem;
            color: var(--text-secondary);
            font-weight: 500;
            margin: 0.2rem 0 0.4rem;
        }

        .pqk-game-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 0.5rem;
        }

        .pqk-play {
            background-color: #FF1F66;
            color: #FFFFFF;
            border: 3px solid #FF1F66;
            border-radius: 50px;
            padding: 0.7rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 0 #C41551;
            transition: 0.1s;
            cursor: pointer;
        }

        .pqk-play:active {
            transform: translateY(2px);
            box-shadow: 0 2px 0 #C41551;
        }

        .pqk-play i {
            font-size: 1.1rem;
        }

        .pqk-deco {
            font-size: 1rem;
            font-weight: 600;
            color: #FF1F66;
            background: #FFE082;
            padding: 0.3rem 0.9rem;
            border-radius: 20px;
            border: 2px solid #FFC107;
        }

        .pqk-deco i {
            margin-right: 4px;
        }

        /* footer note */
        .pqk-footer-note {
            text-align: center;
            color: #FFFFFF;
            font-weight: 600;
            background: linear-gradient(135deg, #FF1F66 0%, #E91E8C 100%);
            border: 3px solid #FFFFFF;
            border-radius: 50px;
            padding: 0.9rem 1.5rem;
            margin-top: 2rem;
            box-shadow: 0 6px 0 #C41551, 0 4px 12px rgba(255,31,102,0.2);
        }

        .pqk-footer-note i {
            margin: 0 4px;
        }

        /* no age badges */
        .age-badge, .pqk-badge, [class*="age"] {
            display: none;
        }

        /* ---------- MOBILE FINE‑TUNING (header stays inline) ---------- */
        @media (max-width: 500px) {
            .pqk-header {
                gap: 0.3rem;
            }
            .pqk-brand {
                gap: 0.4rem;
            }
            .pqk-brand-icon {
                width: 42px;
                height: 42px;
                font-size: 2rem;
            }
            .pqk-brand-text h1 {
                font-size: 1.3rem;        /* smaller to fit */
            }
            .pqk-brand-text span {
                font-size: 0.7rem;
                padding: 0.1rem 0.6rem;
            }
            .pqk-theme-btn, .pqk-menu-btn {
                width: 48px;
                height: 48px;
                font-size: 1.6rem;
            }
        }

        @media (max-width: 380px) {
            .pqk-brand-text h1 {
                font-size: 1.1rem;
            }
            .pqk-brand-text span {
                font-size: 0.6rem;
                padding: 0.1rem 0.4rem;
            }
            .pqk-theme-btn, .pqk-menu-btn {
                width: 42px;
                height: 42px;
                font-size: 1.4rem;
            }
        }
    </style>
</head>
<body>
    <!-- sidebar overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- off-canvas sidebar -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-close" id="closeSidebarBtn"><i class="fas fa-times"></i></div>
        <nav>
            <a href="#"><i class="fas fa-house"></i> Home</a>
            <a href="#"><i class="fas fa-gamepad"></i> All games</a>
            <a href="#"><i class="fas fa-star"></i> Favourites</a>
            <a href="#"><i class="fas fa-bear"></i> Panda tips</a>
            <a href="#"><i class="fas fa-circle-info"></i> Parents</a>
        </nav>
    </aside>

    <!-- main FULLSCREEN content -->
    <div class="pqk-full">
        <!-- header with hamburger and theme toggle -->
        <header class="pqk-header">
            <div class="pqk-brand">
                <div class="pqk-brand-icon">🐼</div>
                <div class="pqk-brand-text">
                    <h1>PandaQuizKids</h1>
                    <span>play & learn</span>
                </div>
            </div>
            <!-- Categories on large screens -->
            <nav class="pqk-header-categories" aria-label="Game categories">
                <button class="pqk-chip pqk-chip--active" data-filter="all" type="button">All games</button>
                @foreach($categories as $category)
                    <button class="pqk-chip" data-filter="{{ $category->slug }}" type="button">{{ $category->name }}</button>
                @endforeach
            </nav>
            <div class="pqk-actions">
                <div class="pqk-theme-btn" id="themeToggle" aria-label="Toggle theme">
                    <i class="fas fa-sun" id="themeIcon"></i>
                </div>
                <div class="pqk-menu-btn" id="menuToggle" aria-label="Menu">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
        </header>

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

        <!-- footer with stars -->
        <div class="pqk-footer-note">
            <i class="fas fa-star"></i> Big, bright & tap‑friendly – kids explore all by themselves! <i class="fas fa-star"></i>
        </div>
    </div>

    <script>
        (function() {
            // ----- SIDEBAR TOGGLE -----
            const menuBtn = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            const closeBtn = document.getElementById('closeSidebarBtn');

            function openSidebar() {
                sidebar.classList.add('open');
                overlay.classList.add('active');
            }

            function closeSidebar() {
                sidebar.classList.remove('open');
                overlay.classList.remove('active');
            }

            menuBtn.addEventListener('click', openSidebar);
            closeBtn.addEventListener('click', closeSidebar);
            overlay.addEventListener('click', closeSidebar);

            // ----- FILTER CHIPS -----
            const chips = document.querySelectorAll('.pqk-chip');
            const games = document.querySelectorAll('.pqk-game');

            chips.forEach(chip => {
                chip.addEventListener('click', function(e) {
                    const filter = this.getAttribute('data-filter') || 'all';

                    chips.forEach(c => c.classList.remove('pqk-chip--active'));
                    this.classList.add('pqk-chip--active');

                    games.forEach(game => {
                        const cat = game.getAttribute('data-category');
                        game.style.display = (filter === 'all' || cat === filter) ? '' : 'none';
                    });
                });
            });

            // ----- THEME TOGGLE (light/dark) with localStorage -----
            const themeToggle = document.getElementById('themeToggle');
            const themeIcon = document.getElementById('themeIcon');
            const body = document.body;

            // check saved theme
            const savedTheme = localStorage.getItem('theme') || 'light';
            if (savedTheme === 'dark') {
                body.classList.add('dark-theme');
                themeIcon.classList.remove('fa-sun');
                themeIcon.classList.add('fa-moon');
            } else {
                themeIcon.classList.add('fa-sun');
                themeIcon.classList.remove('fa-moon');
            }

            themeToggle.addEventListener('click', () => {
                if (body.classList.contains('dark-theme')) {
                    body.classList.remove('dark-theme');
                    themeIcon.classList.remove('fa-moon');
                    themeIcon.classList.add('fa-sun');
                    localStorage.setItem('theme', 'light');
                } else {
                    body.classList.add('dark-theme');
                    themeIcon.classList.remove('fa-sun');
                    themeIcon.classList.add('fa-moon');
                    localStorage.setItem('theme', 'dark');
                }
            });
        })();
    </script>

    <!-- keep Laravel manifest check (unchanged) -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</body>
</html>