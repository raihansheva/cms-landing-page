<?php

namespace App\Controllers;

use Config\Services;
use App\Models\Fitur;
use App\Models\Detailfitur;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Irsyadulibad\DataTables\DataTables;

class FiturController extends BaseController
{
    public function index()
    {
        //
    }

    public function get_data_fitur()
    {
        // return datatables('fitur')->make();
        return DataTables::use('fitur')
        ->select('fitur.id as idF , fitur.nama_fitur , fitur.deskripsi as deskripsiF , solusi.nama_solusi , fitur.icon ')
        ->join('solusi', 'solusi.id = fitur.id_solusi' , 'INNER JOIN')->make();
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
        ->join('fitur', 'fitur.id = detail_fitur.id_fitur' , 'INNER JOIN')
        ->join('layout', 'layout.id = detail_fitur.layout' , 'INNER JOIN')
        ->where(['id_fitur' => $id])->make();
        // return $data;
    }

    

    public function tambahfitur()
    {
        $fitur = new Fitur();

        $image = $this->request->getFile('icon');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $fitur->save([
            'nama_fitur' => $this->request->getPost('nama_fitur'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'id_solusi' => $this->request->getPost('id_solusi'),
            'icon' => $path
        ]);
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahfitur()
    {
        $fitur = new Fitur();

        $image = $this->request->getFile('icon');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }

        $id = $this->request->getPost('id');
        $fitur->save([
            'id' => $id,
            'nama_fitur' => $this->request->getPost('nama_fitur'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'id_solusi' => $this->request->getPost('id_solusi'),
            'icon' => $path
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusfitur()
    {
        $id = $this->request->getPost('id');
        $fitur = new Fitur();
        $delete = $fitur->where('id', $id)->delete();
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }

    public function tambahdetailfitur()
    {
        $fitur = new Detailfitur();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $fitur->save([
            'judul_detail' => $this->request->getPost('judul_detail'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path,
            'id_fitur' => $this->request->getPost('id_fitur'),
            'layout' => $this->request->getPost('layout'),
        ]);
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahdetailfitur()
    {
        $fitur = new Detailfitur();

        $image = $this->request->getFile('gambar');
        $newName = $image->getClientName();
        $path = 'defalut.jpg';
        if ($image->isValid() && !$image->hasMoved()) {
            $newName = $image->getClientName();
            $image->move(ROOTPATH . 'public/uploads', $newName);

            $path = 'uploads/' . $newName;
        }
        $id = $this->request->getPost('id');
        $fitur->save([
            'id' => $id,
            'judul_detail' => $this->request->getPost('judul_detail'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'gambar' => $path,
            'id_fitur' => $this->request->getPost('id_fitur'),
            'layout' => $this->request->getPost('layout'),
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusdetailfitur()
    {
        $id = $this->request->getPost('id');
        $detailfitur = new Detailfitur();
        $delete = $detailfitur->where('id', $id)->delete();
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }
}
