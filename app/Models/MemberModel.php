<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = "member";
    //protected $UserTimestamps = TRUE;
    protected $allowedFields = ['nama', 'no_hp', 'id_jenis'];

    public function getMember($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }

    public function getcountMember()
    {
        $queryCount = "SELECT COUNT(id) FROM member";
        return $this->db->query($queryCount)->getRowArray();
    }
}
