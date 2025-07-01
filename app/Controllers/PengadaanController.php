<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;

class PengadaanController extends BaseController
{
    public function index()
    {
        $bukuModel = new BukuModel();

        // Ambil buku dengan stok kurang dari 20 dan urutkan dari stok paling sedikit
        $data['buku_menipis'] = $bukuModel
            ->where('stok <', 20)
            ->orderBy('stok', 'asc')
            ->getBukuWithPenerbit();

        return view('pengadaan/index', $data);
    }
}
