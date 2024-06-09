<?php

namespace App\Controllers;

use App\Models\Banner;
use App\Models\Footer;
use App\Models\Riwayat;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

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

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $judulBaru = $this->request->getPost('judul');
        $deskripsiBaru = $this->request->getPost('deskripsi');
        $layoutbaru = $this->request->getPost('layout');
        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
            'layout' => 'required',
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('gambar');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';
        
            $banner->save([
                'judul' => $judulBaru,
                'deskripsi' => $deskripsiBaru,
                'gambar' => $path,
                'layout' => $layoutbaru
            ]);

                $riwayat->save([
                    'id_user' => $userID,
                    'nama' => $nama,
                    'aktivitas' => 'Menambahkan',
                    'aksi' => 'Menambahkan banner',
                    'created_at' => date('Y-m-d H:i:s')
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
            session()->setFlashdata('modal1', [
                'name' => 'exampleModaltambahbanner',
                // 'type' => 'error',
                // 'message' => 'Password lama tidak cocok'
            ]);
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
        $id = $this->request->getPost('id');
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $judulBaru = $this->request->getPost('judul');
        $deskripsiBaru = $this->request->getPost('deskripsi');
        $layoutbaru = $this->request->getPost('layout');

        $dataSebelumnya = $banner->find($id);
        $judulBannerSebelumnya = $dataSebelumnya['judul'];
        $deskripsiSebelumnya = $dataSebelumnya['deskripsi'];
        $layoutSebelumnya = $dataSebelumnya['layout'];
        $gambarSebelumnya = $dataSebelumnya['gambar'];

        $rules = [
            'judul' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
            'layout' => 'required',
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('gambar');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';

            // Inisialisasi variabel untuk menyimpan pesan aktivitas
            $aksi = [];

            // Jika pengguna hanya mengubah judul
            if (!empty($judulBaru) && $judulBaru !== $judulBannerSebelumnya) {
                $aksi[] = "Mengubah judul banner dari '$judulBannerSebelumnya' menjadi '$judulBaru' di tabel banner";
            }

            // Jika pengguna hanya mengubah deskripsi
            if (!empty($deskripsiBaru) && $deskripsiBaru !== $deskripsiSebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$deskripsiSebelumnya' menjadi '$deskripsiBaru' di tabel banner";
            }
            if (!empty($layoutbaru) && $layoutbaru !== $layoutSebelumnya) {
                $aksi[] = "Mengubah layout dari '$$layoutSebelumnya' menjadi '$layoutbaru' di tabel banner";
            }

            // Jika pengguna hanya mengubah gambar
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
                $path = 'uploads/' . $newName;
                $aksi[] = "Mengubah gambar dari '$gambarSebelumnya' menjadi '$path' di tabel banner";
            }

            $banner->save([
                'id' => $id,
                'judul' => $this->request->getPost('judul'),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'gambar' => isset($path) ? $path : 'default.jpg',
                'layout' => $this->request->getPost('layout')
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
                    text: 'Anda mengubah banner',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
            return redirect()->back()->to('/konten');
        } else {
            session()->setFlashdata('modal2', [
                'name' => 'exampleModaleditbanner',
                // 'type' => 'error',
                // 'message' => 'Password lama tidak cocok'
            ]);
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
            return redirect()->back()->to('/konten');
        }


        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusbanner()
    {
        $id = $this->request->getPost('id');
        $banner = new Banner();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $delete = $banner->where('id', $id)->delete();
        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Menghapus',
            'aksi' => 'Menghapus banner dengan ID : ' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
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
        return redirect()->back()->to('/konten');;
    }

    public function ubahfooter()
    {
        $id = $this->request->getPost('id');
        $footer = new Footer();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $nama_lengkapbaru = $this->request->getPost('nama_lengkap');
        $namabaru = $this->request->getPost('nama');
        $emailbaru = $this->request->getPost('email');
        $alamatbaru = $this->request->getPost('alamat');
        $notlpbaru = $this->request->getPost('nomor_telepon');
        $copyrightbaru = $this->request->getPost('hak_cipta');
        $linkWAbaru = $this->request->getPost('link_whatsapp');
        $linkIGbaru = $this->request->getPost('link_instagram');
        // dd($linkIGbaru);

        $dataSebelumnya = $footer->find($id);
        $nama_lengkapSebelumnya = $dataSebelumnya['nama_lengkap'];
        $namaSebelumnya = $dataSebelumnya['nama'];
        $emailSebelumnya = $dataSebelumnya['email'];
        $alamatSebelumnya = $dataSebelumnya['alamat'];
        $notlpSebelumnya = $dataSebelumnya['nomor_telepon'];
        $copyrightSebelumnya = $dataSebelumnya['hak_cipta'];
        $linkWASebelumnya = $dataSebelumnya['link_whatsapp'];
        $linkIGSebelumnya = $dataSebelumnya['link_instagram'];

        $validation = \config\Services::validation();
        $rules = [
            'nama_lengkap' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'hak_cipta' => 'required',
            'link_whatsapp' => 'required',
            'link_instagram' => 'required',
        ];
        if ($this->validate($rules)) {
             // Inisialisasi variabel untuk menyimpan pesan aktivitas
             $aksi = [];

             // Jika pengguna hanya mengubah judul
             if (!empty($nama_lengkapbaru) && $nama_lengkapbaru !== $nama_lengkapSebelumnya) {
                 $aksi[] = "Mengubah nama lengkap dari '$nama_lengkapSebelumnya' menjadi '$nama_lengkapbaru' di tabel kontak_footer";
             }
             // Jika pengguna hanya mengubah deskripsi
             if (!empty($namabaru) && $namabaru !== $namaSebelumnya) {
                 $aksi[] = "Mengubah nama dari '$namaSebelumnya' menjadi '$namabaru' di tabel kontak_footer";
             }
             if (!empty($emailbaru) && $emailbaru !== $emailSebelumnya) {
                 $aksi[] = "Mengubah email dari '$emailSebelumnya' menjadi '$emailbaru' di tabel kontak_footer";
             }
             if (!empty($alamatbaru) && $alamatbaru !== $alamatSebelumnya) {
                 $aksi[] = "Mengubah alamat dari '$alamatSebelumnya' menjadi '$alamatbaru' di tabel kontak_footer";
             }
             if (!empty($notlpbaru) && $notlpbaru !== $notlpSebelumnya) {
                 $aksi[] = "Mengubah nomor telepon dari '$notlpSebelumnya menjadi '$notlpbaru' di tabel kontak_footer";
             }
             if (!empty($copyrightbaru) && $copyrightbaru !== $copyrightSebelumnya) {
                 $aksi[] = "Mengubah copyright dari '$copyrightSebelumnya menjadi '$copyrightbaru' di tabel kontak_footer";
             }
             if (!empty($linkWAbaru) && $linkWAbaru !== $linkWASebelumnya) {
                 $aksi[] = "Mengubah link whatsapp dari '$linkWASebelumnya' menjadi '$linkWAbaru' di tabel kontak_footer";
             }
             if (!empty($linkIGbaru) && $linkIGbaru !== $linkIGSebelumnya) {
                 $aksi[] = "Mengubah link whatsapp dari '$linkIGSebelumnya' menjadi '$linkIGbaru' di tabel kontak_footer";
             }
            $footer->save([
                'id' => $id,
                'nama_lengkap' => $nama_lengkapbaru,
                'nama' => $namabaru,
                'email' => $emailbaru,
                'alamat' => $alamatbaru,
                'nomor_telepon' => $notlpbaru,
                'hak_cipta' => $copyrightbaru,
                'link_whatsapp' => $linkWAbaru,
                'link_instagram' => $linkIGbaru,
            ]);
           
            // if ($aksi) {
                foreach ($aksi as $a) {
                    $riwayat->save([
                        'id_user' => $userID,
                        'nama' => $nama,
                        'aktivitas' => 'Mengubah',
                        'aksi' => $a,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                }
                
            // }
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
            return redirect()->back()->to('/konten');;
        } else {
            session()->setFlashdata('modal3', [
                'name' => 'exampleModaleditfooter',
                // 'type' => 'error',
                // 'message' => 'Password lama tidak cocok'
            ]);
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
            return redirect()->back()->to('/konten');;
        }
    }
}
