<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Banner;

class BannerController extends BaseController
{
    public function index()
    {
        //
    }
    
    public function add(){
        $banner = new Banner();

        $image = $this->request->getFile('gambar');
        $newName = $image->getRandomName();
        $path = 'defalut.jpg';
        // if ($image->isValid() && !$image->hasMoved()) {
        //     $newName = $image->getRandomName();
        //     $image->move(ROOTPATH . 'public/uploads', $newName);

        //     $path = 'uploads/' . $newName;
        // }
        $banner->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $newName 
        ]);
        echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }
}
