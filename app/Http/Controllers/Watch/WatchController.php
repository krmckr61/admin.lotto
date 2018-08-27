<?php

namespace App\Http\Controllers\Watch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Client;

class WatchController extends Controller
{

    public function index()
    {
        return view('Watch.index');
    }

}