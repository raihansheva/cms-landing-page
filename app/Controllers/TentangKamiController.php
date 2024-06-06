<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Headertentangkami;
use App\Models\Riwayat;
use App\Models\Tentangkami;
use CodeIgniter\HTTP\ResponseInterface;

class TentangKamiController extends BaseController
{
    private function create_slug($string)
    {
        $slug = url_title($string, '-', true);
        $tentangkami = new Tentangkami();

        $count = 0;
        $newSlug = $slug;
        while ($tentangkami->where('slug', $newSlug)->countAllResults() > 0) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }
    private function clean_desk($string)
    {
        $clean = strip_tags($string);
        // $Dfitur = new Detailfitur();
        return $clean;
    }
    public function index()
    {
        //
    }

    public function ubahheadtentangkami()
    {
        $head = new Headertentangkami();
        $id = $this->request->getPost('id');
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $judulBannerBaru = $this->request->getPost('judul_banner');
        $deskripsiBaru = $this->request->getPost('deskripsi');
        $desk = $this->clean_desk($deskripsiBaru);

        $dataSebelumnya = $head->find($id);
        $judulBannerSebelumnya = $dataSebelumnya['judul_banner'];
        $deskripsiSebelumnya = $dataSebelumnya['deskripsi'];
        $gambarSebelumnya = $dataSebelumnya['gambar'];

        $rules = [
            'judul_banner' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
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
            // Inisialisasi variabel untuk menyimpan pesan aktivitas
            $aksi = [];

            // Jika pengguna hanya mengubah judul
            if (!empty($judulbannBaru) && $judulBannerBaru !== $judulBannerSebelumnya) {
                $aksi[] = "Mengubah judul banner dari '$judulBannerSebelumnya' menjadi '$judulBannerBaru'";
            }

            // Jika pengguna hanya mengubah deskripsi
            if (!empty($deskripsiBaru) && $deskripsiBaru !== $deskripsiSebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$deskripsiSebelumnya' menjadi '$deskripsiBaru'";
            }

            // Jika pengguna hanya mengubah gambar
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
                $path = 'uploads/' . $newName;
                $aksi[] = "Mengubah gambar dari '$gambarSebelumnya' menjadi '$path'";
            }
            $head->save([
                'id' => $id,
                'judul_banner' => $judulBannerBaru,
                'deskripsi' => $desk,
                'gambar' => $path
            ]);

            foreach ($aksi as $a) {
                $riwayat->save([
                    'id_user' => $userID,
                    'nama' => $nama,
                    'aktivitas' => 'Mengubah',
                    'aksi' => $a,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
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

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $judulBaru = $this->request->getPost('judul');
        $deskripsiBaru = $this->request->getPost('deskripsi');
        $desk = $this->clean_desk($deskripsiBaru);

        // $rules = [
        //     'judul' => 'required',
        //     'deskripsi' => 'required',
        // ];
        // if ($this->validate($rules)) {
        $aboutus->save([
            'judul' => $judulBaru,
            'deskripsi' => $desk,
        ]);
        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Menambahkan',
            'aksi' => 'Menambahkan informasi tentang kami',
            'created_at' => date('Y-m-d H:i:s')
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
        // } else {
        //     session()->setFlashdata('sweetalert', "
        //     <script>
        //         Swal.fire({
        //             title: 'Gagal',
        //             text: 'Form harus di isi',
        //             icon: 'error',
        //             confirmButtonText: 'Ok'
        //         });
        //     </script>
        // ");
        //     return redirect()->back()->to('/tentangkami');
        // }


        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahtentangkami()
    {
        $aboutus = new Tentangkami();
        $id = $this->request->getPost('id');

        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $riwayat = new Riwayat();
        
        $judulbaru = $this->request->getPost('judul');
        $deskbaru = $this->request->getPost('deskripsi');
        $desk = $this->clean_desk($deskbaru);

        $dataSebelumnya = $aboutus->find($id);
        $judulSebelumnya = $dataSebelumnya['judul'];
        $deskripsiSebelumnya = $dataSebelumnya['deskripsi'];

        // $rules = [
        //     'judul' => 'required',
        //     'deskripsi' => 'required',
        // ];
        
        $aksi = [];
        if (!empty($judulbaru) && $judulbaru !== $judulSebelumnya) {
            $aksi[] = "Mengubah judul informasi dari '$judulSebelumnya' menjadi '$judulbaru' di tabel tentang kami";
        }
        if (!empty($deskbaru) && $deskbaru !== $deskripsiSebelumnya) {
            $aksi[] = "Mengubah deskripsi dari '$deskripsiSebelumnya' menjadi '$deskbaru' di tabel tentang kami";
        }
        $aboutus->save([
            'id' => $id,
            'judul' => $judulbaru,
            'deskripsi' => $desk,
        ]);
        foreach ($aksi as $a) {
            $riwayat->save([
                'id_user' => $userID,
                'aktivitas' => 'Mengubah',
                'aksi' => $a,
                'created_at' => date('Y-m-d H:i:s')
            ]);
        }
       
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
        // } else {
        //     session()->setFlashdata('sweetalert', "
        //     <script>
        //         Swal.fire({
        //             title: 'Gagal',
        //             text: 'Form harus di isi',
        //             icon: 'error',
        //             confirmButtonText: 'Ok'
        //         });
        //     </script>
        // ");
        //     return redirect()->back()->to('/tentangkami');
        // }


        // return $this->response->setJSON(['status' => true]);
    }

    public function hapustentangkami()
    {
        $id = $this->request->getPost('id');
        $aboutus = new Tentangkami();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $delete = $aboutus->where('id', $id)->delete();
        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Mengahapus',
            'aksi' => 'Menghapus informasi tentang kami dengan ID : ' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
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
