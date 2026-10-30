<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StikerController extends Controller
{
    public function index()
    {
        $title = 'Selamat Datang di Sticker PPKD';
        return view('user.index', compact('title'));
    }
}
