<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisModel extends Model
{
    protected $table = "jenis";
    //protected $UserTimestamps = TRUE;
    protected $allowedFields = ['jenis_pelanggan', 'keterangan'];

    public function getJenis($id_jenis = false)
    {
        if ($id_jenis == false) {
            return $this->findAll();
        }

        return $this->where(['id_jenis' => $id_jenis])->first();
    }
}
