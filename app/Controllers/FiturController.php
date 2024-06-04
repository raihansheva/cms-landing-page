<?php

namespace App\Controllers;

use App\Models\Solusi;
use Config\Services;
use App\Models\Fitur;
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
        // $cekslug = $solusi->where('id' , $idS)->first();
        // $hasilslug = $cekslug['slug'];
        // $slug = $this->create_slug_detail($hasilslug);
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

    public function ubahfitur()
    {
        $fitur = new Fitur();
        $solusi = new Solusi();
        $image = $this->request->getFile('icon');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }

        $id = $this->request->getPost('id');
        $namafitur = $this->request->getPost('nama_fitur');
        $deskripsi = $this->request->getPost('deskripsi');
        $idS = $this->request->getPost('id_solusi');
        // $cekslug = $solusi->where('id' , $idS)->first();
        // $hasilslug = $cekslug['slug'];
        // $slug = $this->create_slug_detail($hasilslug);
        $slug = $this->create_slug_detail($namafitur);
        // dd($slug);
        $fitur->save([
            'id' => $id,
            'nama_fitur' => $namafitur,
            'slug' => $slug,
            'deskripsi' => $deskripsi,
            'id_solusi' => $idS,
            'icon' => $path
        ]);
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
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusfitur()
    {
        $id = $this->request->getPost('id');
        $fitur = new Fitur();
        $delete = $fitur->where('id', $id)->delete();
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
        $rules = [
            'judul_detail' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
            'id_fitur' => 'required',
            'layout' => 'required',
        ];
        // if ($this->validate($rules)) {
        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $judul_detail = $this->request->getPost('judul_detail');
        $deskripsi = $this->request->getPost('deskripsi');
        $id_fitur = $this->request->getPost('id_fitur');
        $layout = $this->request->getPost('layout');
        $slug = $this->create_slug_detail($judul_detail);
        $fitur->save([
            'judul_detail' => $judul_detail,
            'deskripsi' => $deskripsi,
            'slug' => $slug,
            'gambar' => $path,
            'id_fitur' => $id_fitur,
            'layout' => $layout,
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
        //     } else {
        //         session()->setFlashdata('sweetalert', "
        //         <script>
        //             Swal.fire({
        //                 title: 'Gagal',
        //                 text: 'Form harus di isi',
        //                 icon: 'error',
        //                 confirmButtonText: 'Ok'
        //             });
        //         </script>
        //     ");
        // return redirect()->back();
        //     }


        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahdetailfitur()
    {
        $fitur = new Detailfitur();
        $validation = \config\Services::validation();
        $rules = [
            'judul_detail' => 'required',
            'deskripsi' => 'required',
            // 'gambar' => 'required',
            'id_fitur' => 'required',
            'layout' => 'required',
        ];
        if (!$this->validate($rules)) {
            $image = $this->request->getFile('gambar');
            $newName = $image->getClientName();
            $path = 'defalut.jpg';
            if ($image->isValid() && !$image->hasMoved()) {
                $newName = $image->getClientName();
                $image->move(ROOTPATH . 'public/uploads', $newName);
    
                $path = 'uploads/' . $newName;
            }
            $id = $this->request->getPost('id');
            $judul_detail = $this->request->getPost('judul_detail');
            $deskripsi = $this->request->getPost('deskripsi');
            $id_fitur = $this->request->getPost('id_fitur');
            $layout = $this->request->getPost('layout');
            $slug = $this->create_slug_detail($judul_detail);
    
            $fitur->save([
                'id' => $id,
                'judul_detail' => $judul_detail,
                'deskripsi' => $deskripsi,
                'slug' => $slug,
                'gambar' => $path,
                'id_fitur' => $id_fitur,
                'layout' => $layout,
            ]);
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
        }else{
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
        $delete = $detailfitur->where('id', $id)->delete();
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
