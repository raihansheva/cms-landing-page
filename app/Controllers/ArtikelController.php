<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Artikel;
use App\Models\Headerartikel;
use CodeIgniter\HTTP\ResponseInterface;

class ArtikelController extends BaseController
{
    public function index()
    {
        //
    }

    public function tambahartikel()
    {
        $artikel = new Artikel();

        $artikel->save([
            'nama_artikel' => $this->request->getPost('nama_artikel'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahartikel()
    {
        $artikel = new Artikel();
        $id = $this->request->getPost('id');
        $artikel->save([
            'id' => $id,
            'nama_artikel' => $this->request->getPost('nama_artikel'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }
    public function ubahheadertikel()
    {
        $headertikel = new Headerartikel();
        $id = $this->request->getPost('id');
        $headertikel->save([
            'id' => $id,
            'judul_artikel' => $this->request->getPost('judul_artikel'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusartikel()
    {
        $id = $this->request->getPost('id');
        $artikel = new Artikel();
        $delete = $artikel->where('id', $id)->delete();
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }
}
