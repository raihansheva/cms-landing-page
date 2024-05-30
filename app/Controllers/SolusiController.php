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

    private function create_slug($string)
    {
        $slug = url_title($string, '-' , true);
        $solusi = new Solusi();

        $count = 0;
        $newSlug = $slug;
        while ($solusi->where('slug' , $newSlug)->countAllResults() > 0) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }

    public function index()
    {
        //
    }

    public function addsolusi()
    {
        $solusi = new Solusi();
        $validation = \config\Services::validation();
        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            $path = 'uploads/' . $newName;
        }
        // $rules = [
        //     'nama_solusi' => 'required',
        //     'deskripsi' => 'required',
        //     'gambar' => 'required',
        // ];

        // if ($this->validate($rules)) {
        $namasolusi = $this->request->getPost('nama_solusi');
        $deskripsi = $this->request->getPost('deskripsi');
        $slug = $this->create_slug($namasolusi);
        $solusi->save([
            'nama_solusi' => $namasolusi,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
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
        // } else {
        //     session()->setFlashdata('sweetalert', "
        //     <script>
        //         Swal.fire({
        //             title: 'Gagal',
        //             text: 'form harus diisi',
        //             icon: 'error',
        //             confirmButtonText: 'Ok'
        //         });
        //     </script>
        // ");
        //     return redirect()->back()->to('/solusi');
        // }



        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahsolusi()
    {
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
        $namasolusi = $this->request->getPost('nama_solusi');
        $deskripsi = $this->request->getPost('deskripsi');
        $slug = $this->create_slug($namasolusi);
        // dd($slug);
        $solusi->save([
            'id' => $id,
            'nama_solusi' => $namasolusi,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
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

    public function ubahheadersolusi()
    {
        $id = $this->request->getPost('id');
        $headsolusi = new Headersolusi();
        $headsolusi->save([
            'id' => $id,
            'judul_solusi' => $this->request->getPost('judul_solusi'),
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        return redirect()->back()->to('/solusi');
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapussolusi()
    {
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
