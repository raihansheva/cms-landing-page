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
        $banner->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ]);
        echo json_encode(['status' => TRUE]);
    }
}
