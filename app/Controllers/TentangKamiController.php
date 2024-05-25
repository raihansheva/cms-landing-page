<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Headertentangkami;
use App\Models\Tentangkami;
use CodeIgniter\HTTP\ResponseInterface;

class TentangKamiController extends BaseController
{
    public function index()
    {
        //
    }

        public function ubahheadtentangkami(){
            $head = new Headertentangkami();

            $image = $this->request->getFile('gambar');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);

                $path = 'uploads/' . $newName;
            }
            $id = $this->request->getPost('id');
            $head->save([
                'id' => $id,
                'judul_banner' => $this->request->getPost('judul_banner'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $path 
            ]);
            return redirect()->back()->to('/tentangkami');
            // return $this->response->setJSON(['status' => true]);
        }

    public function tambahtentangkami()
    {
        $aboutus = new Tentangkami();

        $aboutus->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        return redirect()->back()->to('/tentangkami');
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahtentangkami()
    {
        $aboutus = new Tentangkami();
        $id = $this->request->getPost('id');
        $aboutus->save([
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        return redirect()->back()->to('/tentangkami');
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapustentangkami()
    {
        $id = $this->request->getPost('id');
        $aboutus = new Tentangkami();
        $delete = $aboutus->where('id', $id)->delete();
        return redirect()->back()->to('/tentangkami');
        // echo json_encode(['status' => TRUE]);

    }
}
