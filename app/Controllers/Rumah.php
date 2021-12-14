<?php

namespace App\Controllers;

class Rumah extends BaseController
{
    public function lihat()
    {
        $pengaju = null;
        return view('rumah/lihat', [
            'title' => 'Data Rumah',
            'desc' => 'Data rumah yang telah terdaftar disistem.'
        ]);
    }
}