<?php

namespace App\Models;

use CodeIgniter\Model;

class iuranModel extends Model
{
    protected $table = ['iuran'];
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['keterangan','tanggal','bulan','tahun','jumlah','id_warga'];

    public function getiuran($id = false)
    {
        return $this->db->table('iuran')
        ->join('warga', 'warga.id = iuran.warga_id')
        ->get()->getResultArray();
    }
}