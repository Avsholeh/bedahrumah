<?php

namespace App\Controllers;

use App\Models\PengajuModel;

class PengajuController extends BaseController
{
    public function index()
    {
        $pengajus = (new PengajuModel())
            ->get()->getResultObject();

        return view('pengaju/index', [
            'title' => 'Data Pengaju',
            'desc' => 'Data pengaju yang telah terdaftar disistem.',
            'data' => $pengajus
        ]);
    }
}