<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        return view('home/index');
    }

    public function login()
    {
        return view('home/login', ['title' => 'Login']);
    }

    public function daftar()
    {
        return view('home/daftar', ['title' => 'Daftar']);

    }
}
