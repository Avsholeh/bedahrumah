<?php


namespace App\Controllers;


class Pengaju extends BaseController
{
    public function index()
    {
        return view('pengaju/index', ['title' => 'Pengaju']);
    }

}