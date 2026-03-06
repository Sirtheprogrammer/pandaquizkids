<?php

namespace App\Http\Controllers;

class GameController extends Controller
{
    // Game database with all 22 games
    private function getGames(): array
    {
        return [
            // Puzzle Games (5)
            'treasure-hunt-decoder' => [
                'id' => 'treasure-hunt-decoder',
                'title' => 'Treasure Hunt Decoder',
                'category' => 'puzzle',
                'description' => 'Solve riddles & unlock hidden treasures step by step.',
                'image' => '/images/027b84fad71d408eb0a234f9c2f7f654.jpg',
                'difficulty' => 'easy',
            ],
            'shape-swapper-quest' => [
                'id' => 'shape-swapper-quest',
                'title' => 'Shape Swapper Quest',
                'category' => 'puzzle',
                'description' => 'Match shapes, slide them into place, complete the picture.',
                'image' => '/images/1cea69166c244bd899decd2488509d4c.jpg',
                'difficulty' => 'medium',
            ],
            'pattern-builder-pro' => [
                'id' => 'pattern-builder-pro',
                'title' => 'Pattern Builder Pro',
                'category' => 'puzzle',
                'description' => 'Complete patterns, spot the missing piece, keep the sequence flowing.',
                'image' => '/images/2d29cc9fc14a4bd5911bcab8a2a9cf06.jpg',
                'difficulty' => 'medium',
            ],
            'tile-tumbler-master' => [
                'id' => 'tile-tumbler-master',
                'title' => 'Tile Tumbler Master',
                'category' => 'puzzle',
                'description' => 'Flip & match tiles, train memory & spot-the-difference skills.',
                'image' => '/images/355b7e3d99ea47d39e376d445b90c037.jpg',
                'difficulty' => 'easy',
            ],
            'lost-items-finder' => [
                'id' => 'lost-items-finder',
                'title' => 'Lost Items Finder',
                'category' => 'puzzle',
                'description' => 'Find missing objects in busy scenes, observation challenge.',
                'image' => '/images/40d739d6f93f43eb9efeef152d4efa05.jpg',
                'difficulty' => 'medium',
            ],

            // Coloring Games (5)
            'rainbow-art-studio' => [
                'id' => 'rainbow-art-studio',
                'title' => 'Rainbow Art Studio',
                'category' => 'coloring',
                'description' => 'Paint & color amazing creatures, unlock new color palettes.',
                'image' => '/images/42675aa0355d4e90bf895483ba41c149.jpg',
                'difficulty' => 'easy',
            ],
            'splash-paint-adventure' => [
                'id' => 'splash-paint-adventure',
                'title' => 'Splash Paint Adventure',
                'category' => 'coloring',
                'description' => 'Drag colors, splash & blend, create beautiful artwork.',
                'image' => '/images/4553f4347c2246ec8ba67481c1fbaedb.jpg',
                'difficulty' => 'easy',
            ],
            'magic-color-quiz' => [
                'id' => 'magic-color-quiz',
                'title' => 'Magic Color Quiz',
                'category' => 'coloring',
                'description' => 'Answer color questions, mix pigments, create new shades.',
                'image' => '/images/514ac8d0a601421e8a28bc2ec18f64de.jpg',
                'difficulty' => 'easy',
            ],
            'pigment-palace' => [
                'id' => 'pigment-palace',
                'title' => 'Pigment Palace',
                'category' => 'coloring',
                'description' => 'Design & color fantasy rooms, unlock accessories.',
                'image' => '/images/5cad7468048945b2a0cd32ac22f413b2.jpg',
                'difficulty' => 'medium',
            ],
            'brushstroke-blends' => [
                'id' => 'brushstroke-blends',
                'title' => 'Brushstroke Blends',
                'category' => 'coloring',
                'description' => 'Layer colors, blend smoothly, master the art of painting.',
                'image' => '/images/6af6bcf3424a4a0b9a5b93346ebe88bc.jpg',
                'difficulty' => 'medium',
            ],

            // Brain Games (4)
            'riddle-racers' => [
                'id' => 'riddle-racers',
                'title' => 'Riddle Racers',
                'category' => 'brain',
                'description' => 'Quick funny riddles, silly answers, laugh & learn challenges.',
                'image' => '/images/6c2add4dc9054ef783d30d16cd56c336.jpg',
                'difficulty' => 'easy',
            ],
            'what-if-wonderland' => [
                'id' => 'what-if-wonderland',
                'title' => 'What If Wonderland',
                'category' => 'brain',
                'description' => 'Imagine wild scenarios, make silly decisions, explore imagination.',
                'image' => '/images/6d28b465fd1440aa996c7b4c03d55b25.jpg',
                'difficulty' => 'easy',
            ],
            'silly-stories-spinner' => [
                'id' => 'silly-stories-spinner',
                'title' => 'Silly Stories Spinner',
                'category' => 'brain',
                'description' => 'Build weird tales, mix characters & adventures together.',
                'image' => '/images/6e8212d4e6f54070b7331bf5eccbad74.jpg',
                'difficulty' => 'medium',
            ],
            'think-fast-challenge' => [
                'id' => 'think-fast-challenge',
                'title' => 'Think Fast Challenge',
                'category' => 'brain',
                'description' => 'Quick questions, snap decisions, test your quick thinking.',
                'image' => '/images/7bf7ab72e8214685baa6707cdbd7142d.png',
                'difficulty' => 'hard',
            ],

            // Memory Games (4)
            'memory-mansion' => [
                'id' => 'memory-mansion',
                'title' => 'Memory Mansion',
                'category' => 'memory',
                'description' => 'Peek at rooms, remember furniture, spot what moved.',
                'image' => '/images/8bc0900d81fe449690b88a12f31b9cf6.jpg',
                'difficulty' => 'medium',
            ],
            'sequence-snapshot' => [
                'id' => 'sequence-snapshot',
                'title' => 'Sequence Snapshot',
                'category' => 'memory',
                'description' => 'Watch sequences flash, remember the order, tap them back.',
                'image' => '/images/998baa345845479abda3fbf45d29e48f.gif',
                'difficulty' => 'medium',
            ],
            'picture-perfect-pairs' => [
                'id' => 'picture-perfect-pairs',
                'title' => 'Picture Perfect Pairs',
                'category' => 'memory',
                'description' => 'Match identical pictures, train focus & recognition skills.',
                'image' => '/images/a3c687ded3f14e45b94631c0dfd8c6c8.jpg',
                'difficulty' => 'easy',
            ],
            'watch-and-recall' => [
                'id' => 'watch-and-recall',
                'title' => 'Watch & Recall',
                'category' => 'memory',
                'description' => 'Observe carefully, cover up, recall what you saw.',
                'image' => '/images/bb30a208eda647b3a8026d5ef18eca78.png',
                'difficulty' => 'medium',
            ],

            // Logic & Math Games (4)
            'number-ninja' => [
                'id' => 'number-ninja',
                'title' => 'Number Ninja',
                'category' => 'logic',
                'description' => 'Simple additions, subtractions, counting in fun ways.',
                'image' => '/images/c6289d78da9e4e388979eed008326da7.jpg',
                'difficulty' => 'easy',
            ],
            'pattern-prophecy' => [
                'id' => 'pattern-prophecy',
                'title' => 'Pattern Prophecy',
                'category' => 'logic',
                'description' => 'Spot patterns, predict sequences, grow number sense.',
                'image' => '/images/cce333d2755645d8a70bd2492c008843.jpg',
                'difficulty' => 'medium',
            ],
            'true-or-false-factory' => [
                'id' => 'true-or-false-factory',
                'title' => 'True or False Factory',
                'category' => 'logic',
                'description' => 'Decide if statements are right or wrong, test logic skills.',
                'image' => '/images/e0639629f2b54d6c886d216b6cac4bbb.jpg',
                'difficulty' => 'medium',
            ],
            'sort-and-stack-strategy' => [
                'id' => 'sort-and-stack-strategy',
                'title' => 'Sort & Stack Strategy',
                'category' => 'logic',
                'description' => 'Sort objects by size, color, or type, organize & match.',
                'image' => '/images/f7f0049ef49b40f286b11ddb6a430ed7.jpg',
                'difficulty' => 'hard',
            ],
        ];
    }

    /**
     * Display the game
     */
    public function play(string $gameId)
    {
        $games = $this->getGames();

        if (! isset($games[$gameId])) {
            abort(404, 'Game not found');
        }

        $game = $games[$gameId];

        return view('games.play', ['game' => $game]);
    }

    /**
     * Get all games (for API or listing)
     */
    public function index()
    {
        $games = $this->getGames();

        return view('games.index', ['game' => $games]);
    }
}
