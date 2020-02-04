<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;

class DispositivosController extends Controller
{
    

    public function index()
    {
       return view('module.dispositivos');

    }


}
