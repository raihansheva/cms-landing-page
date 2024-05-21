<?php

namespace App\Controllers;

use App\Models\Harga;
use App\Models\Benefit;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use Irsyadulibad\DataTables\DataTables;

class HargaController extends BaseController
{
    public function index()
    {
        // $data = DataTables::use('benefit')
        // ->select('benefit.id_paket_harga as idP, benefit.nama_benefit ')
        // ->join('paket_harga', 'paket_harga.id = benefit.id_paket_harga' , 'INNER JOIN');
        // var_dump($data);
    }

    public function get_data_harga(){
        // return datatables('paket_harga')->make();
        return DataTables::use('paket_harga')
        ->select('paket_harga.id as idPH , paket_harga.nama_paket , paket_harga.kategori_harga , paket_harga.deskripsi as deskripsiPH , paket_harga.harga , solusi.nama_solusi')
        ->join('solusi', 'solusi.id = paket_harga.id_solusi' , 'INNER JOIN')->make();
    }
    public function get_data_benefit($id)
    {
        return DataTables::use('benefit')
        ->select('benefit.id as idP, benefit.nama_benefit, paket_harga.nama_paket ')
        ->join('paket_harga', 'paket_harga.id = benefit.id_paket_harga' , 'INNER JOIN')
        ->where(['id_paket_harga' => $id])->make();
        // return  $data;
    }

    public function tambahharga(){
        $harga = new Harga();
        $harga->save([
            'nama_paket' => $this->request->getPost('nama_paket'),
            'kategori_harga' => $this->request->getPost('kategori_harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'id_solusi' => $this->request->getPost('id_solusi'),
        ]);
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahharga(){
        $id = $this->request->getPost('id');
        $harga = new Harga();
        $harga->save([
            'id' => $id,
            'nama_paket' => $this->request->getPost('nama_paket'),
            'kategori_harga' => $this->request->getPost('kategori_harga'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'harga' => $this->request->getPost('harga'),
            'id_solusi' => $this->request->getPost('id_solusi'),
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusharga(){
        $id = $this->request->getPost('id');
        $harga = new Harga();
        $delete = $harga->where('id', $id)->delete();
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }

    public function tambahbenefit()
    {
        $benefit = new Benefit();
        $benefit->save([
            'id_paket_harga' => $this->request->getPost('id_paket_harga'),
            'nama_benefit' => $this->request->getPost('nama_benefit'),
        ]);
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);
        // return $this->response->setJSON(['status' => true]);
    }

    public function ubahbenefit()
    {
        $benefit = new Benefit();
        $id = $this->request->getPost('id');
        $benefit->save([
            'id' => $id,
            'id_paket_harga' => $this->request->getPost('id_paket_harga'),
            'nama_benefit' => $this->request->getPost('nama_benefit'),
        ]);
        return redirect()->back();
        // return $this->response->setJSON(['status' => true]);
    }

    public function hapusbenefit()
    {
        $id = $this->request->getPost('id');
        $benefit = new Benefit();
        $delete = $benefit->where('id', $id)->delete();
        return redirect()->back();
        // echo json_encode(['status' => TRUE]);

    }
}
