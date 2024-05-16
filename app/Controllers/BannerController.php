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
    
    public function addbanner(){
        $banner = new Banner();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $banner->save([
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path 
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahbanner(){
        $banner = new Banner();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $id = $this->request->getPost('id');
        $banner->save([
            'id' => $id,
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path 
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusbanner(){
        $id = $this->request->getPost('id');
        $banner = new Banner();
        $delete = $banner->where('id', $id)->delete();
        return redirect()->back();
    }
}
