<?php

namespace App\Controllers;

use App\Models\Harga;
use App\Models\Benefit;
use App\Models\Riwayat;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Irsyadulibad\DataTables\DataTables;

class HargaController extends BaseController
{
    private function create_slug($string)
    {
        $slug = url_title($string, '-', true);
        $harga = new Harga();

        $count = 0;
        $newSlug = $slug;
        while ($harga->where('slug', $newSlug)->countAllResults() > 0) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }
    private function create_slug_benefit($string)
    {
        $slug = url_title($string, '-', true);
        $benefit = new Benefit();

        $count = 0;
        $newSlug = $slug;
        while ($benefit->where('slug', $newSlug)->countAllResults() > 0) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }
    public function index()
    {
        // $data = DataTables::use('benefit')
        // ->select('benefit.id_paket_harga as idP, benefit.nama_benefit ')
        // ->join('paket_harga', 'paket_harga.id = benefit.id_paket_harga' , 'INNER JOIN');
        // var_dump($data);
    }

    public function get_data_harga()
    {
        // return datatables('paket_harga')->make();
        return DataTables::use('paket_harga')
            ->select('paket_harga.id as idPH , paket_harga.nama_paket , paket_harga.kategori_harga , paket_harga.deskripsi as deskripsiPH , paket_harga.harga , solusi.nama_solusi')
            ->join('solusi', 'solusi.id = paket_harga.id_solusi', 'INNER JOIN')->make();
    }
    public function get_data_benefit($id)
    {
        return DataTables::use('benefit')
            ->select('benefit.id as idP, benefit.nama_benefit, paket_harga.nama_paket ')
            ->join('paket_harga', 'paket_harga.id = benefit.id_paket_harga', 'INNER JOIN')
            ->where(['id_paket_harga' => $id])->make();
        // return  $data;
    }

