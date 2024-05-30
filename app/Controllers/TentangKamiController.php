<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Headertentangkami;
use App\Models\Tentangkami;
use CodeIgniter\HTTP\ResponseInterface;

class TentangKamiController extends BaseController
{
    private function create_slug($string)
    {
        $slug = url_title($string, '-' , true);
        $tentangkami = new Tentangkami();

        $count = 0;
        $newSlug = $slug;
        while ($tentangkami->where('slug' , $newSlug)->countAllResults() > 0) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }
    public function index()
    {
        //
    }

    public function ubahheadtentangkami()
    {
        $head = new Headertentangkami();
        $validation = \config\Services::validation();
        $rules = [
            'judul_banner' => 'required',
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
            $id = $this->request->getPost('id');
            $head->save([
                'id' => $id,
                'judul_banner' => $this->request->getPost('judul_banner'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => $path
            ]);
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda mengubah head tentang kami',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back()->to('/tentangkami');
        } else {
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Form harus di isi',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back()->to('/tentangkami');
        }


        // return $this->response->setJSON(['status' => true]);
    }

    public function tambahtentangkami()
    {
        $aboutus = new Tentangkami();
        $validation = \config\Services::validation();
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
        ];
        if ($this->validate($rules)) {
            $aboutus->save([
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ]);
            session()->setFlashdata('sweetalert', "
                    <script>
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Anda menambahkan informasi',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                ");
            return redirect()->back()->to('/tentangkami');
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
            return redirect()->back()->to('/tentangkami');
        }


        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahtentangkami()
    {
        $aboutus = new Tentangkami();
        $id = $this->request->getPost('id');
        $validation = \config\Services::validation();
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
        ];
        if ($this->validate($rules)) {
            $aboutus->save([
                'id' => $id,
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
            ]);
            session()->setFlashdata('sweetalert', "
                    <script>
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Anda mengubah informasi',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                ");
            return redirect()->back()->to('/tentangkami');
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
            return redirect()->back()->to('/tentangkami');
        }


        // return $this->response->setJSON(['status' => true]);
    }

    public function hapustentangkami()
    {
        $id = $this->request->getPost('id');
        $aboutus = new Tentangkami();
        $delete = $aboutus->where('id', $id)->delete();
        session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menghapus informasi',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
        return redirect()->back()->to('/tentangkami');
        // echo json_encode(['status' => TRUE]);

    }
}
