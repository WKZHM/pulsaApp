<?php

namespace App\Models;

use CodeIgniter\Model;

class PulsaModel extends Model
{
    protected $table = "pulsa";
    //protected $UserTimestamps = TRUE;
    protected $allowedFields = ['id_pulsa', 'operator', 'nominal', 'harga'];

    public function getPulsa($id_pulsa = false)
    {
        if ($id_pulsa == false) {
            return $this->findAll();
        }

        return $this->where(['id_pulsa' => $id_pulsa])->first();
    }

    public function getsaldo()
    {
        $querySUM = "SELECT SUM(nominal) FROM pulsa";
        return $this->db->query($querySUM)->getRowArray();
    }
}
