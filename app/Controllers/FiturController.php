<?php

namespace App\Controllers;

use App\Models\Headfitur;
use Config\Services;
use App\Models\Fitur;
use App\Models\Solusi;
use App\Models\Riwayat;
use App\Models\Detailfitur;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Irsyadulibad\DataTables\DataTables;

class FiturController extends BaseController
{
    private function create_slug($string)
    {
        $slug = url_title($string, '-', true);
        $fitur = new Fitur();

        $count = 0;
        $newSlug = $slug;
        while ($fitur->where('slug', $newSlug)->countAllResults() > 0) {
            $count++;
            $newSlug = $slug . '-' . $count;
        }

        return $newSlug;
    }
    private function create_slug_detail($string)
    {
        $slug = url_title($string, '-', true);
        $Dfitur = new Detailfitur();

        $count = 0;
        $newSlug = $slug;
        while ($Dfitur->where('slug', $newSlug)->countAllResults() > 0) {
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

    public function get_data_fitur()
    {
        // return datatables('fitur')->make();
        return DataTables::use('fitur')
            ->select('fitur.id as idF , fitur.nama_fitur , fitur.deskripsi as deskripsiF , solusi.nama_solusi , fitur.icon ')
            ->join('solusi', 'solusi.id = fitur.id_solusi', 'INNER JOIN')->make();
        // return DataTables::use('benefit')
        // ->select('benefit.id as idP, benefit.nama_benefit, paket_harga.nama_paket ')
        // ->join('paket_harga', 'paket_harga.id = benefit.id_paket_harga' , 'INNER JOIN')
        // ->where(['id_paket_harga' => $id])->make();
    }
    public function get_data_detail_fitur($id)
    {
        // return datatables('detail_fitur')->where(['id_fitur' => $id])->make();
        return DataTables::use('detail_fitur')
            ->select('detail_fitur.id as idD, detail_fitur.judul_detail , detail_fitur.deskripsi as deskripsiDF, detail_fitur.gambar, fitur.nama_fitur , layout.nama_layout')
            ->join('fitur', 'fitur.id = detail_fitur.id_fitur', 'INNER JOIN')
            ->join('layout', 'layout.id = detail_fitur.layout', 'INNER JOIN')
            ->where(['id_fitur' => $id])->make();
        // return $data;
    }



    public function tambahfitur()
    {
        $fitur = new Fitur();
        $solusi = new Solusi();
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $rules = [
            'nama_fitur' => 'required',
            'deskripsi' => 'required',
            'id_solusi' => 'required',
            // 'icon' => 'required',
        ];
        $id = $this->request->getPost('id');
        $namafitur = $this->request->getPost('nama_fitur');
        $deskripsi = $this->request->getPost('deskripsi');
        $idS = $this->request->getPost('id_solusi');
        $slug = $this->create_slug_detail($namafitur);


        if ($this->validate($rules)) {
            $image = $this->request->getFile('icon');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);

                $path = 'uploads/' . $newName;
            }
            $fitur->save([
                'nama_fitur' => $namafitur,
                'slug' => $slug,
                'deskripsi' => $deskripsi,
                'id_solusi' => $idS,
                'icon' => $path
            ]);
            $riwayat->save([
                'id_user' => $userID,
                'nama' => $nama,
                'aktivitas' => 'Menambahkan',
                'aksi' => 'Menambahkan Fitur',
                'created_at' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('sweetalert', "
                    <script>
                        Swal.fire({
                            title: 'Berhasil',
                            text: 'Anda menambahkan fitur',
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
                            text: 'Form harus diisi semua',
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

    public function ubahfitur()
    {
        $fitur = new Fitur();
        $id = $this->request->getPost('id');
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $namafitur = $this->request->getPost('nama_fitur');
        $deskripsi = $this->request->getPost('deskripsi');
        $idS = $this->request->getPost('id_solusi');
        $slug = $this->create_slug_detail($namafitur);

        $dataSebelumnya = $fitur->find($id);
        // dd($dataSebelumnya);
        $namaFSebelumnya = $dataSebelumnya['nama_fitur'];
        $deskFSebelumnya = $dataSebelumnya['deskripsi'];
        $idSSebelumnya = $dataSebelumnya['id_solusi'];
        $gambarSebelumnya = $dataSebelumnya['icon'];

        $rules = [
            'nama_fitur' => 'required',
            'deskripsi' => 'required',
            'id_solusi' => 'required',
            // 'icon' => 'required',
        ];

        if ($this->validate($rules)) {
            $image = $this->request->getFile('icon');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';
            $aksi = [];

            if (!empty($namafitur) && $namafitur !== $namaFSebelumnya) {
                $aksi[] = "Mengubah nama fitur dari '$namaFSebelumnya' menjadi '$namafitur' di tabel fitur";
            }

            // Jika pengguna hanya mengubah deskripsi
            if (!empty($deskripsi) && $deskripsi !== $deskFSebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$deskFSebelumnya' menjadi '$deskripsi' di tabel fitur";
            }
            if (!empty($idS) && $idS !== $idSSebelumnya) {
                $aksi[] = "Mengubah id solusi dari '$idSSebelumnya' menjadi '$idS' di tabel fitur";
            }

            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
                $path = 'uploads/' . $newName;
                $aksi[] = "Mengubah gambar dari '$gambarSebelumnya' menjadi '$path' di tabel fitur";
            }

            // dd($slug);
            $fitur->save([
                'id' => $id,
                'nama_fitur' => $namafitur,
                'slug' => $slug,
                'deskripsi' => $deskripsi,
                'id_solusi' => $idS,
                'icon' => $path,
                'created_at' => date('Y-m-d H:i:s')
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
                            text: 'Anda mengubah fitur',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                ");
            return redirect()->back()->to('/fitur');
        } else {
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
            return redirect()->back()->to('/fitur');
        }


        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusfitur()
    {
        $id = $this->request->getPost('id');
        $fitur = new Fitur();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();
        $fitur->where('id', $id)->delete();
        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Menghapus',
            'aksi' => 'Menghapus fitur dengan ID : ' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);
        session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menghapus fitur',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
        return redirect()->to('/fitur');
        // echo json_encode(['status' => TRUE]);

    }

    public function tambahdetailfitur()
    {
        $fitur = new Detailfitur();
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $judul_detail = $this->request->getPost('judul_detail');
        $deskripsi = $this->request->getPost('deskripsi');
        $desk = $this->clean_desk($deskripsi);
        $id_fitur = $this->request->getPost('id_fitur');
        $layout = $this->request->getPost('layout');
        $slug = $this->create_slug_detail($judul_detail);

        $rules = [
            'judul_detail' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
            'id_fitur' => 'required',
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

            $fitur->save([
                'judul_detail' => $judul_detail,
                'deskripsi' => $desk,
                'slug' => $slug,
                'gambar' => $path,
                'id_fitur' => $id_fitur,
                'layout' => $layout,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            $riwayat->save([
                'id_user' => $userID,
                'nama' => $nama,
                'aktivitas' => 'Menambahkan',
                'aksi' => 'Menambahkan Detail fitur',
                'created_at' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menambahkan detail fitur',
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
    public function ubahheaderfitur()
    {
        $id = $this->request->getPost('id');
        $fitur = new Headfitur();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $judulS = $this->request->getPost('judul_fitur');
        $desk = $this->request->getPost('deskripsi');

        $datasebelumnya = $fitur->find($id);
        $judulSsebelumnya = $datasebelumnya['judul_fitur'];
        $deskSsebelumnya = $datasebelumnya['deskripsi'];

        $rules = [
            'judul_fitur' => 'required',
            'deskripsi' => 'required',
        ];

        if ($this->validate($rules)) {
            $aksi = [];

            if (!empty($judulS) && $judulS !== $judulSsebelumnya) {
                $aksi[] = "Mengubah judul fitur dari '$judulSsebelumnya' menjadi '$judulS' di tabel headfitur";
            }
            if (!empty($desk) && $desk !== $deskSsebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$deskSsebelumnya' menjadi '$desk' di tabel headfitur";
            }

            $fitur->save([
                'id' => $id,
                'judul_fitur' => $judulS,
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
                    text: 'Anda mengubah headfitur',
                    icon: 'success',
                    confirmButtonText: 'Ok'
                });
            </script>
        ");
            return redirect()->back()->to('/fitur');
        } else {
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
            return redirect()->back()->to('/fitur');
        }
        // return $this->response->setJSON(['status' => true]);
    }
    public function ubahdetailfitur()
    {
        $fitur = new Detailfitur();
        $validation = \config\Services::validation();
        $id = $this->request->getPost('id');

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $judul_detail = $this->request->getPost('judul_detail');
        $deskripsi = $this->request->getPost('deskripsi');
        $desk = $this->clean_desk($deskripsi);
        $id_fitur = $this->request->getPost('id_fitur');
        $layout = $this->request->getPost('layout');
        $slug = $this->create_slug_detail($judul_detail);

        $dataSebelumnya = $fitur->find($id);
        $judulDSebelumnya = $dataSebelumnya['judul_detail'];
        $deskripsiSebelumnya = $dataSebelumnya['deskripsi'];
        $idFSebelumnya = $dataSebelumnya['id_fitur'];
        $layoutSebelumnya = $dataSebelumnya['layout'];

        $rules = [
            // 'judul_detail' => 'required',
            // 'deskripsi' => 'required',
            // // 'gambar' => 'required',
            // 'id_fitur' => 'required',
            // 'layout' => 'required',
        ];

        if (!$this->validate($rules)) {
            $image = $this->request->getFile('gambar');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';
            $aksi = [];
            if (!empty($judul_detail) && $judul_detail !== $judulDSebelumnya) {
                $aksi[] = "Mengubah judul banner dari '$judulDSebelumnya' menjadi '$judul_detail' di tabel detail fitur";
            }
            // Jika pengguna hanya mengubah deskripsi
            if (!empty($deskripsi) && $deskripsi !== $deskripsiSebelumnya) {
                $aksi[] = "Mengubah deskripsi dari '$deskripsiSebelumnya' menjadi '$deskripsi' di tabel detail fitur";
            }
            if (!empty($id_fitur) && $id_fitur !== $idFSebelumnya) {
                $aksi[] = "Mengubah id fitur dari '$idFSebelumnya' menjadi '$id_fitur' di tabel detail fitur";
            }
            if (!empty($layout) && $layout !== $layoutSebelumnya) {
                $aksi[] = "Mengubah id layout dari '$layoutSebelumnya' menjadi '$layout' di tabel detail fitur";
            }
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);

                $path = 'uploads/' . $newName;
            }


            $fitur->save([
                'id' => $id,
                'judul_detail' => $judul_detail,
                'deskripsi' => $desk,
                'slug' => $slug,
                'gambar' => $path,
                'id_fitur' => $id_fitur,
                'layout' => $layout,
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
                            text: 'Anda mengubah detail fitur',
                            icon: 'success',
                            confirmButtonText: 'Ok'
                        });
                    </script>
                ");
            return redirect()->back();
            // return $this->response->setJSON(['status' => true]);
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
    }

    public function hapusdetailfitur()
    {
        $id = $this->request->getPost('id');
        $detailfitur = new Detailfitur();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $delete = $detailfitur->where('id', $id)->delete();
        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Menghapus',
            'aksi' => 'Menghapus fitur dengan ID : ' . $id,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda menghapus detail fitur',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }
}
