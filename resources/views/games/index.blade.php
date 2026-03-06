<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Games - Panda Quiz Kids</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
    .games-index-container {
        padding: 40px 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .games-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 40px;
    }

    .games-header h1 {
        font-size: 36px;
        color: #333;
        margin: 0;
    }

    .back-link {
        color: #9B59B6;
        text-decoration: none;
        font-weight: 600;
        transition: color 0.2s;
    }

    .back-link:hover {
        color: #6A1B9A;
    }

    .games-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 20px;
    }

    .game-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        text-decoration: none;
        transition: transform 0.2s, box-shadow 0.2s;
    }

    .game-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    }

    .game-card-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .game-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .game-card-info {
        padding: 20px;
    }

    .game-card-info h3 {
        margin: 0 0 10px 0;
        color: #333;
        font-size: 18px;
    }

    .game-category {
        display: inline-block;
        background: #9B59B6;
        color: white;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        margin-bottom: 10px;
    }

    .game-card-info p {
        margin: 10px 0 0 0;
        color: #666;
        font-size: 14px;
        line-height: 1.4;
    }

    .no-games {
        grid-column: 1 / -1;
        text-align: center;
        padding: 60px 20px;
        color: #999;
        font-size: 16px;
    }

    @media (max-width: 768px) {
        .games-header {
            flex-direction: column;
            gap: 20px;
            align-items: flex-start;
        }

        .games-header h1 {
            font-size: 28px;
        }

        .games-grid {
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        }
    }
    </style>
</head>
<body>
    <div class="games-index-container">
        <div class="games-header">
            <h1>All Games</h1>
            <a href="/" class="back-link">← Back to Home</a>
        </div>

        <div class="games-grid">
            @forelse($games as $game)
                <a href="{{ route('games.play', ['gameId' => $game['id']]) }}" class="game-card">
                    <div class="game-card-image">
                        <img src="{{ $game['image'] }}" alt="{{ $game['title'] }}">
                    </div>
                    <div class="game-card-info">
                        <h3>{{ $game['title'] }}</h3>
                        <span class="game-category">{{ ucfirst($game['category']) }}</span>
                        <p>{{ $game['description'] }}</p>
                    </div>
                </a>
            @empty
                <p class="no-games">No games available at the moment.</p>
            @endforelse
        </div>
    </div>
</body>
</html>
