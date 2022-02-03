<?php
namespace App\Controllers;

use App\Models\AtributModel;
use App\Models\IndikatorModel;

class SkoringController extends BaseController
{
    private $indikator;
    private $atribut;

    public function __construct()
    {
        $this->indikator = (new IndikatorModel())->get()->getResultObject();
        $this->atribut = (new AtributModel())
            ->select('skor_atribut.id, skor_atribut.atribut, skor_atribut.bobot, skor_indikator.indikator')
            ->join('skor_indikator', 'skor_indikator.id = skor_atribut.id_indikator')
            ->orderBy('skor_atribut.id_indikator', 'asc')
            ->get()->getResultObject();
    }

    public function index()
    {
        return view('skoring/index', [
            'title' => 'Skoring',
            'indikator' => $this->indikator,
            'atribut' => $this->atribut,
        ]);
    }

    public function indikator()
    {
        $validation = $this->validate([
            'indikator' => 'required',
            'bobot' => 'required',
        ]);

        if ($validation) {
            (new IndikatorModel())->insert([
                'indikator' => $this->request->getPost('indikator'),
                'bobot' => $this->request->getPost('bobot'),
            ]);

            return redirect('skoring')
                ->with('message-type', 'success')
                ->with('message-text', 'Indikator telah berhasil ditambahkan.');
        }

        return redirect('skoring')->withInput()->with('validation', $this->validator);
    }

    public function indikatorEdit($id)
    {
        $indikator = (new IndikatorModel())->find($id);
        return view('skoring/edit', [
            'title' => 'Edit Skoring',
            'indikator' => $this->indikator,
            'atribut' => $this->atribut,
            'edit' => $indikator,
        ]);
    }

    public function indikatorUpdate()
    {
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'indikator' => 'required',
            'bobot' => 'required',
        ]);

        if ($validation) {
            (new IndikatorModel())->update($id, [
                'indikator' => $this->request->getPost('indikator'),
                'bobot' => $this->request->getPost('bobot'),
            ]);
            return redirect('skoring')
                ->with('message-type', 'success')
                ->with('message-text', 'Indikator telah berhasil diperbarui.');
        }
        return redirect('skoring')
            ->with('skoring', 'indikator')
            ->with('message-type', 'danger')
            ->with('message-text', 'Indikator gagal diperbarui.');
    }

    public function indikatorHapus($id)
    {
        (new IndikatorModel())->delete($id);
        return redirect('skoring')
            ->with('skoring', 'indikator')
            ->with('message-type', 'success')
            ->with('message-text', 'Indikator telah berhasil dihapus.');
    }

    public function atribut()
    {
        $validation = $this->validate([
            'id_indikator' => 'required',
            'atribut' => 'required',
            'bobot' => 'required',
        ]);

        if ($validation) {
            (new AtributModel())->insert([
                'id_indikator' => $this->request->getPost('id_indikator'),
                'atribut' => $this->request->getPost('atribut'),
                'bobot' => $this->request->getPost('bobot'),
            ]);

            return redirect('skoring')
                ->with('message-type', 'success')
                ->with('message-text', 'Atribut telah berhasil ditambahkan.');
        }

        return redirect('skoring')->withInput()->with('validation', $this->validator);
    }

    public function atributEdit($id)
    {
        $atribut = (new AtributModel())->find($id);
        return view('skoring/edit', [
            'title' => 'Edit Skoring',
            'indikator' => $this->indikator,
            'atribut' => $this->atribut,
            'edit' => $atribut,
        ]);
    }

    public function atributUpdate()
    {
        $id = $this->request->getPost('id');
        $validation = $this->validate([
            'id_indikator' => 'required',
            'atribut' => 'required',
            'bobot' => 'required',
        ]);

        if ($validation) {
            (new AtributModel())->update($id, [
                'id_indikator' => $this->request->getPost('id_indikator'),
                'atribut' => $this->request->getPost('atribut'),
                'bobot' => $this->request->getPost('bobot'),
            ]);
            return redirect('skoring')
                ->with('skoring', 'atribut')
                ->with('message-type', 'success')
                ->with('message-text', 'Atribut telah berhasil diperbarui.');
        }

        return redirect('skoring')
            ->with('message-type', 'danger')
            ->with('message-text', 'Atribut gagal diperbarui.');
    }

    public function atributHapus($id)
    {
        (new AtributModel())->delete($id);
        return redirect('skoring')
            ->with('skoring', 'atribut')
            ->with('message-type', 'success')
            ->with('message-text', 'Atribut telah berhasil dihapus.');
    }
}