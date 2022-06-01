<?php

namespace App\Controllers;

use App\Models\MemberModel;
use App\Models\PenjualanModel;
use App\Models\PulsaModel;

class Penjualan extends BaseController
{
    protected $penjualanModel;
    public function __construct()
    {

        $this->penjualanModel = new PenjualanModel();
        $this->memberModel = new MemberModel();
        $this->pulsaModel = new PulsaModel();
        $this->db = \Config\Database::connect();
    }

    public function index()
    {
        $data = [
            'title' => 'Penjualan Pulsa',
            'penjualan' => $this->penjualanModel->getPenjualan()
        ];
        return view('penjualan/index', $data);
    }

    public function transaksi()
    {
        $data = [
            'title' => 'Form Add Transaksi',
            'validation' => \Config\Services::validation(),
            'member' => $this->memberModel->getMember(),
            'pulsa' => $this->pulsaModel->getPulsa()
        ];
        return view('penjualan/transaksi', $data);
    }

    public function ambilMember()
    {
        if ($this->request->isAJAX()) {
            $member = $this->request->getVar('member');

            $dataMember = $this->db->query("SELECT * FROM member JOIN jenis WHERE member.id_jenis=jenis.id_jenis AND member.id='$member'")->getResultArray();
            $listdata = "";
            foreach ($dataMember as $row) :
                $listdata .= '<option value="' . $row['id_jenis'] . '">' . $row['jenis_pelanggan'] . '</option>';
            endforeach;

            $msg = [
                'data' => $listdata
            ];
            echo json_encode($msg);
        }
    }

    public function ambilPulsa()
    {
        if ($this->request->isAJAX()) {
            $pulsa = $this->request->getVar('pulsa');

            $dataPulsa = $this->db->query("SELECT * FROM pulsa WHERE id_pulsa='$pulsa'")->getResultArray();
            $listdata = "";
            foreach ($dataPulsa as $row) :
                $listdata .= '<option value="' . $row['harga'] . '">' . $row['harga'] . '</option>';
            endforeach;

            $msg = [
                'data' => $listdata
            ];
            echo json_encode($msg);
        }
    }

    // save transaksi
    public function buy()
    {
        if (!$this->validate([
            'member' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => '{field} tidak boleh kosong!'
                ]
            ],
            'pulsa' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'silahkan pilih pulsa/operator!'
                ]
            ],
            'status' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'silahkan pilih status pembayaran!!'
                ]
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/penjualan/transaksi')->withInput()->with('validation', $validation);
        }
        $this->db->table('penjualan')->insert([
            'tgl_beli' => $this->request->getVar('tgl_transaksi'),
            'id_member' => $this->request->getVar('member'),
            'id_pulsa' => $this->request->getVar('pulsa'),
            'status' => $this->request->getVar('status'),
            'jumlah_bayar' => $this->request->getVar('harga')
        ]);
        session()->setFlashdata('message', 'Transaksi Berhasil Disimpan!');
        return redirect()->to('/penjualan');
    }

    public function delete($id_penjualan)
    {
        $this->db->query("DELETE FROM penjualan WHERE id_penjualan='$id_penjualan'");
        session()->setFlashdata('message', 'Data Berhasil DiHapus!');
        return redirect()->to('/penjualan');
    }
}
