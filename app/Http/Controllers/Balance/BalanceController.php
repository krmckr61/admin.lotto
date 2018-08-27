<?php

namespace App\Http\Controllers\Balance;

use App\Http\Controllers\Controller;
use App\Client;

class BalanceController extends Controller {

    public function index()
    {
        return view('Balance.index', ['clients' => Client::get()]);
    }

}