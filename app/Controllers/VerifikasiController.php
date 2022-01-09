<?php

namespace App\Controllers;

use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;

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
        $idPermohonan = $this->request->getPost('id_permohonan');
        
        return redirect('verifikasi');
    }

    public function naivebayes($prediction)
    {
        if (gettype($prediction) !== 'array') return 'Array Datatype is required';
        $dataset = new CsvDataset(WRITEPATH . 'uploads/data_bedahrumah.csv',30,true);
        $naivebayes = new NaiveBayes();
        $naivebayes->train($dataset->getSamples(), $dataset->getTargets());
        return $naivebayes->predict($prediction);
    }

}