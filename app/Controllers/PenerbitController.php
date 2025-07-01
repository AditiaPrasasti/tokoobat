<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\PenerbitModel;

class PenerbitController extends BaseController
{
    protected $penerbitModel;

    public function __construct()
    {
        $this->penerbitModel = new PenerbitModel();
        helper('url');
    }

    public function index()
    {
        $data['title'] = 'Data Penerbit';
        $data['penerbits'] = $this->penerbitModel->findAll();
        return view('penerbit/index', $data);
    }

    public function create()
    {
        return view('penerbit/create');
    }

    public function store()
    {
        $this->penerbitModel->save([
            'nama_pb' => $this->request->getPost('nama_pb'),
            'alamat' => $this->request->getPost('alamat'),
            'kota' => $this->request->getPost('kota'),
            'telepon' => $this->request->getPost('telepon'),
        ]);

        return redirect()->to('/penerbit');
    }

    public function edit($id)
    {
        $data['penerbit'] = $this->penerbitModel->find($id);
        return view('penerbit/edit', $data);
    }

    public function update($id)
    {
        $this->penerbitModel->update($id, [
            'nama_pb' => $this->request->getPost('nama_pb'),
            'alamat' => $this->request->getPost('alamat'),
            'kota' => $this->request->getPost('kota'),
            'telepon' => $this->request->getPost('telepon'),
        ]);

        return redirect()->to('/penerbit');
    }

    public function delete($id)
    {
        $this->penerbitModel->delete($id);
        return redirect()->to('/penerbit');
    }
}