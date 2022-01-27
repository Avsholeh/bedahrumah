<?php

namespace App\Controllers;

use App\Models\AtributModel;
use App\Models\GambarModel;
use App\Models\IndikatorModel;
use App\Models\PengajuModel;
use App\Models\PermohonanModel;
use App\Models\RumahModel;
use App\Models\SkorModel;

class PermohonanController extends BaseController
{
    public function index()
    {
        $indikators = (new IndikatorModel())->get()->getResultArray();
        $atribut = (new AtributModel())->get()->getResultArray();
        return view('permohonan/index', [
            'title' => 'Permohonan',
            'indikators' => $indikators,
            'atribut' => $atribut,
        ]);
    }

    public function edit($id)
    {
        $permohonan = (new PermohonanModel())
            ->join('data_pengaju', 'data_pengaju.id_permohonan = permohonan.id')
            ->where('permohonan.id', $id)
            ->get()->getFirstRow('object');

        $indikators = (new IndikatorModel())->get()->getResultArray();
        $atribut = (new AtributModel())->get()->getResultArray();

        $skor = (new SkorModel())->where('id_permohonan', $id)
            ->get()->getResultArray();

        $skors = [];
        foreach ($skor as $s) {
            $skors[strtolower(str_replace(" ", "_", $s["indikator"]))] = $s['atribut'];
        }

        // Get data_gambar
        $builder = $this->db->table('data_gambar');
        $builder->select('*');
        $builder->where('id_permohonan', $id);
        $builderResult = $builder->get()->getResultArray();
        $dataGambar = [];
        foreach ($builderResult as $gambar) $dataGambar[$gambar['jenis']] = $gambar['file'];

        return view('permohonan/edit', [
            'title' => 'Permohonan',
            'indikators' => $indikators,
            'atribut' => $atribut,
            'skors' => $skors,
            'permohonan' => $permohonan,
            'dataGambar' => $dataGambar,
        ]);
    }

    private function validation()
    {
        $inputDataPengaju = [
            'nama' => 'required',
            'no_ktp' => 'required',
            'no_kk' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'penghasilan' => 'required',
            'pengeluaran' => 'required',
            'status_pemilik_tanah' => 'required',
            'bukti_pemilik_tanah' => 'required',
            'status_pemilik_rumah' => 'required',
            'aset_rumah' => 'required',
            'aset_tanah' => 'required',
        ];

        $inputSkor = [];
        $indikators = (new IndikatorModel())
            ->select('indikator')
            ->get()->getResultArray();
        foreach ($indikators as $indikator) {
            $inputSkor[strtolower(str_replace(" ", "_", $indikator["indikator"]))] = 'required';
        }
        return $this->validate(array_merge($inputDataPengaju, $inputSkor));
    }

