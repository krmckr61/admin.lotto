<?php

namespace App\Http\Controllers\Live;

use App\Http\Controllers\Controller;

class LiveController extends Controller {

    public function index()
    {
        return view('Live.index');
    }

}