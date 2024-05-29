<?php

namespace App\Controllers;

use App\Models\Solusi;
use App\Models\Headersolusi;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use RealRashid\SweetAlert\Facades\Alert;

class SolusiController extends BaseController
{

    // public function __construct() {
    //     $this->db =\Config\Database::connect();
    // }
    public function index()
    {
        //
    }

    public function addsolusi(){
        $solusi = new Solusi();
        $validation = \config\Services::validation();
        $rules = [
            'nama_solusi' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required',
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
            
            $solusi->save([
                'nama_solusi' => $this->request->getPost('nama_solusi'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $path 
            ]);
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menambahkan solusi',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back()->to('/solusi');
        } else {
            session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'form harus diisi',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
        return redirect()->back()->to('/solusi');
        }
        

       
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
        $solusi->save([
            'id' => $id,
            'nama_solusi' => $this->request->getPost('nama_solusi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path 
        ]);
        session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Annda mengubah solusi',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
        
        return redirect()->back()->to('/solusi');
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahheadersolusi(){
        $id = $this->request->getPost('id');
        $headsolusi = new Headersolusi();
        $headsolusi->save([
            'id'=> $id,
            'judul_solusi' => $this->request->getPost('judul_solusi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        return redirect()->back()->to('/solusi');
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapussolusi(){
        $id = $this->request->getPost('id');
        $solusi = new Solusi();
        $delete = $solusi->where('id', $id)->delete();
        session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Anda mengahapus solusi',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
        return redirect()->back()->to('/solusi');
    }

}
