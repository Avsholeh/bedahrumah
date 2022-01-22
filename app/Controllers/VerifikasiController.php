<?php

namespace App\Controllers;

use App\Models\PermohonanModel;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;

class VerifikasiController extends BaseController
{
    public function index($param = null)
    {
        $builder = $this->db->table('permohonan');
        $builder->select('*');
        $builder->join('data_pengaju', 'data_pengaju.id_permohonan = permohonan.id');
        $builder->join('data_rumah', 'data_rumah.id_permohonan = permohonan.id');

        switch ($param) {
            case "tertinggi":
                $builder->orderBy('data_rumah.skor', 'desc');
                break;
            case "terendah":
                $builder->orderBy('data_rumah.skor', 'asc');
                break;
            default:
                $builder->orderBy('permohonan.tanggal', 'desc');
        }

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
        $idPermohonan = $this->request->getPost('id_permohonan');
        $permohonan = new PermohonanModel();
        $permohonan->update($idPermohonan, [
            'status' => 'SUDAH DIPROSES'
        ]);
        return redirect('verifikasi');
    }

    private function naivebayes($prediction)
    {
        if (gettype($prediction) !== 'array') return 'Array Datatype is required';
        $dataset = new CsvDataset(WRITEPATH . 'uploads/data_bedahrumah.csv',28,true);
        $naivebayes = new NaiveBayes();
        $naivebayes->train($dataset->getSamples(), $dataset->getTargets());
        return $naivebayes->predict($prediction);
    }

}