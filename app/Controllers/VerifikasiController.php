<?php

namespace App\Controllers;

class VerifikasiController extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('permohonan');
        $builder->select('*');
        $builder->join('data_pengaju', 'data_pengaju.id_permohonan = permohonan.id');
        $builder->orderBy('permohonan.tanggal', 'desc');
        $data = $builder->get()->getResultObject();
        return view('verifikasi/index', [
            'title' => 'Verifikasi',
            'desc' => 'Proses verifikasi penerimaan bantuan bedah rumah.',
            'data' => $data
        ]);
    }

    public function verifikasi()
    {
        
    }

}