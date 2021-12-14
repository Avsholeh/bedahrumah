<?php

namespace App\Controllers;

class Pengajuan extends BaseController
{
    public function index()
    {
        return view('pengajuan/index', [
            'title' => 'Pengajuan',
            'desc' => 'Form isian Data Pengaju dan Data Rumah'
        ]);
    }

    public function simpan()
    {
        $validasiDataPengaju = [
            'nama' => 'required',
            'no_ktp' => 'required|is_unique[data_pengaju.no_ktp,id,{id}]',
            'no_kk' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'sektor_pekerjaan' => 'required',
            'penghasilan' => 'required',
            'pengeluaran' => 'required',
            'status_pemilik_tanah' => 'required',
            'bukti_pemilik_tanah' => 'required',
            'status_pemilik_rumah' => 'required',
            'aset_rumah' => 'required',
            'aset_tanah' => 'required',
        ];

        $validasiDataRumah = [

        ];

        $validation = $this->validate(array_merge($validasiDataPengaju, $validasiDataRumah));

        if ($validation) {
            // Proses input data jika form sudah valid.
            $pengaju = new \App\Models\Pengaju();
            $pengaju->insert([
                'nama' => $this->request->getPost('nama'),
                'no_ktp' => $this->request->getPost('no_ktp'),
                'no_kk' => $this->request->getPost('no_kk'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'alamat' => $this->request->getPost('alamat'),
                'sektor_pekerjaan' => $this->request->getPost('sektor_pekerjaan'),
                'penghasilan' => $this->request->getPost('penghasilan'),
                'pengeluaran' => $this->request->getPost('pengeluaran'),
                'status_pemilik_tanah' => $this->request->getPost('status_pemilik_tanah'),
                'bukti_pemilik_tanah' => $this->request->getPost('bukti_pemilik_tanah'),
                'status_pemilik_rumah' => $this->request->getPost('status_pemilik_rumah'),
                'aset_rumah' => $this->request->getPost('aset_rumah'),
                'aset_tanah' => $this->request->getPost('aset_tanah'),
            ]);
            return json_encode(['info' => 'Berhasil ditambahkan']); //redirect('rumah/tambah');
        }
        // Menampilkan error pada form input yang tidak valid.
        return redirect('pengajuan')->withInput()->with('validation', $this->validator);
    }

}