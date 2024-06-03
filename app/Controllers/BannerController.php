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

    public function addbanner()
    {
        $banner = new Banner();
        $validation = \config\Services::validation();
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
            'layout'=> 'required',
        ];
        if ($this->validate($rules)) {
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
                'gambar' => $path,
                'layout' => $this->request->getPost('layout')
            ]);
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menambahkan banner',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back()->to('/konten');
        } else {
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Form harus diisi',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back()->to('/konten');
        }

        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahbanner()
    {
        $banner = new Banner();
        $validation = \config\Services::validation();
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
            'layout' => 'required',
        ];
        if ($this->validate($rules)) {
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
                'gambar' => $path,
                'layout' => $this->request->getPost('layout')
            ]);
            session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Anda mengubah banner',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
            return redirect()->back()->to('/banner');
        } else {
            session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Form harus di isi',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
            return redirect()->back()->to('/banner');
        }


        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusbanner()
    {
        $id = $this->request->getPost('id');
        $banner = new Banner();
        $delete = $banner->where('id', $id)->delete();
        session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Anda menghapus banner',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
        return redirect()->back()->to('/banner');;
    }

    public function ubahfooter()
    {
        $id = $this->request->getPost('id');
        $footer = new Footer();
        $validation = \config\Services::validation();
        $rules = [
            'nama_lengkap' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'copyright' => 'required',
            'link_whatsapp' => 'required',
            'link_instagram' => 'required',
        ];
        if ($this->validate($rules)) {
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
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda mengubah footer',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back()->to('/banner');;
        } else {
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Form harus di isi',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back()->to('/banner');;
        }
        
        
    }
}
