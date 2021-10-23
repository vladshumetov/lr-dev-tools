<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeComtroller extends Controller
{

    public function index()
    {
        $title = "Главная редактора";
        return view('index', compact('title'));
    }
}
