<?php

namespace App\Controllers;

use App\Models\Riwayat;
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
        $slug = url_title($string, '-', true);
        $solusi = new Solusi();

        $count = 0;
        $newSlug = $slug;
        while ($solusi->where('slug', $newSlug)->countAllResults() > 0) {
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

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $namasolusi = $this->request->getPost('nama_solusi');
        $deskripsi = $this->request->getPost('deskripsi');
        $slug = $this->create_slug($namasolusi);

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);
            $path = 'uploads/' . $newName;
        }
        $rules = [
            'nama_solusi' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
        ];

        if ($this->validate($rules)) {
            $image = $this->request->getFile('gambar');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';
            $aksi = [];
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
                $path = 'uploads/' . $newName;
                // $aksi[] = "Menambahkan gambar dengan path '$path'";
            }

            $solusi->save([
                'nama_solusi' => $namasolusi,
                'slug' => $slug,
                'deskripsi' => $deskripsi,
                'gambar' => $path
            ]);

            $riwayat->save([
                'id_user' => $userID,
                'nama' => $nama,
                'aktivitas' => 'Menambahkan',
                'aksi' => 'Menambahkan Solusi',
                'created_at' => date('Y-m-d H:i:s')
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
            session()->setFlashdata('modaltambah', [
                'name' => 'exampleModaltambahsolusi',
                // 'type' => 'error',
                // 'message' => 'Password lama tidak cocok'
            ]);
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

    public function ubahsolusi()
    {
        $solusi = new Solusi();
        $validation = \config\Services::validation();
        $id = $this->request->getPost('id');

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $namasolusi = $this->request->getPost('nama_solusi');
        $deskripsi = $this->request->getPost('deskripsi');
        $slug = $this->create_slug($namasolusi);

        $datasebelumnya = $solusi->find($id);
        $namaSsebelumnya = $datasebelumnya['nama_solusi'];
        $desksebelumnya = $datasebelumnya['deskripsi'];
        $gambarsebelumnya = $datasebelumnya['gambar'];

        $rules = [
            'nama_solusi' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
        ];
        if ($this->validate($rules)) {
            $image = $this->request->getFile('gambar');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';
            $aksi = [];

            if (!empty($namasolusi) && $namasolusi !== $namaSsebelumnya) {
                $aksi[] = "Mengubah nama solusi dari '$namaSsebelumnya' menjadi '$namasolusi' di tabel solusi";
            }

            // Jika pengguna hanya mengubah deskripsi
            if (!empty($deskripsi) && $deskripsi !== $desksebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$desksebelumnya' menjadi '$deskripsi' di tabel solusi";
            }

            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
                $path = 'uploads/' . $newName;
                $aksi[] = "Mengubah gambar dari '$gambarsebelumnya' menjadi '$path' di tabel solusi";
            }

            // dd($slug);
            $solusi->save([
                'id' => $id,
                'nama_solusi' => $namasolusi,
                'slug' => $slug,
                'deskripsi' => $deskripsi,
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
                        text: 'Annda mengubah solusi',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");

            return redirect()->back()->to('/solusi');
        } else {
            session()->setFlashdata('modalubah', [
                'name' => 'exampleModaleditsolusi',
                // 'type' => 'error',
                // 'message' => 'Password lama tidak cocok'
            ]);
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Form harus diisi semua',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
            return redirect()->back()->to('/solusi');
        }

        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahheadersolusi()
    {
        $id = $this->request->getPost('id');
        $headsolusi = new Headersolusi();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $judulS = $this->request->getPost('judul_solusi');
        $desk = $this->request->getPost('deskripsi');

        $datasebelumnya = $headsolusi->find($id);
        $judulSsebelumnya = $datasebelumnya['judul_solusi'];
        $deskSsebelumnya = $datasebelumnya['deskripsi'];

        $rules = [
            'judul_solusi' => 'required',
            'deskripsi' => 'required',
        ];

        if ($this->validate($rules)) {
            $aksi = [];

            if (!empty($judulS) && $judulS !== $judulSsebelumnya) {
                $aksi[] = "Mengubah judul solusi dari '$judulSsebelumnya' menjadi '$judulS' di tabel headersolusi";
            }
            if (!empty($desk) && $desk !== $deskSsebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$deskSsebelumnya' menjadi '$desk' di tabel headersolusi";
            }

            $headsolusi->save([
                'id' => $id,
                'judul_solusi' => $judulS,
                'deskripsi' => $desk,
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
            return redirect()->back()->to('/solusi');
        } else {
            session()->setFlashdata('modalubahhead', [
                'name' => 'exampleModaljudulsolusi',
                // 'type' => 'error',
                // 'message' => 'Password lama tidak cocok'
            ]);
            session()->setFlashdata('sweetalert', "
            <script>
                Swal.fire({
                    title: 'Gagal',
                    text: 'Form harus diisi semua',
                    icon: 'error',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
            return redirect()->back()->to('/solusi');
        }
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapussolusi()
    {
        $id = $this->request->getPost('id');
        $solusi = new Solusi();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $delete = $solusi->where('id', $id)->delete();
        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Mengahapus',
            'aksi' => 'Menghapus Solusi dengan ID : ' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
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