    public function simpan()
    {
        if ($this->validation()) {
            // Insert into permohonan table.
            $permohonan = new \App\Models\PermohonanModel();
            $permohonan->insert([
                'id_user' => (int)$this->session->get('user')['id'],
                'tanggal' => date('Y-m-d H:m:s'),
                'status' => 'BELUM DIPROSES',
            ]);

            // Insert into data_pengaju table.
            $dataPengaju = new \App\Models\PengajuModel();
            $dataPengaju->insert([
                'id_permohonan' => (int)$permohonan->getInsertID(),
                'nama' => $this->request->getPost('nama'),
                'no_ktp' => $this->request->getPost('no_ktp'),
                'no_kk' => $this->request->getPost('no_kk'),
                'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
                'tempat_lahir' => $this->request->getPost('tempat_lahir'),
                'tgl_lahir' => $this->request->getPost('tgl_lahir'),
                'alamat' => $this->request->getPost('alamat'),
                'penghasilan' => $this->request->getPost('penghasilan'),
                'pengeluaran' => $this->request->getPost('pengeluaran'),
                'status_pemilik_tanah' => $this->request->getPost('status_pemilik_tanah'),
                'bukti_pemilik_tanah' => $this->request->getPost('bukti_pemilik_tanah'),
                'status_pemilik_rumah' => $this->request->getPost('status_pemilik_rumah'),
                'aset_rumah' => $this->request->getPost('aset_rumah'),
                'aset_tanah' => $this->request->getPost('aset_tanah'),
            ]);

            // Insert into skor_data table.
            $indikators = (new IndikatorModel())->select('indikator')
                ->get()->getResultArray();

            $skor = new SkorModel();
            foreach ($indikators as $indikator) {
                $postValue = strtolower(str_replace(" ", "_", $indikator['indikator']));
                $indikatorPost = explode('|', $this->request->getPost($postValue));
                $skor->insert([
                    'id_permohonan' => (int)$permohonan->getInsertID(),
                    'indikator' => $indikator['indikator'],
                    'atribut' => $indikatorPost[1],
                    'bobot' => $indikatorPost[0],
                ]);
            }

            // Insert into data_gambar table.
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
        $idPermohonan = (int)$this->request->getPost('id_permohonan');

        if ($this->validation()) {
            // Proses input data jika form sudah valid.
            $permohonan = new \App\Models\PermohonanModel();
            $permohonan->update(['id' => $idPermohonan], [
                'id_user' => (int)$this->session->get('user')['id'],
                'tanggal' => date('Y-m-d H:m:s'),
                'status' => 'BELUM DIPROSES',
            ]);

            // Update the data_pengaju table.
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
                'penghasilan' => $this->request->getPost('penghasilan'),
                'pengeluaran' => $this->request->getPost('pengeluaran'),
                'status_pemilik_tanah' => $this->request->getPost('status_pemilik_tanah'),
                'bukti_pemilik_tanah' => $this->request->getPost('bukti_pemilik_tanah'),
                'status_pemilik_rumah' => $this->request->getPost('status_pemilik_rumah'),
                'aset_rumah' => $this->request->getPost('aset_rumah'),
                'aset_tanah' => $this->request->getPost('aset_tanah'),
            ]);

            // Update the skor_data table.
            $indikators = (new IndikatorModel())->select('indikator')
                ->get()->getResultArray();
            $skor = new SkorModel();
            foreach ($indikators as $indikator) {
                $postValue = strtolower(str_replace(" ", "_", $indikator['indikator']));
                $indikatorPost = explode('|', $this->request->getPost($postValue));
                $skorId = $skor->where([
                    'id_permohonan' => $idPermohonan,
                    'indikator' => $indikator['indikator'],
                ])->first()['id'];
                $skor->update($skorId, [
                    'atribut' => $indikatorPost[1],
                    'bobot' => $indikatorPost[0],
                ]);
            }

            // Update the data_gambar table.
            $dataGambar = new \App\Models\GambarModel();
            if ($this->request->getFile('gambar_depan')
                && $this->request->getFile('gambar_depan')->getSize()) {

                $dataGambarId = $dataGambar->where([
                    'id_permohonan' => $idPermohonan,
                    'jenis' => 'BAGIAN DEPAN',
                ])->get();

                if ($dataGambarId->getResultArray()) {
                    $dataGambarId = $dataGambarId->getFirstRow()->id;
                    $dataGambar->update($dataGambarId, [
                        'jenis' => 'BAGIAN DEPAN',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('gambar_depan')))
                    ]);
                } else {
                    $dataGambar->insert([
                        'id_permohonan' => $idPermohonan,
                        'jenis' => 'BAGIAN DEPAN',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('gambar_depan')))
                    ]);
                }
            }

            if ($this->request->getFile('gambar_samping')
                && $this->request->getFile('gambar_samping')->getSize()) {

                $dataGambarId = $dataGambar->where([
                    'id_permohonan' => $idPermohonan,
                    'jenis' => 'BAGIAN SAMPING',
                ])->get();

                if ($dataGambarId->getResultArray()) {
                    $dataGambarId = $dataGambarId->getFirstRow()->id;
                    $dataGambar->update($dataGambarId, [
                        'jenis' => 'BAGIAN SAMPING',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('gambar_samping')))
                    ]);
                } else {
                    $dataGambar->insert([
                        'id_permohonan' => $idPermohonan,
                        'jenis' => 'BAGIAN SAMPING',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('gambar_samping')))
                    ]);
                }
            }

            if ($this->request->getFile('gambar_belakang')
                && $this->request->getFile('gambar_belakang')->getSize()) {

                $dataGambarId = $dataGambar->where([
                    'id_permohonan' => $idPermohonan,
                    'jenis' => 'BAGIAN BELAKANG',
                ])->get();

                if ($dataGambarId->getResultArray()) {
                    $dataGambarId = $dataGambarId->getFirstRow()->id;
                    $dataGambar->update($dataGambarId, [
                        'jenis' => 'BAGIAN BELAKANG',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('gambar_belakang')))
                    ]);
                } else {
                    $dataGambar->insert([
                        'id_permohonan' => $idPermohonan,
                        'jenis' => 'BAGIAN BELAKANG',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('gambar_belakang')))
                    ]);
                }
            }

            if ($this->request->getFile('gambar_dalam')
                && $this->request->getFile('gambar_dalam')->getSize()) {

                $dataGambarId = $dataGambar->where([
                    'id_permohonan' => $idPermohonan,
                    'jenis' => 'BAGIAN DALAM',
                ])->get();

                if ($dataGambarId->getResultArray()) {
                    $dataGambarId = $dataGambarId->getFirstRow()->id;
                    $dataGambar->update($dataGambarId, [
                        'jenis' => 'BAGIAN DALAM',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('gambar_dalam')))
                    ]);
                } else {
                    $dataGambar->insert([
                        'id_permohonan' => $idPermohonan,
                        'jenis' => 'BAGIAN DALAM',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('gambar_dalam')))
                    ]);
                }
            }

            if ($this->request->getFile('foto_lantai')
                && $this->request->getFile('foto_lantai')->getSize()) {

                $dataGambarId = $dataGambar->where([
                    'id_permohonan' => $idPermohonan,
                    'jenis' => 'FOTO LANTAI',
                ])->get();

                if ($dataGambarId->getResultArray()) {
                    $dataGambarId = $dataGambarId->getFirstRow()->id;
                    $dataGambar->update($dataGambarId, [
                        'jenis' => 'FOTO LANTAI',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('foto_lantai')))
                    ]);
                } else {
                    $dataGambar->insert([
                        'id_permohonan' => $idPermohonan,
                        'jenis' => 'FOTO LANTAI',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('foto_lantai')))
                    ]);
                }
            }

            if ($this->request->getFile('foto_dinding')
                && $this->request->getFile('foto_dinding')->getSize()) {

                $dataGambarId = $dataGambar->where([
                    'id_permohonan' => $idPermohonan,
                    'jenis' => 'FOTO DINDING',
                ])->get();

                if ($dataGambarId->getResultArray()) {
                    $dataGambarId = $dataGambarId->getFirstRow()->id;
                    $dataGambar->update($dataGambarId, [
                        'jenis' => 'FOTO DINDING',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('foto_dinding')))
                    ]);
                } else {
                    $dataGambar->insert([
                        'id_permohonan' => $idPermohonan,
                        'jenis' => 'FOTO DINDING',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('foto_dinding')))
                    ]);
                }
            }

            if ($this->request->getFile('foto_atap')
                && $this->request->getFile('foto_atap')->getSize()) {

                $dataGambarId = $dataGambar->where([
                    'id_permohonan' => $idPermohonan,
                    'jenis' => 'FOTO ATAP',
                ])->get();

                if ($dataGambarId->getResultArray()) {
                    $dataGambarId = $dataGambarId->getFirstRow()->id;
                    $dataGambar->update($dataGambarId, [
                        'jenis' => 'FOTO ATAP',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('foto_atap')))
                    ]);
                } else {
                    $dataGambar->insert([
                        'id_permohonan' => $idPermohonan,
                        'jenis' => 'FOTO ATAP',
                        'file' => base64_encode(file_get_contents(
                            $this->request->getFile('foto_atap')))
                    ]);
                }
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
        $dataGambar = new GambarModel();
        $skor = new SkorModel();

        $permohonan->delete($id);
        $dataPengaju->where(['id_permohonan' => $id])->delete();
        $dataGambar->where(['id_permohonan' => $id])->delete();
        $skor->where(['id_permohonan' => $id])->delete();

        return redirect('verifikasi');
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

    public function skor($idPermohonan)
    {
        $skors = (new SkorModel())->where('id_permohonan', $idPermohonan)
            ->get()->getResultArray();
        return json_encode($skors);
    }

}