<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Game;


class GamesController extends Controller
{
    public function index()
    {
        return view('games_table', ['games' => Game::all()->sortByDesc('date')]);
    }
}
