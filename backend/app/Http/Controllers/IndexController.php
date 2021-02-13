<?php

namespace App\Http\Controllers;

use Illminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
}