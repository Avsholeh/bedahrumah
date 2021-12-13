<?php


namespace App\Controllers;


class Pengaju extends BaseController
{
    public function index()
    {
        return view('pengaju/index', ['title' => 'Pengaju']);
    }

    public function simpan()
    {
        $validation = $this->validate([
            'nama_lengkap' => 'required',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[8]',
            'password_konfirmasi' => 'required|matches[password]',
        ]);

        $pengaju = new \App\Models\Pengaju();
        $pengaju->insert([
            'nama'=> $this->request->getPost('nama'),
            'no_ktp'=> $this->request->getPost('no_ktp'),
            'no_kk'=> $this->request->getPost('no_kk'),
            'jenis_kelamin'=> $this->request->getPost('jenis_kelamin'),
            'tempat_lahir'=> $this->request->getPost('tempat_lahir'),
            'tgl_lahir'=> $this->request->getPost('tgl_lahir'),
            'alamat'=> $this->request->getPost('alamat'),
            'sektor_pekerjaan'=> $this->request->getPost('sektor_pekerjaan'),
            'penghasilan'=> $this->request->getPost('penghasilan'),
            'pengeluaran'=> $this->request->getPost('pengeluaran'),
            'status_pemilik_tanah'=> $this->request->getPost('status_pemilik_tanah'),
            'bukti_pemilik_tanah'=> $this->request->getPost('bukti_pemilik_tanah'),
            'status_pemilik_rumah'=> $this->request->getPost('status_pemilik_rumah'),
            'aset_rumah'=> $this->request->getPost('aset_rumah'),
            'aset_tanah'=> $this->request->getPost('aset_tanah'),
        ]);

        return redirect('pengaju');
    }

}