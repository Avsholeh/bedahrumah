<?php

namespace App\Controllers;

use App\Models\GambarModel;
use App\Models\PengajuModel;
use App\Models\PermohonanModel;
use App\Models\RumahModel;

class PermohonanController extends BaseController
{
    public function index()
    {
        return view('permohonan/index', ['title' => 'Permohonan']);
    }

    public function edit($id)
    {
        $builder = $this->db->table('permohonan');
        $builder->select('*');
        $builder->join('data_pengaju', 'data_pengaju.id_permohonan = permohonan.id');
        $builder->join('data_rumah', 'data_rumah.id_permohonan = permohonan.id');
        $builder->where('permohonan.id', $id);
        $permohonan = $builder->get()->getFirstRow('object');

        $builder = $this->db->table('data_gambar');
        $builder->select('*');
        $builder->where('id_permohonan', $id);
        $builderResult = $builder->get()->getResultArray();
        $dataGambar = [];
        foreach ($builderResult as $gambar) $dataGambar[$gambar['jenis']] = $gambar['file'];

        return view('permohonan/edit', [
            'title' => 'Permohonan',
            'permohonan' => $permohonan,
            'dataGambar' => $dataGambar,
        ]);
    }

    private function validation()
    {
        $inputDataPengaju = [
            'nama' => 'required',
//            'no_ktp' => 'required|is_unique[data_pengaju.no_ktp,id,{id}]',
            'no_ktp' => 'required',
            'no_kk' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'status_keluarga' => 'required',
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
            'pencahayaan' => 'required',
            'jenis_atap' => 'required',
            'kondisi_atap' => 'required',
            'jenis_dinding' => 'required',
            'kondisi_dinding' => 'required',
            'jenis_lantai' => 'required',
        ];
        return $this->validate(array_merge($inputDataPengaju, $inputDataRumah));
    }

    private function skor($atribut)
    {
        $atributPencahayaan = [
            'Ada' => 3,
            'Tidak Ada' => 7,
        ];

        $atributJenisAtap = [
            'Beton' => 0,
            'Genteng' => 2,
            'Sirap' => 3,
            'Asbes' => 4,
            'Seng' => 5,
            'Rumbia/Daun Kelapa/Daun Aren' => 6
        ];

        $atributKondisiAtap = [
            'Baik' => 1,
            'Sedang' => 3,
            'Buruk' => 6,
        ];

        $atributJenisDinding = [
            'Bata/Batako Plester' => 2,
            'Bata/Batako Ekspose' => 3,
            'Kayu' => 4,
            'Bilik/Bambu' => 5,
            'GRC/Asbes' => 6,
        ];

        $atributKondisiDinding = [
            'Baik' => 1,
            'Sedang' => 3,
            'Buruk' => 6,
        ];

        $atributJenisLantai = [
            'Keramik/Marmer' => 0,
            'Ubin' => 0,
            'Plester' => 1,
            'Kayu' => 2,
            'Bambu' => 3,
            'Tanah' => 4,
        ];

        $atributSektorPekerjaan = [
            'PNS' => 0,
            'BUMN' => 0,
            'TNI / POLRI' => 0,
            'Karyawan Swasta' => 1,
            'Wiraswasta' => 1,
            'Petani' => 1,
            'Nelayan' => 1,
            'Buruh' => 3,
            'Tidak Bekerja' => 3,
        ];

        $atributStatusKeluarga = [
            'Keluarga Utuh' => 3,
            'Keluarga Tidak Utuh' => 7,
        ];

        return $atributPencahayaan[$atribut['pencahayaan']] +
            $atributJenisAtap[$atribut['jenis_atap']] +
            $atributKondisiAtap[$atribut['kondisi_atap']] +
            $atributJenisDinding[$atribut['jenis_dinding']] +
            $atributKondisiDinding[$atribut['kondisi_dinding']] +
            $atributJenisLantai[$atribut['jenis_lantai']] +
            $atributSektorPekerjaan[$atribut['sektor_pekerjaan']] +
            $atributStatusKeluarga[$atribut['status_keluarga']];
    }

    public function gambar($idPermohonan)
    {
        $dataGambar = new GambarModel();
        $results = $dataGambar->where('id_permohonan', $idPermohonan)->get()->getResultArray();
        $gambars = [];
        foreach ($results as $result) {
            array_push($gambars, [
                'jenis' => $result['jenis'],
                'file' => $result['file'],
            ]);
        }

        return json_encode($gambars);
    }

