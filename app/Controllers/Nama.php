<?php

namespace App\Controllers;

class Nama extends BaseController
{
    public function index()
    {
        return view('template/template');
    }

    public function perkenalan()
    {
        echo "My Name Haris";
        echo "<br>";
        echo "I'm From : Montong";
        echo "<br>";
    }

    public function detail()
    {
        $data = [
            'Title' => 'Latihan CI4',
            'Nama' => 'Wan Kamarul Zaman Haris Munandar',
            'Alamat' => 'Montong',
            'No_Hp' => '082340097260'
        ];
        return view('index', $data);
    }
}
