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
        $validation = \config\Services::validation();
        $rules = [
            'nama_artikel' => 'required',
            'deskripsi' => 'required',
        ];
        if ($this->validate($rules)) {
            $artikel->save([
                'nama_artikel' => $this->request->getPost('nama_artikel'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ]);
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menambahkan artikel',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back();
        } else {
            session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'form harus di isi',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
        return redirect()->back();
        }
        
       
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahartikel()
    {
        $artikel = new Artikel();
        $id = $this->request->getPost('id');
        $validation = \config\Services::validation();
        $rules = [
            'nama_artikel' => 'required',
            'deskripsi' => 'required',
        ];
        if ($this->validate($rules)) {
            $artikel->save([
                'id' =>$id,
                'nama_artikel' => $this->request->getPost('nama_artikel'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ]);
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menambahkan artikel',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back();
        } else {
            session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'form harus di isi',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
        return redirect()->back();
        }
        // return $this->response->setJSON(['status' => true]);
    }
    public function ubahheadertikel()
    {
        $headertikel = new Headerartikel();
        $id = $this->request->getPost('id');
        $validation = \config\Services::validation();
        $rules = [
            'judul_artikel' => 'required',
            'deskripsi' => 'required',
        ];
        if ($this->validate($rules)) {
            $headertikel->save([
                'id' => $id,
                'judul_artikel' => $this->request->getPost('judul_artikel'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ]);
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Annda mengubah header artikel',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back();
        } else {
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Form harus di isi ',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back();
        }
        
        
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusartikel()
    {
        $id = $this->request->getPost('id');
        $artikel = new Artikel();
        $delete = $artikel->where('id', $id)->delete();
        session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Annda menghapus artikel',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }
}
