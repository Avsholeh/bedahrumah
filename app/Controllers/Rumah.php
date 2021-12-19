<?php

namespace App\Controllers;

class Rumah extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('data_rumah');
        $builder->select('data_rumah.*, data_pengaju.nama');
        $builder->join('data_pengaju', 'data_pengaju.id_pengajuan = data_rumah.id_pengajuan');
        $rumah = $builder->get()->getResultObject();

        return view('rumah/index', [
            'title' => 'Data Rumah',
            'desc' => 'Data rumah yang telah terdaftar disistem.',
            'data' => $rumah
        ]);
    }
}