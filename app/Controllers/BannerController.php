<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Footer;
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

    public function ubahfooter(){
        $id = $this->request->getPost('id');
        $footer = new Footer();

        $footer->save([
            'id' => $id,
            'nama_lengkap' => $this->request->getPost('nama_lengkap'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'alamat' => $this->request->getPost('alamat'),
            'nomor_telepon' => $this->request->getPost('nomor_telepon'),
            'copyright' => $this->request->getPost('copyright'),
            'link_whatsapp' => $this->request->getPost('link_whatsapp'),
            'link_instagram' => $this->request->getPost('link_instagram'),
            
        ]);
        return redirect()->back();

    }
}
