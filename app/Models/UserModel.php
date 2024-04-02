<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'user_nama', 'user_pass', 'user_level'];

    public function get_data($username, $password)
    {
        return $this->db->table('tbl_user')
            ->where(array('user_nama' => $username, 'user_pass' => $password))
            ->get()->getRowArray();
    }

    public function get($id = null)
    {
        $this->db->from('tbl_user');
        if ($id != null) {
            $this->db->where('user_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function getUser()
    {
        return $this->findAll();
    }
    public function updateUser($akunId, $data)
    {
        return $this->db->table('tbl_user')
            ->where('id', $akunId) // Ubah 'user_id' menjadi 'id'
            ->update($data);
    }
}
