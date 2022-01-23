<?php


namespace App\Controllers;


use App\Models\PermohonanModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $permohonan = new PermohonanModel();
        $jumlahPengaju = $permohonan->countAll();
        $belumVerifikasi = $permohonan->where('status', 'BELUM DIPROSES')->get()->getFieldCount();
        $sudahVerifikasi = $permohonan->where('status', 'SUDAH DIPROSES')->get()->getFieldCount();
        return view('dashboard/index', [
            'title' => 'Dashboard',
            'jumlahPengaju' => $jumlahPengaju,
            'belumVerifikasi' => $belumVerifikasi,
            'sudahVerifikasi' => $sudahVerifikasi,
        ]);
    }
}