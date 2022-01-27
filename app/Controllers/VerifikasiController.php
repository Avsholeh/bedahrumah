<?php

namespace App\Controllers;

use App\Models\PermohonanModel;
use App\Models\SkorModel;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;

class VerifikasiController extends BaseController
{
    public function index($param = null)
    {
        $builder = $this->db->table('permohonan');
        $builder->select('*');
        $builder->join('data_pengaju', 'data_pengaju.id_permohonan = permohonan.id');

//        switch ($param) {
//            case "tertinggi":
//                $builder->orderBy('data_rumah.skor', 'desc');
//                break;
//            case "terendah":
//                $builder->orderBy('data_rumah.skor', 'asc');
//                break;
//            default:
//                $builder->orderBy('permohonan.tanggal', 'desc');
//        }

        $builder->orderBy('permohonan.tanggal', 'desc');
        $permohonans = $builder->get()->getResultObject();

        $skors = (new SkorModel())->select('id_permohonan, sum(skor.bobot) as total_bobot')
            ->groupBy('id_permohonan')
            ->get()->getResultArray();

        return view('verifikasi/index', [
            'title' => 'Verifikasi',
            'desc' => 'Proses verifikasi penerimaan bantuan bedah rumah.',
            'permohonans' => $permohonans,
            'skors' => $skors,
        ]);
    }

    public function verifikasi()
    {
        $idPermohonan = $this->request->getPost('id_permohonan');
        $permohonan = new PermohonanModel();
        $permohonan->update($idPermohonan, [
            'status' => 'SUDAH DIPROSES'
        ]);
        return redirect('verifikasi');
    }
}