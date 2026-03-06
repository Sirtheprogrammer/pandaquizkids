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
            /* light theme (default) */
            --bg-body: #FFFBEA;          /* warm creamy */
            --text-primary: #1F2A44;      /* deep navy */
            --text-secondary: #2F3A5A;
            --accent-orange: #E05A2F;
            --accent-light: #FFEAD2;
            --accent-yellow: #FFE893;
            --accent-panel: #FFD985;
            --header-icon-bg: #1F2A44;
            --header-icon-text: #FFDDA9;
            --header-shadow: #0F1A2E;
            --chip-bg: #FFF;
            --chip-border: #1F2A44;
            --chip-shadow: #1F2A44;
            --chip-active-bg: #1F2A44;
            --chip-active-text: #FFE893;
            --card-bg: #FFFFFF;
            --card-border: #1F2A44;
            --card-shadow: #1F2A44;
            --picture-overlay: none;
            --tag-bg: #FFE893;
            --tag-border: #1F2A44;
            --play-bg: #1F2A44;
            --play-text: #FFE893;
            --play-shadow: #0F1A2E;
            --sidebar-bg: #FFA177;        /* peachy */
            --sidebar-border: #1F2A44;
            --sidebar-link-bg: #FFEC9E;
            --sidebar-link-shadow: #1F2A44;
            --footer-bg: #FFD985;
            --footer-border: #1F2A44;
            --footer-text: #1F2A44;
            --menu-btn-bg: #1F2A44;
            --menu-btn-text: #FFE893;
            --overlay-bg: rgba(0,0,0,0.3);
            --icon-color: inherit;
        }

        /* dark theme */
        .dark-theme {
            --bg-body: #1E1E2F;           /* deep blue‑gray */
            --text-primary: #F7F0D6;       /* soft cream */
            --text-secondary: #CBC6B4;
            --accent-orange: #FF8C5A;
            --accent-light: #3A2E28;
            --accent-yellow: #E0B84D;
            --accent-panel: #3A3A4F;
            --header-icon-bg: #F7F0D6;
            --header-icon-text: #1E1E2F;
            --header-shadow: #0B0B15;
            --chip-bg: #2D2D3F;
            --chip-border: #F7F0D6;
            --chip-shadow: #F7F0D6;
            --chip-active-bg: #F7F0D6;
            --chip-active-text: #1E1E2F;
            --card-bg: #2A2A3C;
            --card-border: #F7F0D6;
            --card-shadow: #F7F0D6;
            --tag-bg: #3A3A4F;
            --tag-border: #F7F0D6;
            --play-bg: #F7F0D6;
            --play-text: #1E1E2F;
            --play-shadow: #8A7F66;
            --sidebar-bg: #2C2C40;
            --sidebar-border: #F7F0D6;
            --sidebar-link-bg: #3E3E58;
            --sidebar-link-shadow: #F7F0D6;
            --footer-bg: #2C2C40;
            --footer-border: #F7F0D6;
            --footer-text: #F7F0D6;
            --menu-btn-bg: #F7F0D6;
            --menu-btn-text: #1E1E2F;
            --overlay-bg: rgba(0,0,0,0.6);
            --icon-color: inherit;
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
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .pqk-full {
            width: 100%;
            padding: 1rem 1.2rem 2rem;
        }

        /* ---------- HEADER with hamburger + theme toggle (nowrap fix) ---------- */
        .pqk-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 2rem;
            gap: 0.5rem;                /* reduced gap for tight screens */
            flex-wrap: nowrap;           /* force single line */
        }

        .pqk-brand {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            flex: 1 1 auto;              /* allow shrinking */
            min-width: 0;                 /* enable flex shrink */
        }

        .pqk-brand-icon {
            background-color: var(--header-icon-bg);
            color: var(--header-icon-text);
            width: 48px;
            height: 48px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
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
            font-size: 1.9rem;
            font-weight: 700;
            line-height: 1.1;
            color: var(--text-primary);
            letter-spacing: -0.02em;
            white-space: nowrap;           /* keep title on one line */
            overflow: hidden;
            text-overflow: ellipsis;       /* gracefully truncate if too long */
        }

        .pqk-brand-text span {
            font-size: 1rem;
            font-weight: 600;
            color: var(--accent-orange);
            background-color: var(--accent-light);
            padding: 0.2rem 0.9rem;
            border-radius: 40px;
            display: inline-block;
            margin-top: 4px;
            border: 2px solid var(--text-primary);
            white-space: nowrap;           /* keep span on one line */
        }

        /* header actions: theme toggle + hamburger */
        .pqk-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            flex-shrink: 0;                /* prevent actions from shrinking */
        }

        .pqk-theme-btn {
            background: var(--menu-btn-bg);
            border: 4px solid var(--menu-btn-bg);
            color: var(--menu-btn-text);
            width: 62px;
            height: 62px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            cursor: pointer;
            box-shadow: 0 7px 0 var(--header-shadow);
            transition: all 0.1s ease;
            flex-shrink: 0;
        }

        .pqk-theme-btn:active {
            transform: translateY(5px);
            box-shadow: 0 2px 0 var(--header-shadow);
        }

        .pqk-menu-btn {
            background: var(--menu-btn-bg);
            border: 4px solid var(--menu-btn-bg);
            color: var(--menu-btn-text);
            width: 62px;
            height: 62px;
            border-radius: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            cursor: pointer;
            box-shadow: 0 7px 0 var(--header-shadow);
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
            background: var(--menu-btn-bg);
            color: var(--menu-btn-text);
            width: 44px;
            height: 44px;
            border-radius: 22px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            border: 3px solid var(--sidebar-border);
            cursor: pointer;
            box-shadow: 0 4px 0 var(--header-shadow);
            transition: 0.1s;
        }

        .sidebar-close:active {
            transform: translateY(3px);
            box-shadow: 0 1px 0 var(--header-shadow);
        }

        .sidebar nav {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .sidebar nav a {
            background-color: var(--sidebar-link-bg);
            color: var(--text-primary);
            text-decoration: none;
            font-size: 1.6rem;
            font-weight: 700;
            padding: 1rem 1.2rem;
            border-radius: 50px;
            border: 3px solid var(--sidebar-border);
            box-shadow: 0 5px 0 var(--sidebar-border);
            transition: all 0.1s;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .sidebar nav a i {
            font-size: 1.8rem;
            width: 2rem;
        }

        .sidebar nav a:active {
            transform: translateY(3px);
            box-shadow: 0 2px 0 var(--sidebar-border);
        }

        /* ---------- CATEGORY CHIPS ---------- */
        .pqk-categories {
            display: flex;
            gap: 0.8rem;
            overflow-x: auto;
            padding: 0.5rem 0 1.2rem;
            margin-bottom: 1rem;
            -webkit-overflow-scrolling: touch;
        }

        .pqk-chip {
            background-color: var(--chip-bg);
            border: 3px solid var(--chip-border);
            color: var(--text-primary);
            font-weight: 700;
            font-size: 1.1rem;
            padding: 0.8rem 1.5rem;
            border-radius: 60px;
            box-shadow: 0 5px 0 var(--chip-shadow);
            cursor: pointer;
            white-space: nowrap;
            transition: all 0.1s ease;
            flex-shrink: 0;
        }

        .pqk-chip i {
            margin-right: 6px;
        }

        .pqk-chip:active {
            transform: translateY(4px);
            box-shadow: 0 1px 0 var(--chip-shadow);
        }

        .pqk-chip--active {
            background-color: var(--chip-active-bg);
            color: var(--chip-active-text);
            border-color: var(--chip-border);
            box-shadow: 0 5px 0 var(--chip-shadow);
        }

        /* ---------- GAME GRID (full width) ---------- */
        .pqk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 1.5rem 0 2rem;
        }

        .pqk-game {
            background-color: var(--card-bg);
            border: 4px solid var(--card-border);
            border-radius: 32px;
            box-shadow: 0 10px 0 var(--card-shadow);
            overflow: hidden;
            transition: all 0.15s ease;
            display: flex;
            flex-direction: column;
        }

        .pqk-game:hover {
            transform: scale(1.01) translateY(-4px);
            box-shadow: 0 14px 0 var(--card-shadow);
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
        .pqk-game[data-category="puzzle"] .pqk-game-picture { background-color: #C7E9FF; }
        .pqk-game[data-category="coloring"] .pqk-game-picture { background-color: #FFCFB6; }
        .pqk-game[data-category="brain"] .pqk-game-picture { background-color: #C3E6CB; }
        .pqk-game[data-category="memory"] .pqk-game-picture { background-color: #DCD0FF; }
        .pqk-game[data-category="logic"] .pqk-game-picture { background-color: #FBC8D5; }

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
            background-color: var(--tag-bg);
            border: 2px solid var(--tag-border);
            border-radius: 40px;
            padding: 0.3rem 1rem;
            font-size: 0.9rem;
            font-weight: 700;
            display: inline-block;
            width: fit-content;
            box-shadow: 0 3px 0 var(--tag-border);
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
            background-color: var(--play-bg);
            color: var(--play-text);
            border: 3px solid var(--play-bg);
            border-radius: 60px;
            padding: 0.7rem 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 5px 0 var(--play-shadow);
            transition: 0.1s;
            cursor: pointer;
        }

        .pqk-play:active {
            transform: translateY(4px);
            box-shadow: 0 1px 0 var(--play-shadow);
        }

        .pqk-play i {
            font-size: 1.1rem;
        }

        .pqk-deco {
            font-size: 1rem;
            font-weight: 600;
            color: var(--text-primary);
            background: var(--tag-bg);
            padding: 0.3rem 0.9rem;
            border-radius: 30px;
            border: 2px solid var(--tag-border);
        }

        .pqk-deco i {
            margin-right: 4px;
        }

        /* footer note */
        .pqk-footer-note {
            text-align: center;
            color: var(--footer-text);
            font-weight: 600;
            background-color: var(--footer-bg);
            border: 3px solid var(--footer-border);
            border-radius: 60px;
            padding: 0.9rem 1.5rem;
            margin-top: 2rem;
            box-shadow: 0 6px 0 var(--footer-border);
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
            <button class="pqk-chip" data-filter="puzzle" type="button"><i class="fas fa-puzzle-piece"></i> Puzzle</button>
            <button class="pqk-chip" data-filter="coloring" type="button"><i class="fas fa-paint-brush"></i> Coloring</button>
            <button class="pqk-chip" data-filter="brain" type="button"><i class="fas fa-lightbulb"></i> Brainstorm</button>
            <button class="pqk-chip" data-filter="memory" type="button"><i class="fas fa-brain"></i> Memory</button>
            <button class="pqk-chip" data-filter="logic" type="button"><i class="fas fa-calculator"></i> Logic & math</button>
        </nav>

        <!-- game grid (each card has a picture area with images) -->
        <main class="pqk-grid">
            <!-- Puzzle Games (5 games) -->
            <article class="pqk-game" data-category="puzzle">
                <div class="pqk-game-picture"><img src="/images/027b84fad71d408eb0a234f9c2f7f654.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Treasure Hunt Decoder</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-puzzle-piece"></i> Puzzle</span>
                    <p class="pqk-game-text">Solve riddles & unlock hidden treasures step by step.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'treasure-hunt-decoder']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-rotate-left"></i> 3 rounds</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="puzzle">
                <div class="pqk-game-picture"><img src="/images/1cea69166c244bd899decd2488509d4c.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Shape Swapper Quest</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-puzzle-piece"></i> Puzzle</span>
                    <p class="pqk-game-text">Match shapes, slide them into place, complete the picture.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'treasure-hunt-decoder']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-book"></i> 2 levels</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="puzzle">
                <div class="pqk-game-picture"><img src="/images/2d29cc9fc14a4bd5911bcab8a2a9cf06.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Pattern Builder Pro</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-puzzle-piece"></i> Puzzle</span>
                    <p class="pqk-game-text">Complete patterns, spot the missing piece, keep the sequence flowing.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'shape-swapper-quest']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-rotate-left"></i> 4 rounds</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="puzzle">
                <div class="pqk-game-picture"><img src="/images/355b7e3d99ea47d39e376d445b90c037.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Tile Tumbler Master</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-puzzle-piece"></i> Puzzle</span>
                    <p class="pqk-game-text">Flip & match tiles, train memory & spot-the-difference skills.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'pattern-builder-pro']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-arrow-right"></i> 3 steps</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="puzzle">
                <div class="pqk-game-picture"><img src="/images/40d739d6f93f43eb9efeef152d4efa05.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Lost Items Finder</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-puzzle-piece"></i> Puzzle</span>
                    <p class="pqk-game-text">Find missing objects in busy scenes, observation challenge.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'tile-tumbler-master']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-eye"></i> 5 levels</span>
                    </div>
                </div>
            </article>

            <!-- Coloring Games (5 games) -->
            <article class="pqk-game" data-category="coloring">
                <div class="pqk-game-picture"><img src="/images/42675aa0355d4e90bf895483ba41c149.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Rainbow Art Studio</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-palette"></i> Coloring</span>
                    <p class="pqk-game-text">Paint & color amazing creatures, unlock new color palettes.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'lost-items-finder']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-eye"></i> no reading</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="coloring">
                <div class="pqk-game-picture"><img src="/images/4553f4347c2246ec8ba67481c1fbaedb.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Splash Paint Adventure</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-palette"></i> Coloring</span>
                    <p class="pqk-game-text">Drag colors, splash & blend, create beautiful artwork.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'rainbow-art-studio']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-brush"></i> freestyle</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="coloring">
                <div class="pqk-game-picture"><img src="/images/514ac8d0a601421e8a28bc2ec18f64de.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Magic Color Quiz</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-palette"></i> Coloring</span>
                    <p class="pqk-game-text">Answer color questions, mix pigments, create new shades.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'magic-color-quiz']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-palette"></i> 8 colors</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="coloring">
                <div class="pqk-game-picture"><img src="/images/5cad7468048945b2a0cd32ac22f413b2.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Pigment Palace</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-palette"></i> Coloring</span>
                    <p class="pqk-game-text">Design & color fantasy rooms, unlock accessories.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'splash-paint-adventure']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-star"></i> 10 rooms</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="coloring">
                <div class="pqk-game-picture"><img src="/images/6af6bcf3424a4a0b9a5b93346ebe88bc.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Brushstroke Blends</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-palette"></i> Coloring</span>
                    <p class="pqk-game-text">Layer colors, blend smoothly, master the art of painting.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'magic-color-quiz']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-brush"></i> gallery</span>
                    </div>
                </div>
            </article>

            <!-- Brain Games (4 games) -->
            <article class="pqk-game" data-category="brain">
                <div class="pqk-game-picture"><img src="/images/6c2add4dc9054ef783d30d16cd56c336.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Riddle Racers</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-brain"></i> Brainstorm</span>
                    <p class="pqk-game-text">Quick funny riddles, silly answers, laugh & learn challenges.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'pigment-palace']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-hourglass-half"></i> 5 min</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="brain">
                <div class="pqk-game-picture"><img src="/images/6d28b465fd1440aa996c7b4c03d55b25.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">What If Wonderland</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-brain"></i> Brainstorm</span>
                    <p class="pqk-game-text">Imagine wild scenarios, make silly decisions, explore imagination.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'brushstroke-blends']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-lightbulb"></i> endless</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="brain">
                <div class="pqk-game-picture"><img src="/images/6e8212d4e6f54070b7331bf5eccbad74.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Silly Stories Spinner</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-brain"></i> Brainstorm</span>
                    <p class="pqk-game-text">Build weird tales, mix characters & adventures together.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'riddle-racers']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-book"></i> stories</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="brain">
                <div class="pqk-game-picture"><img src="/images/7bf7ab72e8214685baa6707cdbd7142d.png" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Think Fast Challenge</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-brain"></i> Brainstorm</span>
                    <p class="pqk-game-text">Quick questions, snap decisions, test your quick thinking.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'what-if-wonderland']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-bolt"></i> timed</span>
                    </div>
                </div>
            </article>

            <!-- Memory Games (4 games) -->
            <article class="pqk-game" data-category="memory">
                <div class="pqk-game-picture"><img src="/images/8bc0900d81fe449690b88a12f31b9cf6.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Memory Mansion</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-eye"></i> Memory</span>
                    <p class="pqk-game-text">Peek at rooms, remember furniture, spot what moved.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'silly-stories-spinner']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-arrows-rotate"></i> replay</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="memory">
                <div class="pqk-game-picture"><img src="/images/998baa345845479abda3fbf45d29e48f.gif" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Sequence Snapshot</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-eye"></i> Memory</span>
                    <p class="pqk-game-text">Watch sequences flash, remember the order, tap them back.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'think-fast-challenge']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-square"></i> 6 levels</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="memory">
                <div class="pqk-game-picture"><img src="/images/a3c687ded3f14e45b94631c0dfd8c6c8.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Picture Perfect Pairs</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-eye"></i> Memory</span>
                    <p class="pqk-game-text">Match identical pictures, train focus & recognition skills.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'memory-mansion']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-star"></i> trophies</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="memory">
                <div class="pqk-game-picture"><img src="/images/bb30a208eda647b3a8026d5ef18eca78.png" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Watch & Recall</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-eye"></i> Memory</span>
                    <p class="pqk-game-text">Observe carefully, cover up, recall what you saw.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'sequence-snapshot']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-check"></i> 4 rounds</span>
                    </div>
                </div>
            </article>

            <!-- Logic & Math Games (4 games) -->
            <article class="pqk-game" data-category="logic">
                <div class="pqk-game-picture"><img src="/images/c6289d78da9e4e388979eed008326da7.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Number Ninja</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-abacus"></i> Logic & math</span>
                    <p class="pqk-game-text">Simple additions, subtractions, counting in fun ways.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'picture-perfect-pairs']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-chart-simple"></i> 3 steps</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="logic">
                <div class="pqk-game-picture"><img src="/images/cce333d2755645d8a70bd2492c008843.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Pattern Prophecy</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-abacus"></i> Logic & math</span>
                    <p class="pqk-game-text">Spot patterns, predict sequences, grow number sense.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'watch-and-recall']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-arrow-right"></i> progressive</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="logic">
                <div class="pqk-game-picture"><img src="/images/e0639629f2b54d6c886d216b6cac4bbb.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">True or False Factory</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-abacus"></i> Logic & math</span>
                    <p class="pqk-game-text">Decide if statements are right or wrong, test logic skills.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'true-or-false-factory']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-check"></i> 5 levels</span>
                    </div>
                </div>
            </article>

            <article class="pqk-game" data-category="logic">
                <div class="pqk-game-picture"><img src="/images/f7f0049ef49b40f286b11ddb6a430ed7.jpg" alt="game" style="width:100%; height:100%; object-fit:cover;"></div>
                <div class="pqk-game-content">
                    <h2 class="pqk-game-title">Sort & Stack Strategy</h2>
                    <span class="pqk-cat-tag"><i class="fas fa-abacus"></i> Logic & math</span>
                    <p class="pqk-game-text">Sort objects by size, color, or type, organize & match.</p>
                    <div class="pqk-game-footer">
                        <a href="{{ route('games.play', ['gameId' => 'sort-and-stack-strategy']) }}" class="pqk-play"><i class="fas fa-play"></i> Play now</a>
                        <span class="pqk-deco"><i class="fas fa-cube"></i> stacking</span>
                    </div>
                </div>
            </article>
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