    public function simpan()
    {
        $validation = $this->validation();
        if ($validation) {
            // Proses input data jika form sudah valid.
            $permohonan = new \App\Models\PermohonanModel();
            $permohonan->insert([
                'id_user' => (int)$this->session->get('user')['id'],
                'tanggal' => date('Y-m-d H:m:s'),
                'status' => 'BELUM DIPROSES',
            ]);

            // Data pengaju
            $dataPengaju = new \App\Models\PengajuModel();
            $dataPengaju->insert([
                'id_permohonan' => (int)$permohonan->getInsertID(),
                'nama' => $this->request->getPost('nama'),
                'no_ktp' => $this->request->getPost('no_ktp'),
                'no_kk' => $this->request->getPost('no_kk'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'status_keluarga' => $this->request->getPost('status_keluarga'),
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

            // Data rumah
            $dataRumah = new \App\Models\RumahModel();

            $pencahayaan = $this->request->getPost("pencahayaan");
            $jenisAtap = $this->request->getPost("jenis_atap");
            $kondisiAtap = $this->request->getPost("kondisi_atap");
            $jenisDinding = $this->request->getPost("jenis_dinding");
            $kondisiDinding = $this->request->getPost("kondisi_dinding");
            $jenisLantai = $this->request->getPost("jenis_lantai");
            $sektorPekerjaan = $this->request->getPost("sektor_pekerjaan");
            $statusKeluarga = $this->request->getPost("status_keluarga");

            $totalSkor = $this->skor([
                'pencahayaan' => $pencahayaan,
                'jenis_atap' => $jenisAtap,
                'kondisi_atap' => $kondisiAtap,
                'jenis_dinding' => $jenisDinding,
                'kondisi_dinding' => $kondisiDinding,
                'jenis_lantai' => $jenisLantai,
                'sektor_pekerjaan' => $sektorPekerjaan,
                'status_keluarga' => $statusKeluarga,
            ]);

            $dataRumah->insert([
                'id_permohonan' => (int)$permohonan->getInsertID(),
                'pencahayaan' => $pencahayaan,
                'jenis_atap' => $jenisAtap,
                'kondisi_atap' => $kondisiAtap,
                'jenis_dinding' => $jenisDinding,
                'kondisi_dinding' => $kondisiDinding,
                'jenis_lantai' => $jenisLantai,
                'skor' => $totalSkor,
            ]);

            $dataGambar = new \App\Models\GambarModel();

            try {
                if ($this->request->getFile('gambar_depan')) {
                    $dataGambar->insert([
                        'id_permohonan' => (int)$permohonan->getInsertID(),
                        'jenis' => 'BAGIAN DEPAN',
                        'file' => base64_encode(file_get_contents($this->request->getFile('gambar_depan')))
                    ]);
                }

                if ($this->request->getFile('gambar_samping')) {
                    $dataGambar->insert([
                        'id_permohonan' => (int)$permohonan->getInsertID(),
                        'jenis' => 'BAGIAN SAMPING',
                        'file' => base64_encode(file_get_contents($this->request->getFile('gambar_samping')))
                    ]);
                }

                if ($this->request->getFile('gambar_belakang')) {
                    $dataGambar->insert([
                        'id_permohonan' => (int)$permohonan->getInsertID(),
                        'jenis' => 'BAGIAN BELAKANG',
                        'file' => base64_encode(file_get_contents($this->request->getFile('gambar_belakang')))
                    ]);
                }

                if ($this->request->getFile('gambar_dalam')) {
                    $dataGambar->insert([
                        'id_permohonan' => (int)$permohonan->getInsertID(),
                        'jenis' => 'BAGIAN DALAM',
                        'file' => base64_encode(file_get_contents($this->request->getFile('gambar_dalam')))
                    ]);
                }

                if ($this->request->getFile('foto_lantai')) {
                    $dataGambar->insert([
                        'id_permohonan' => (int)$permohonan->getInsertID(),
                        'jenis' => 'FOTO LANTAI',
                        'file' => base64_encode(file_get_contents($this->request->getFile('foto_lantai')))
                    ]);
                }

                if ($this->request->getFile('foto_dinding')) {
                    $dataGambar->insert([
                        'id_permohonan' => (int)$permohonan->getInsertID(),
                        'jenis' => 'FOTO DINDING',
                        'file' => base64_encode(file_get_contents($this->request->getFile('foto_dinding')))
                    ]);
                }

                if ($this->request->getFile('foto_atap')) {
                    $dataGambar->insert([
                        'id_permohonan' => (int)$permohonan->getInsertID(),
                        'jenis' => 'FOTO ATAP',
                        'file' => base64_encode(file_get_contents($this->request->getFile('foto_atap')))
                    ]);
                }
            } catch (\Exception $e) {
            }

            return redirect('verifikasi')
                ->with('message-type', 'success')
                ->with('message-text', 'Permohonan telah berhasil ditambahkan.');
        }
        return redirect('permohonan')->withInput()->with('validation', $this->validator);
    }

    public function update()
    {
        $validation = $this->validation();
        $idPermohonan = (int)$this->request->getPost('id_permohonan');

        if ($validation) {
            // Proses input data jika form sudah valid.
            $permohonan = new \App\Models\PermohonanModel();
            $permohonan->update(['id' => $idPermohonan], [
                'id_user' => (int)$this->session->get('user')['id'],
                'tanggal' => date('Y-m-d H:m:s'),
                'status' => 'BELUM DIPROSES',
            ]);

            // data pengaju
            $dataPengaju = new \App\Models\PengajuModel();
            $dataPengajuId = $dataPengaju->where(['id_permohonan' => $idPermohonan])->get()->getFirstRow()->id;
            $dataPengaju->update($dataPengajuId, [
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
            $dataRumah = new \App\Models\RumahModel();
            $dataRumahId = $dataRumah->where(['id_permohonan' => $idPermohonan])
                ->get()->getFirstRow()->id;

            $dataRumah->update($dataRumahId, [
                'pencahayaan' => $this->request->getPost("pencahayaan"),
                'jenis_atap' => $this->request->getPost("jenis_atap"),
                'kondisi_atap' => $this->request->getPost("kondisi_atap"),
                'jenis_dinding' => $this->request->getPost("jenis_dinding"),
                'kondisi_dinding' => $this->request->getPost("kondisi_dinding"),
                'jenis_lantai' => $this->request->getPost("jenis_lantai"),
                'skor' => 0,
            ]);

            $dataGambar = new \App\Models\GambarModel();
            $dataGambarId = $dataGambar->where(['id_permohonan' => $idPermohonan])
                ->get()->getFirstRow()->id;

            if ($this->request->getFile('gambar_depan')
                && $this->request->getFile('gambar_depan')->getSize()) {
                $dataGambar->update($dataGambarId, [
                    'jenis' => 'BAGIAN DEPAN',
                    'file' => base64_encode(file_get_contents(
                        $this->request->getFile('gambar_depan')))
                ]);
            }

            if ($this->request->getFile('gambar_samping')
                && $this->request->getFile('gambar_samping')->getSize()) {
                $dataGambar->update($dataGambarId, [
                    'jenis' => 'BAGIAN SAMPING',
                    'file' => base64_encode(file_get_contents(
                        $this->request->getFile('gambar_samping')))
                ]);
            }

            if ($this->request->getFile('gambar_belakang')
                && $this->request->getFile('gambar_belakang')->getSize()) {
                $dataGambar->update($dataGambarId, [
                    'jenis' => 'BAGIAN BELAKANG',
                    'file' => base64_encode(file_get_contents(
                        $this->request->getFile('gambar_belakang')))
                ]);
            }

            if ($this->request->getFile('gambar_dalam')
                && $this->request->getFile('gambar_dalam')->getSize()) {
                $dataGambar->update($dataGambarId, [
                    'jenis' => 'BAGIAN DALAM',
                    'file' => base64_encode(file_get_contents(
                        $this->request->getFile('gambar_dalam')))
                ]);
            }

            if ($this->request->getFile('foto_lantai')
                && $this->request->getFile('foto_lantai')->getSize()) {
                $dataGambar->update($dataGambarId, [
                    'jenis' => 'FOTO LANTAI',
                    'file' => base64_encode(file_get_contents(
                        $this->request->getFile('foto_lantai')))
                ]);
            }

            if ($this->request->getFile('foto_dinding')
                && $this->request->getFile('foto_dinding')->getSize()) {
                $dataGambar->update($dataGambarId, [
                    'jenis' => 'FOTO DINDING',
                    'file' => base64_encode(file_get_contents(
                        $this->request->getFile('foto_dinding')))
                ]);
            }

            if ($this->request->getFile('foto_atap')
                && $this->request->getFile('foto_atap')->getSize()) {
                $dataGambar->update($dataGambarId, [
                    'jenis' => 'FOTO ATAP',
                    'file' => base64_encode(file_get_contents(
                        $this->request->getFile('foto_atap')))
                ]);
            }
            return redirect('verifikasi')
                ->with('message-type', 'success')
                ->with('message-text', 'Permohonan telah berhasil diperbarui.');
        }

        $route = 'permohonan/edit/' . $idPermohonan;
        return redirect()->to(site_url($route))->withInput()->with('validation', $this->validator);
    }

    public function hapus($id)
    {
        $permohonan = new PermohonanModel();
        $dataPengaju = new PengajuModel();
        $dataRumah = new RumahModel();
        $dataGambar = new GambarModel();

        $permohonan->delete($id);
        $dataPengaju->delete(['id_permohonan' => $id]);
        $dataRumah->delete(['id_permohonan' => $id]);
        $dataGambar->delete(['id_permohonan' => $id]);

        return redirect('verifikasi');
    }

}