<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Game;

class GameController extends Controller {

    public function index()
    {
        $lastGame = Game::getLastGameDetail();

        return view('Game.index', ['lastGame' => $lastGame]);
    }

}