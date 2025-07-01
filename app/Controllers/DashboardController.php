<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class DashboardController extends BaseController
{
    protected $bukuModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
    }

    public function index()
    {
        // Ambil buku yang stok-nya habis (stok <= 0)
        $stokHabis = $this->bukuModel
            ->select('tb_buku.nm_buku, tb_penerbit.nama_pb')
            ->join('tb_penerbit', 'tb_penerbit.penerbit_id = tb_buku.penerbit_id')
            ->where('stok <=', 0)
            ->asArray()
            ->findAll();

        // Data untuk chart (10 buku dengan stok terendah)
        $chartData = $this->bukuModel
            ->select('nm_buku, stok')
            ->orderBy('stok', 'ASC')
            ->limit(10)
            ->asArray()
            ->findAll();

        return view('dashboard/index', [
            'title' => 'Dashboard',
            'stokHabis' => $stokHabis,
            'chartData' => $chartData,
        ]);
    }
}
