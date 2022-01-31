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
            'title' => 'Pengaju',
            'data' => $pengajus
        ]);
    }
}