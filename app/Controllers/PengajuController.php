<?php

namespace App\Controllers;

class PengajuController extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('data_pengaju');
        $builder->select('*');
        $pengaju = $builder->get()->getResultObject();

        return view('pengaju/index', [
            'title' => 'Data Pengaju',
            'desc' => 'Data pengaju yang telah terdaftar disistem.',
            'data' => $pengaju
        ]);
    }
}