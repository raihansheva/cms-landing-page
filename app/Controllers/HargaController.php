<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Harga;
use CodeIgniter\HTTP\ResponseInterface;

class HargaController extends BaseController
{
    public function index()
    {
        //
    }

    public function tambahharga(){
        $harga = new Harga();
        $harga->save([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'kategori_harga' => $this->request->getPost('kategori_harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'id_solusi' => $this->request->getPost('id_solusi'),
        ]);
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahharga(){
        $id = $this->request->getPost('id');
        $harga = new Harga();
        $harga->save([
            'id' => $id,
            'nama_paket' => $this->request->getPost('nama_paket'),
            'kategori_harga' => $this->request->getPost('kategori_harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'id_solusi' => $this->request->getPost('id_solusi'),
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusharga(){
        $id = $this->request->getPost('id');
        $harga = new Harga();
        $delete = $harga->where('id', $id)->delete();
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }
}
