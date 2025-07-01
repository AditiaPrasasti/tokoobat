<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BukuModel;
use App\Models\PenerbitModel;

class BukuController extends BaseController
{
    protected $bukuModel;
    protected $penerbitModel;

    public function __construct()
    {
        $this->bukuModel = new BukuModel();
        $this->penerbitModel = new PenerbitModel();
    }

    public function index()
    {
        $keyword = $this->request->getGet('keyword');
        $stok    = $this->request->getGet('stok');

        $bukus = $this->bukuModel
            ->select('tb_buku.*, tb_penerbit.nama_pb')
            ->join('tb_penerbit', 'tb_penerbit.penerbit_id = tb_buku.penerbit_id');

        if ($keyword) {
            $bukus->like('nm_buku', $keyword);
        }

        if ($stok === 'habis') {
            $bukus->where('stok', 0);
        } elseif ($stok === 'tersedia') {
            $bukus->where('stok >', 0);
        }

        return view('buku/index', [
            'title'   => 'Data Buku',
            'bukus'   => $bukus->orderBy('nm_buku', 'asc')->findAll(),
            'keyword' => $keyword,
            'stok'    => $stok,
        ]);
    }

    public function create()
    {
        return view('buku/create', [
            'title'     => 'Tambah Buku',
            'penerbits' => $this->penerbitModel->findAll()
        ]);
    }

    public function store()
    {
        $data = $this->request->getPost();

        if (!$this->validate([
            'nm_buku'       => 'required',
            'kategori'      => 'required',
            'harga'         => 'required|numeric',
            'stok'          => 'required|integer',
            'penerbit_id'   => 'required|integer'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal. Harap periksa input Anda.');
        }

        $this->bukuModel->save($data);

        return redirect()->to('/buku')->with('success', 'Data obat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('error', 'Data obat tidak ditemukan.');
        }

        return view('buku/edit', [
            'title'     => 'Edit Buku',
            'buku'      => $buku,
            'penerbits' => $this->penerbitModel->findAll()
        ]);
    }

    public function update($id)
    {
        $data = $this->request->getPost();

        if (!$this->validate([
            'nm_buku'       => 'required',
            'kategori'      => 'required',
            'harga'         => 'required|numeric',
            'stok'          => 'required|integer',
            'penerbit_id'   => 'required|integer'
        ])) {
            return redirect()->back()->withInput()->with('error', 'Validasi gagal. Harap periksa input Anda.');
        }

        if (!$this->bukuModel->find($id)) {
            return redirect()->to('/buku')->with('error', 'Data obat tidak ditemukan.');
        }

        $this->bukuModel->update($id, $data);

        return redirect()->to('/buku')->with('success', 'Data obat berhasil diperbarui.');
    }

    public function delete($id)
    {
        $buku = $this->bukuModel->find($id);

        if (!$buku) {
            return redirect()->to('/buku')->with('error', 'Data obat tidak ditemukan.');
        }

        $this->bukuModel->delete($id);

        return redirect()->to('/buku')->with('success', 'Data obat berhasil dihapus.');
    }
}
