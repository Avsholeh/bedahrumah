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

    public function edit($id)
    {
        $builder = $this->db->table('pengajuan');
        $builder->select('*');
        $builder->join('data_pengaju', 'data_pengaju.id_pengajuan = pengajuan.id');
        $builder->join('data_rumah', 'data_rumah.id_pengajuan = pengajuan.id');
        $builder->where('pengajuan.id', $id);
        $pengajuan = $builder->get()->getFirstRow('object');
        return view('pengajuan/edit', [
            'title' => 'Pengajuan',
            'desc' => 'Form isian Data Pengaju dan Data Rumah',
            'pengajuan' => $pengajuan,
        ]);
    }

    private function validation()
    {
        $inputDataPengaju = [
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

        $inputDataRumah = [
            'pondasi' => 'required',
            'kolom_balok' => 'required',
            'konstruksi_atap' => 'required',
            'pencahayaan' => 'required',
            'ventilasi' => 'required',
            'mck' => 'required',
            'kondisi_mck' => 'required',
            'pembuangan' => 'required',
            'kondisi_pembuangan' => 'required',
            'sumber_air_minum' => 'required',
            'sumber_listrik' => 'required',
            'luas_rumah' => 'required',
            'jumlah_penghuni' => 'required',
            'tinggi_bangunan' => 'required',
            'ruangan_lainnya' => 'required',
            'material_atap' => 'required',
            'kondisi_atap' => 'required',
            'material_dinding' => 'required',
            'kondisi_dinding' => 'required',
            'material_lantai' => 'required',
            'kondisi_lantai' => 'required',
            'luas_lantai' => 'required',
        ];
        return $this->validate(array_merge($inputDataPengaju, $inputDataRumah));
    }

    public function update()
    {

    }

    public function simpan()
    {
        $validation = $this->validation();
        if ($validation) {
            // Proses input data jika form sudah valid.
            $pengajuan = new \App\Models\Pengajuan();
            $pengajuan->insert([
                'id_user' => (int)$this->session->get('user')['id'],
                'tanggal' => date('Y-m-d H:m:s'),
                'status' => 'BELUM DIPROSES',
            ]);

            // data pengaju
            $dataPengaju = new \App\Models\Pengaju();
            $dataPengaju->insert([
                'id_pengajuan' => (int) $pengajuan->getInsertID(),
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

            // data rumah
            $dataRumah = new \App\Models\Rumah();
            $dataRumah->insert([
                'id_pengajuan' => (int) $pengajuan->getInsertID(),
                'pondasi' => $this->request->getPost("pondasi"),
                'kolom_balok' => $this->request->getPost("kolom_balok"),
                'konstruksi_atap' => $this->request->getPost("konstruksi_atap"),
                'pencahayaan' => $this->request->getPost("pencahayaan"),
                'ventilasi' => $this->request->getPost("ventilasi"),
                'mck' => $this->request->getPost("mck"),
                'kondisi_mck' => $this->request->getPost("kondisi_mck"),
                'pembuangan' => $this->request->getPost("pembuangan"),
                'kondisi_pembuangan' => $this->request->getPost("kondisi_pembuangan"),
                'sumber_air_minum' => $this->request->getPost("sumber_air_minum"),
                'sumber_listrik' => $this->request->getPost("sumber_listrik"),
                'luas_rumah' => $this->request->getPost("luas_rumah"),
                'jumlah_penghuni' => $this->request->getPost("jumlah_penghuni"),
                'tinggi_bangunan' => $this->request->getPost("tinggi_bangunan"),
                'ruangan_lainnya' => $this->request->getPost("ruangan_lainnya"),
                'material_atap' => $this->request->getPost("material_atap"),
                'kondisi_atap' => $this->request->getPost("kondisi_atap"),
                'material_dinding' => $this->request->getPost("material_dinding"),
                'kondisi_dinding' => $this->request->getPost("kondisi_dinding"),
                'material_lantai' => $this->request->getPost("material_lantai"),
                'kondisi_lantai' => $this->request->getPost("kondisi_lantai"),
                'luas_lantai' => $this->request->getPost("luas_lantai"),
            ]);

            $dataGambar = new \App\Models\Gambar();
            if ($this->request->getFile('gambar_depan')) {
                $dataGambar->insert([
                    'id_pengajuan' => (int) $pengajuan->getInsertID(),
                    'jenis' => 'BAGIAN DEPAN',
                    'file' => base64_encode($this->request->getFile('gambar_depan'))
                ]);
            }

            if ($this->request->getFile('gambar_samping')) {
                $dataGambar->insert([
                    'id_pengajuan' => (int) $pengajuan->getInsertID(),
                    'jenis' => 'BAGIAN SAMPING',
                    'file' => base64_encode($this->request->getFile('gambar_samping'))
                ]);
            }

            if ($this->request->getFile('gambar_belakang')) {
                $dataGambar->insert([
                    'id_pengajuan' => (int) $pengajuan->getInsertID(),
                    'jenis' => 'BAGIAN BELAKANG',
                    'file' => base64_encode($this->request->getFile('gambar_belakang'))
                ]);
            }

            if ($this->request->getFile('gambar_dalam')) {
                $dataGambar->insert([
                    'id_pengajuan' => (int) $pengajuan->getInsertID(),
                    'jenis' => 'BAGIAN DALAM',
                    'file' => base64_encode($this->request->getFile('gambar_dalam'))
                ]);
            }
            return redirect('verifikasi');
        }

        // Menampilkan error pada form input yang tidak valid.
        return redirect('pengajuan')->withInput()->with('validation', $this->validator);
    }

}