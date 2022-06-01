<?php

namespace App\Controllers;

use App\Models\JenisModel;

class Jenis extends BaseController
{
    public function index()
    {
        $this->jenisModel = new JenisModel();
        $data = [
            'title' => 'Jenis | Jenis Pelanggan',
            'jenis' => $this->jenisModel->getJenis()
        ];
        return view('jenis/index', $data);
    }
}
