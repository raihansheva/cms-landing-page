<?php

namespace App\Controllers;

use App\Models\Fitur;
use App\Models\Detailfitur;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FiturController extends BaseController
{
    public function index()
    {
        //
    }

    public function tambahfitur(){
        $fitur = new Fitur();

        $image = $this->request->getFile('icon');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $fitur->save([
            'nama_fitur' => $this->request->getPost('nama_fitur'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'id_solusi' => $this->request->getPost('id_solusi'),
            'icon' => $path 
        ]);
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahfitur(){
        $fitur = new Fitur();

        $image = $this->request->getFile('icon');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        
        $id = $this->request->getPost('id');
        $fitur->save([
            'id' => $id,
            'nama_fitur' => $this->request->getPost('nama_fitur'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'id_solusi' => $this->request->getPost('id_solusi'),
            'icon' => $path 
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusfitur(){
        $id = $this->request->getPost('id');
        $fitur= new Fitur();
        $delete = $fitur->where('id', $id)->delete();
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }

    public function tambahdetailfitur(){
        $fitur = new Detailfitur();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $fitur->save([
            'judul_detail' => $this->request->getPost('judul_detail'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path, 
            'id_fitur' => $this->request->getPost('id_fitur'),
        ]);
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahdetailfitur(){
        $fitur = new Detailfitur();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $id = $this->request->getPost('id');
        $fitur->save([
            'id' => $id,
            'judul_detail' => $this->request->getPost('judul_detail'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path, 
            'id_fitur' => $this->request->getPost('id_fitur'),
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusdetailfitur(){
        $id = $this->request->getPost('id');
        $detailfitur= new Detailfitur();
        $delete = $detailfitur->where('id', $id)->delete();
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }
}
