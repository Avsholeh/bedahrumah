<?php
namespace App\Controllers;

use App\Models\AtributModel;
use App\Models\IndikatorModel;

class SkoringController extends BaseController
{
    public function index()
    {
        $indikator = (new IndikatorModel())->get()->getResultObject();
        $atribut = (new AtributModel())
            ->select('skor_atribut.id, skor_atribut.atribut, skor_atribut.bobot, skor_indikator.indikator')
            ->join('skor_indikator', 'skor_indikator.id = skor_atribut.id_indikator')
            ->get()->getResultObject();
        return view('skoring/index', [
            'title' => 'Skoring',
            'indikator' => $indikator,
            'atribut' => $atribut,
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
}