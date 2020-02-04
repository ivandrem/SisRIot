<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class MonitoreoController extends Controller
{
    

    public function index()
    {
       return view('module.monitoreo');

    }


}
