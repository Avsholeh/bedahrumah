<?php


namespace App\Controllers;


class Rumah extends BaseController
{
    public function lihat()
    {
        $pengaju = null;
        return view('pengaju/lihat', ['pengaju' => $pengaju]);
    }

    public function tambah()
    {
        $idPengaju = session()->getFlashdata('idPengaju');
        dd($idPengaju);
        return view('rumah/tambah', ['title' => 'Rumah', 'idPengaju' => $idPengaju]);
    }

    public function simpan()
    {

    }

}