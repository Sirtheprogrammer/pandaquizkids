<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{
    /**
     * Display the game
     */
    public function play(string $gameId)
    {
        $game = Game::where('slug', $gameId)->first();

        if (! $game) {
            abort(404, 'Game not found');
        }

        return view('games.play', ['game' => $game]);
    }

    /**
     * Get all games (for API or listing)
     */
    public function index()
    {
        $games = Game::where('is_active', true)->get();

        // Transform to match the expected format for the view
        $gamesList = [];
        foreach ($games as $game) {
            $gamesList[$game->slug] = [
                'id' => $game->slug,
                'title' => $game->title,
                'category' => $game->category,
                'description' => $game->description,
                'image' => $game->image,
                'difficulty' => $game->difficulty,
            ];
        }

        return view('games.index', ['games' => $gamesList]);
    }
}
