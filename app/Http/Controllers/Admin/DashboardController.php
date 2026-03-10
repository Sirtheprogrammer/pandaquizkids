<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Game;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $adminUsers = User::where('is_admin', true)->count();
        $totalGames = Game::count();
        $totalCategories = Category::count();

        return view('admin.dashboard', compact(
            'adminUsers',
            'totalGames',
            'totalCategories'
        ));
    }
}
