<?php

namespace App\Controllers;

use App\Models\PermohonanModel;
use Phpml\Classification\NaiveBayes;
use Phpml\Dataset\CsvDataset;

class VerifikasiController extends BaseController
{
    public function index()
    {
        $builder = $this->db->table('permohonan');
        $builder->select('*');
        $builder->join('data_pengaju', 'data_pengaju.id_permohonan = permohonan.id');
        $builder->join('data_rumah', 'data_rumah.id_permohonan = permohonan.id');
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
        $builder = $this->db->table('permohonan');
        $builder->select("
        data_pengaju.penghasilan,
        data_pengaju.pengeluaran,
        data_pengaju.status_pemilik_tanah,
        data_pengaju.bukti_pemilik_tanah,
        data_pengaju.status_pemilik_rumah,
        data_pengaju.aset_rumah,
        data_pengaju.aset_tanah,
        data_rumah.pondasi,
        data_rumah.kolom_balok,
        data_rumah.konstruksi_atap,
        data_rumah.pencahayaan,
        data_rumah.ventilasi,
        data_rumah.mck,
        data_rumah.kondisi_mck,
        data_rumah.pembuangan,
        data_rumah.kondisi_pembuangan,
        data_rumah.sumber_air_minum,
        data_rumah.sumber_listrik,
        data_rumah.luas_rumah,
        data_rumah.jumlah_penghuni,
        data_rumah.tinggi_bangunan,
        data_rumah.ruangan_lainnya,
        data_rumah.material_atap,
        data_rumah.kondisi_atap,
        data_rumah.material_dinding,
        data_rumah.kondisi_dinding,
        data_rumah.material_lantai,
        data_rumah.luas_lantai
        ");
        $builder->join('data_rumah', 'data_rumah.id_permohonan = permohonan.id');
        $builder->join('data_pengaju', 'data_pengaju.id_permohonan = permohonan.id');
        $builder->where('permohonan.id', $idPermohonan);
        $data = $builder->get()->getFirstRow('array');
        $result = $this->naivebayes(array_values($data));

        $permohonan = new PermohonanModel();
        $permohonan->update($idPermohonan, [
            'status' => $result
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