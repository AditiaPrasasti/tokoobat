<?php

namespace App\Models;

use CodeIgniter\Model;

class PenerbitModel extends Model
{
    protected $table            = 'tb_penerbit';
    protected $primaryKey       = 'penerbit_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'nama_pb',
        'alamat',
        'kota',
        'telepon',
    ];

    /**
     * Get all penerbit
     *
     * @return object[]
     */
    public function getAll()
    {
        return $this->orderBy('nama_pb', 'ASC')->findAll();
    }
}