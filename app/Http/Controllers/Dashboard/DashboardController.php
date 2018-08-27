<?php
/**
 * Created by PhpStorm.
 * User: krmckr61
 * Date: 28.07.2018
 * Time: 18:55
 */

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller {

    public function index()
    {
        return view('Dashboard.index');
    }

}