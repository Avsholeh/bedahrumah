<?php

namespace App\Controllers;

class Seleksi extends BaseController
{
    public function index()
    {
        return view('seleksi/index', [
            'title' => 'Seleksi',
            'desc' => 'Proses seleksi penerimaan bantuan bedah rumah.'
        ]);
    }

}