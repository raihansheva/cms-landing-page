<?php

namespace App\Controllers;

use App\Models\Artikel;
use App\Models\Riwayat;
use App\Models\Headerartikel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ArtikelController extends BaseController
{
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

    public function tambahartikel()
    {
        $artikel = new Artikel();
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $namaBaru = $this->request->getPost('nama_artikel');
        $deskripsiBaru = $this->request->getPost('deskripsi');
        $desk = $this->clean_desk($deskripsiBaru);

        $rules = [
            'nama_artikel' => 'required',
            'deskripsi' => 'required',
        ];
        if ($this->validate($rules)) {

            $artikel->save([
                'nama_artikel' => $namaBaru,
                'deskripsi' => $desk,
            ]);

            $riwayat->save([
                'id_user' => $userID,
                'aktivitas' => 'Menambahkan',
                'aksi' => 'Menambahkan home artikel',
                'created_at' => date('Y-m-d H:i:s')
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

        $session = session();
        $userID = $session->get('id');
        $riwayat = new Riwayat();

        $namabaru = $this->request->getPost('judul');
        $deskbaru = $this->request->getPost('deskripsi');
        $desk = $this->clean_desk($deskbaru);

        $dataSebelumnya = $artikel->find($id);
        $namaSebelumnya = $dataSebelumnya['nama_artikel'];
        $deskripsiSebelumnya = $dataSebelumnya['deskripsi'];

        $rules = [
            'nama_artikel' => 'required',
            'deskripsi' => 'required',
        ];
        if ($this->validate($rules)) {

            $aksi = [];
            $artikel->save([
                'id' => $id,
                'nama_artikel' => $namabaru,
                'deskripsi' => $desk,
            ]);

            // Jika pengguna hanya mengubah judul
            if (!empty($namabaru) && $namabaru !== $namaSebelumnya) {
                $aksi[] = "Mengubah nama lengkap dari '$namaSebelumnya' menjadi '$namabaru' di tabel artikel";
            }
            // Jika pengguna hanya mengubah deskripsi
            if (!empty($deskbaru) && $deskbaru !== $deskripsiSebelumnya) {
                $aksi[] = "Mengubah nama dari '$deskripsiSebelumnya' menjadi '$deskbaru' di tabel artikel";
            }
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

        $session = session();
        $userID = $session->get('id');
        $riwayat = new Riwayat();

        $judulbaru = $this->request->getPost('judul_artikel');
        $deskbaru = $this->request->getPost('deskripsi');
        $desk = $this->clean_desk($deskbaru);

        $dataSebelumnya = $headertikel->find($id);
        $namaSebelumnya = $dataSebelumnya['judul_artikel'];
        $deskripsiSebelumnya = $dataSebelumnya['deskripsi'];
        // $rules = [
        //     'judul_artikel' => 'required',
        //     'deskripsi' => 'required',
        // ];
        // if ($this->validate($rules)) {
            $aksi = [];
            $headertikel->save([
                'id' => $id,
                'judul_artikel' => $judulbaru,
                'deskripsi' => $desk,
            ]);

            // Jika pengguna hanya mengubah judul
            if (!empty($judulbaru) && $judulbaru !== $namaSebelumnya) {
                $aksi[] = "Mengubah judul artikel dari '$namaSebelumnya' menjadi '$judulbaru' di tabel headartikel";
            }
            // Jika pengguna hanya mengubah deskripsi
            if (!empty($deskbaru) && $deskbaru !== $deskripsiSebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$deskripsiSebelumnya' menjadi '$deskbaru' di tabel headartikel";
            }

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
                        text: 'Annda mengubah header artikel',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back();
        // } else {
        //     session()->setFlashdata('sweetalert', "
        //         <script>
        //             Swal.fire({
        //                 title: 'Gagal',
        //                 text: 'Form harus di isi ',
        //                 icon: 'error',
        //                 confirmButtonText: 'Ok'
        //             });
        //         </script>
        //     ");
        //     return redirect()->back();
        // }


        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusartikel()
    {
        $id = $this->request->getPost('id');
        $artikel = new Artikel();
        $session = session();
        $userID = $session->get('id');
        $riwayat = new Riwayat();
        $delete = $artikel->where('id', $id)->delete();
        $riwayat->save([
            'id_user' => $userID,
            'aktivitas' => 'Mengahapus',
            'aksi' => 'Menghapus artikel dengan ID : ' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
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
