<?php

namespace App\Controllers;

class Verifikasi extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('pengajuan');
        $builder->select('*');
        $builder->join('data_pengaju', 'data_pengaju.id_pengajuan = pengajuan.id');
        $builder->orderBy('pengajuan.tanggal', 'desc');
        $data = $builder->get()->getResultObject();
        return view('verifikasi/index', [
            'title' => 'Verifikasi',
            'desc' => 'Proses verifikasi penerimaan bantuan bedah rumah.',
            'data' => $data
        ]);
    }

}