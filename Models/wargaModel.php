<?php

namespace App\Models;

use CodeIgniter\Model;

class wargaModel extends Model
{
    protected $table = 'warga';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['nik','nama','kelamin','alamat','no_rumah','status'];

    public function getWarga($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}