    public function tambahharga()
    {
        $harga = new Harga();
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $rules = [
            'nama_paket' => 'required',
            'kategori_harga' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_solusi' => 'required',
        ];

        $nama_paket = $this->request->getPost('nama_paket');
        $kat = $this->request->getPost('kategori_harga');
        $deskripsi = $this->request->getPost('deskripsi');
        $hargaP = $this->request->getPost('harga');
        $id_solusi = $this->request->getPost('id_solusi');
        $slug = $this->create_slug($nama_paket);

        if ($this->validate($rules)) {
            $harga->save([
                'nama_paket' => $nama_paket,
                'kategori_harga' => $kat,
                'slug' => $slug,
                'deskripsi' => $deskripsi,
                'harga' => $hargaP,
                'id_solusi' => $id_solusi,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $riwayat->save([
                'id_user' => $userID,
                'nama' => $nama,
                'aktivitas' => 'Menambahkan',
                'aksi' => 'Menambahkan paket harga ',
                'created_at' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('sweetalert', "
                    <script>
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Anda menambahkan paket harga',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                ");
            return redirect()->back()->to('/paketharga');
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
            return redirect()->back()->to('/paketharga');
        }


        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahharga()
    {
        $id = $this->request->getPost('id');
        $harga = new Harga();
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $nama_paket = $this->request->getPost('nama_paket');
        $kat = $this->request->getPost('kategori_harga');
        $deskripsi = $this->request->getPost('deskripsi');
        $hargaP = $this->request->getPost('harga');
        $id_solusi = $this->request->getPost('id_solusi');
        $slug = $this->create_slug($nama_paket);

        $dataSebelumnya = $harga->find($id);
        $nama_paketSebelumnya = $dataSebelumnya['nama_paket'];
        $katSebelumnya = $dataSebelumnya['kategori_harga'];
        $deskSebelumnya = $dataSebelumnya['deskripsi'];
        $hargaSebelumnya = $dataSebelumnya['harga'];
        $idSSebelumnya = $dataSebelumnya['id_solusi'];

        $rules = [
            'nama_paket' => 'required',
            'kategori_harga' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_solusi' => 'required',
        ];


        if ($this->validate($rules)) {
            $aksi = [];
            if (!empty($nama_paket) && $nama_paket !== $nama_paketSebelumnya) {
                $aksi[] = "Mengubah nama paket dari '$nama_paketSebelumnya' menjadi '$nama_paket' di tabel paket harga";
            }
            // Jika pengguna hanya mengubah deskripsi
            if (!empty($kat) && $kat !== $katSebelumnya) {
                $aksi[] = "Mengubah kategori '$katSebelumnya' menjadi '$kat' di tabel paket harga";
            }
            if (!empty($deskripsi) && $deskripsi !== $deskSebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$deskSebelumnya' menjadi '$deskripsi' di tabel paket harga";
            }
            if (!empty($hargaP) && $hargaP !== $hargaSebelumnya) {
                $aksi[] = "Mengubah harga dari '$hargaSebelumnya' menjadi '$hargaP' di tabel paket harga";

                if (!empty($id_solusi) && $id_solusi !== $idSSebelumnya) {
                    $aksi[] = "Mengubah id solusi telepon dari '$idSSebelumnya menjadi '$id_solusi' di tabel paket harga";
                }

                $harga->save([
                    'id' => $id,
                    'nama_paket' => $nama_paket,
                    'kategori_harga' => $kat,
                    'slug' => $slug,
                    'deskripsi' => $deskripsi,
                    'harga' => $hargaP,
                    'id_solusi' => $id_solusi,
                    
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
                            text: 'Anda mengubah paket harga',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                ");
                return redirect()->back()->to('/paketharga');
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
                return redirect()->back()->to('/paketharga');
            };
        }

        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusharga()
    {
        $id = $this->request->getPost('id');
        $harga = new Harga();
        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $delete = $harga->where('id', $id)->delete();
        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Menghapus',
            'aksi' => 'Menghapus paket harga dengan ID : ' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menghapus paket harga',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
        return redirect()->back()->to('/paketharga');
        // echo json_encode(['status' => TRUE]);

    }

    public function tambahbenefit()
    {
        $benefit = new Benefit();
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $rules = [
            'id_paket_harga' => 'required',
            'nama_benefit' => 'required',

        ];

        $idpaket = $this->request->getPost('id_paket_harga');
        $namaB =  $this->request->getPost('nama_benefit');
        $slug = $this->create_slug_benefit($namaB);

        if ($this->validate($rules)) {
            $benefit->save([
                'id_paket_harga' => $idpaket,
                'nama_benefit' => $namaB,
                'slug' => $slug,
                'created_at' => date('Y-m-d H:i:s')
            ]);
            $riwayat->save([
                'id_user' => $userID,
                'nama' => $nama,
                'aktivitas' => 'Menambahkan',
                'aksi' => 'Menambahkan benefit',
                'created_at' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('sweetalert', "
                    <script>
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Anda menambahkan benefit',
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
                    text: 'Form harus di isi',
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

    public function ubahbenefit()
    {
        $benefit = new Benefit();
        $id = $this->request->getPost('id');
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $idpaket = $this->request->getPost('id_paket_harga');
        $namaB =  $this->request->getPost('nama_benefit');
        $slug = $this->create_slug_benefit($namaB);

        $dataSebelumnya = $benefit->find($id);
        $idPHSebelumnya = $dataSebelumnya['id_paket_harga'];
        $benefitSebelumnya = $dataSebelumnya['nama_benefit'];

        $rules = [
            'id_paket_harga' => 'required',
            'nama_benefit' => 'required',
        ];

        if ($this->validate($rules)) {
            $aksi = [];

            if (!empty($idpaket) && $idpaket !== $idPHSebelumnya) {
                $aksi[] = "Mengubah id paket harga dari '$idPHSebelumnya' menjadi '$idpaket' di tabel benefit";
            }
            if (!empty($namaB) && $namaB !== $benefitSebelumnya) {
                $aksi[] = "Mengubah nama benefit dari '$benefitSebelumnya' menjadi '$namaB' di tabel benefit";
            }
            $benefit->save([
                'id' => $id,
                'id_paket_harga' => $idpaket,
                'nama_benefit' => $namaB,
                'slug' => $slug,
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
                            text: 'Anda mengubah benefit',
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
                            text: 'Form harus di isi',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                ");
            return redirect()->back();
        }


        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusbenefit()
    {
        $id = $this->request->getPost('id');
        $benefit = new Benefit();
        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $delete = $benefit->where('id', $id)->delete();
        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Menghapus',
            'aksi' => 'Menghapus benefit dengan ID : ' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menghapus benefit',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }
}
