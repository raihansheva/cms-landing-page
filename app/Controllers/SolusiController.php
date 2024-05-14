<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Solusi;
use CodeIgniter\HTTP\ResponseInterface;

class SolusiController extends BaseController
{

    public function __construct() {
        $this->db =\Config\Database::connect();
    }
    public function index()
    {
        //
    }

    public function addsolusi(){
        $solusi = new Solusi();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $solusi->save([
            'nama_solusi' => $this->request->getPost('nama_solusi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path 
        ]);
        echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahsolusi(){
        $solusi = new Solusi();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $id = $this->request->getPost('id');
        $solusi->where('id', $id)->update([
            'nama_solusi' => $this->request->getPost('nama_solusi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path 
        ]);
        echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapussolusi(){
        $id = $this->request->getPost('id');
        $solusi = new Solusi();
        $delete = $solusi->where('id', $id)->delete();
        echo json_encode(['status' => TRUE]);

    }

}
