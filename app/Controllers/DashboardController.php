<?php


namespace App\Controllers;


use App\Models\PermohonanModel;

class DashboardController extends BaseController
{
    public function index()
    {
        $permohonan = new PermohonanModel();
        $jumlahPengaju = $permohonan->countAll();
        $belumVerifikasi = $permohonan->where('status', 'BELUM DIPROSES')->get()->getNumRows();
        $sudahVerifikasi = $permohonan->where('status', 'SUDAH DIPROSES')->get()->getNumRows();
        $lastPermohonan = $permohonan
            ->select('permohonan.tanggal, permohonan.status, users.nama_lengkap')
            ->join('users', 'users.id = permohonan.id_user')
            ->orderBy('permohonan.tanggal', 'desc')->limit(5)->get()->getResultObject();
        $lastVerifikasi = $permohonan
            ->select('permohonan.tanggal, permohonan.status, users.nama_lengkap')
            ->join('users', 'users.id = permohonan.id_user')
            ->where('permohonan.status', 'SUDAH DIPROSES')
            ->orderBy('permohonan.tanggal', 'desc')->limit(5)->get()->getResultObject();

        return view('dashboard/index', [
            'title' => 'Dashboard',
            'jumlahPengaju' => $jumlahPengaju,
            'belumVerifikasi' => $belumVerifikasi,
            'sudahVerifikasi' => $sudahVerifikasi,
            'lastPermohonan' => $lastPermohonan,
            'lastVerifikasi' => $lastVerifikasi,
        ]);
    }
}