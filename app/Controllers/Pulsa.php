<?php

namespace App\Controllers;

use App\Models\PulsaModel;

class Pulsa extends BaseController
{
    public function index()
    {
        $this->pulsaModel = new PulsaModel();
        $data = [
            'title' => 'Pulsa | Penjualan Pulsa',
            'pulsa' => $this->pulsaModel->getPulsa()
        ];
        return view('pulsa/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'From Buy Pulsa',
            'validation' => \Config\Services::validation()
        ];
        return view('pulsa/create', $data);
    }

    public function save()
    {
        //vaidasi
        if (!$this->validate([
            'code' => [
                'rules' => 'required|trim|is_unique[pulsa.id_pulsa]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!',
                    'is_unique' => '{field} sudah ada!'
                ]
            ],
            'nominal' => [
                'rules' => 'required|trim',
                'errors' => [
                    '{field} tidak boleh kosong!'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/pulsa/create')->withInput()->with('validation', $validation);
        }
        $this->pulsaModel = new PulsaModel();
        $this->pulsaModel->save([
            'id_pulsa' => $this->request->getVar('code'),
            'operator' => $this->request->getVar('operator'),
            'nominal' => $this->request->getVar('nominal'),
            'harga' => $this->request->getVar('harga')
        ]);
        session()->setFlashdata('message', 'Data Berhasil Disimpan!');
        return redirect()->to('/pulsa');
    }

    public function delete($id_pulsa)
    {
        $this->pulsaModel = new PulsaModel();
        $this->pulsaModel->delete($id_pulsa);
        session()->setFlashdata('message', 'Data Berhasil DiHapus!');
        return redirect()->to('/pulsa');
    }

    public function edit($id_pulsa)
    {
        $this->pulsaModel = new PulsaModel();
        $data = [
            'title' => 'Form Edit Pulsa',
            'validation' => \config\Services::validation(),
            'pulsa' => $this->pulsaModel->getPulsa($id_pulsa)
        ];
        return view('/pulsa/edit', $data);
    }

    public function update($id)
    {
        // //vaidasi
        // if (!$this->validate([
        //     'code' => [
        //         'rules' => 'required|trim',
        //         'errors' => [
        //             '{field} tidak boleh kosong!'
        //         ]
        //     ],
        //     'nominal' => [
        //         'rules' => 'required|trim',
        //         'errors' => [
        //             '{field} tidak boleh kosong!'
        //         ]
        //     ],

        // ])) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/pulsa/create')->withInput()->with('validation', $validation);
        // }
        $this->pulsaModel = new PulsaModel();
        $this->pulsaModel->save([
            'id' => $id,
            'id_pulsa' => $this->request->getVar('id_pulsa'),
            'operator' => $this->request->getVar('operator'),
            'nominal' => $this->request->getVar('nominal'),
            'harga' => $this->request->getVar('harga')
        ]);
        session()->setFlashdata('message', 'Data Berhasil DiUpdate!');
        return redirect()->to('/pulsa');
    }
}
