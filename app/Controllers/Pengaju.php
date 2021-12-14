<?php

namespace App\Controllers;

class Pengaju extends BaseController
{
    public function lihat()
    {
        $pengaju = null;
        return view('pengaju/lihat', [
            'title' => 'Data Pengaju',
            'desc' => 'Data pengaju yang telah terdaftar disistem.'
        ]);
    }
}