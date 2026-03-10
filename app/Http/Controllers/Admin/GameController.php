<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index()
    {
        $games = Game::all();

        return view('admin.games.index', ['games' => $games]);
    }

    public function create()
    {
        $categories = Category::all();

        return view('admin.games.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $categories = Category::pluck('slug')->toArray();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'levels' => 'required|integer|min:1|max:100',
            'difficulty' => 'required|in:easy,medium,hard',
            'color' => 'required|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'category' => 'nullable|in:'.implode(',', $categories),
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = str($validated['title'])->slug();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = '/images/'.$imageName;
        }

        Game::create($validated);

        return redirect()->route('admin.games.index')->with('success', 'Game created successfully.');
    }

    public function edit(Game $game)
    {
        $categories = Category::all();

        return view('admin.games.edit', ['game' => $game, 'categories' => $categories]);
    }

    public function update(Request $request, Game $game)
    {
        $categories = Category::pluck('slug')->toArray();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'levels' => 'required|integer|min:1|max:100',
            'difficulty' => 'required|in:easy,medium,hard',
            'color' => 'required|string',
            'icon' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'category' => 'nullable|in:'.implode(',', $categories),
            'is_active' => 'boolean',
        ]);

        $validated['slug'] = str($validated['title'])->slug();

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $validated['image'] = '/images/'.$imageName;
        }

        $game->update($validated);

        return redirect()->route('admin.games.index')->with('success', 'Game updated successfully.');
    }

    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('admin.games.index')->with('success', 'Game deleted successfully.');
    }
}
