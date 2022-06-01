<?php

namespace App\Controllers;

use App\Models\MemberModel;

class Member extends BaseController
{
    public function index()
    {
        $this->memberModel = new MemberModel();
        $data = [
            'title' => 'Member | Penjualan Pulsa',
            'member' => $this->memberModel->getMember()
        ];
        return view('member/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'From Add Member',
            'validation' => \Config\Services::validation()
        ];
        return view('member/create', $data);
    }

    public function save()
    {
        //validasi
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!'
                ]
            ],
            'no_hp' => [
                'rules' => 'required|is_unique[member.no_hp]|trim',
                'errors' => [
                    'required' => 'No Hp tidak boleh kosong!',
                    'is_unique' => 'No Hp Yang Anda Masukkan Sudah Terdaftar'
                ]
            ],
            'jenis' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Jenis Pelanggan/Member Belum Dipilih!'
                ]
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/member/create')->withInput()->with('validation', $validation);
        }
        $this->memberModel = new MemberModel();
        $this->memberModel->save([
            'nama' => $this->request->getVar('nama'),
            'no_hp' => $this->request->getVar('no_hp'),
            'id_jenis' => $this->request->getVar('jenis')
        ]);
        session()->setFlashdata('message', 'Data Berhasil Disimpan!');
        return redirect()->to('/member');
    }

    public function delete($id)
    {
        $this->memberModel = new MemberModel();
        $this->memberModel->delete($id);
        session()->setFlashdata('message', 'Data Berhasil DiHapus!');
        return redirect()->to('/member');
    }

    public function edit($id)
    {
        $this->memberModel = new MemberModel();
        $data = [
            'title' => 'Form Edit Member',
            'validation' => \config\Services::validation(),
            'member' => $this->memberModel->getMember($id)
        ];
        return view('/member/edit', $data);
    }
    public function update($id)
    {
        //vaidasi
        // if (!$this->validate([
        //     'nama' => [
        //         'rules' => 'required|trim',
        //         'errors' => [
        //             '{field} tidak boleh kosong!'
        //         ]
        //     ],
        //     'no_hp' => [
        //         'rules' => 'required|is_unique[member.no_hp]|trim',
        //         'error' => [
        //             'required' => '{field} tidak boleh kosong!',
        //             'is_unique' => 'No Hp Yang Anda Masukkan Sudah Terdaftar'
        //         ]
        //     ],
        //     'jenis' => [
        //         'rules' => 'required|trim',
        //         'errors' => [
        //             'Jenis Pelanggan/Member Belum Dipilih!'
        //         ]
        //     ],

        // ])) {
        //     $validation = \Config\Services::validation();
        //     return redirect()->to('/member/edit')->withInput()->with('validation', $validation);
        // }
        $this->memberModel = new MemberModel();
        $this->memberModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama'),
            'no_hp' => $this->request->getVar('no_hp'),
            'id_jenis' => $this->request->getVar('jenis')
        ]);
        session()->setFlashdata('message', 'Data Berhasil DiUpdate!');
        return redirect()->to('/member');
    }
}
