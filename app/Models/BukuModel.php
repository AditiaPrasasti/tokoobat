<?php

namespace App\Models;

use CodeIgniter\Model;

class BukuModel extends Model
{
    protected $table            = 'tb_buku';
    protected $primaryKey       = 'buku_id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object'; // Gunakan 'object' jika ingin akses via ->, atau 'array' jika via []
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = [
        'kategori',
        'nm_buku',
        'harga',
        'stok',
        'penerbit_id',
        'pengarang',
        'tahun_terbit'
    ];

    /**
     * Mengambil semua data buku beserta nama penerbit
     *
     * @return array
     */
    public function getBukuWithPenerbit()
    {
        return $this->select('tb_buku.*, tb_penerbit.nama_pb')
                    ->join('tb_penerbit', 'tb_penerbit.penerbit_id = tb_buku.penerbit_id')
                    ->orderBy('tb_buku.nm_buku', 'ASC')
                    ->findAll();
    }

    /**
     * Mengambil satu data buku dengan penerbit berdasarkan ID buku
     *
     * @param int $id
     * @return array|null
     */
    public function getByIdWithPenerbit(int $id)
    {
        return $this->select('tb_buku.*, tb_penerbit.nama_pb')
                    ->join('tb_penerbit', 'tb_penerbit.penerbit_id = tb_buku.penerbit_id')
                    ->where('buku_id', $id)
                    ->first();
    }

    /**
     * Mengambil buku dengan stok habis
     *
     * @return array
     */
    public function getBukuStokHabis()
    {
        return $this->select('tb_buku.*, tb_penerbit.nama_pb')
                    ->join('tb_penerbit', 'tb_penerbit.penerbit_id = tb_buku.penerbit_id')
                    ->where('stok', 10)
                    ->findAll();
                    
    }

    public function getChartData()
    {
        return $this->select('nm_buku, stok')
                    ->orderBy('stok', 'asc')
                    ->findAll();
    }
}
