<?php

namespace App\Controllers;
use App\Models\PermohonanModel;

class LaporanController extends BaseController
{
    public function index()
    {
        return view('laporan/index', [
            'title' => 'Laporan',
        ]);
    }

    public function proses()
    {
        $dariTanggal = $this->request->getVar('dari_tanggal');
        $sampaiTanggal = $this->request->getVar('sampai_tanggal');
        $status = $this->request->getVar('status');
        $jumlahData = $this->request->getVar('jumlah_data');

        $permohonans = (new PermohonanModel())
            ->join('pengaju', 'pengaju.id_permohonan = permohonan.id')
            ->where('permohonan.tanggal >=', $dariTanggal)
            ->where('permohonan.tanggal <=', $sampaiTanggal);

        if ($status) {
            $permohonans = $permohonans->where('permohonan.status', $status);
        }

        if ($jumlahData) {
            $permohonans = $permohonans->limit($jumlahData);
        }

        return view('laporan/index', [
            'title' => 'Laporan',
            'permohonans' => $jumlahData ? $permohonans->paginate($jumlahData) : $permohonans->paginate(10),
            'dariTanggal' => $dariTanggal,
            'sampaiTanggal' => $sampaiTanggal,
            'status' => $status,
            'countPermohonan' => $jumlahData ? $jumlahData : $permohonans->countAll(),
            'jumlahData' => $jumlahData,
            'pager' => $permohonans->pager,
        ]);
    }

    public function cetak()
    {
        $dariTanggal = $this->request->getGet('dari_tanggal');
        $sampaiTanggal = $this->request->getGet('sampai_tanggal');
        $status = $this->request->getGet('status');
        $jumlahData = $this->request->getGet('jumlah_data');

        $permohonans = (new PermohonanModel())
            ->join('pengaju', 'pengaju.id_permohonan = permohonan.id')
            ->where('permohonan.tanggal >=', $dariTanggal)
            ->where('permohonan.tanggal <=', $sampaiTanggal);

        if ($status) $permohonans = $permohonans->where('permohonan.status', $status);
        if ($jumlahData) $permohonans = $permohonans->limit($jumlahData);

//        return view('laporan/cetak', [
//            'permohonans' => $permohonans->get()->getResultArray()
//        ]);

        header('Content-type: application/pdf');
        header('Content-Disposition: inline; filename=doc.pdf');
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(view('laporan/cetak', [
            'permohonans' => $permohonans->get()->getResultArray()
        ]));
        $mpdf->Output($dariTanggal . '.pdf', \Mpdf\Output\Destination::DOWNLOAD);
    }
}