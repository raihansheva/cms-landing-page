<?php

namespace App\Controllers;

use App\Models\User;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Aksilogin extends BaseController
{
    // public function index()
    // {
    //     echo 'hello wolrd';
    // }


    public function login()
    {
        $users = new User();
        $login = $this->request->getPost('login');
        if ($login) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = $users->login($username, $password);
            if ($user) {
                $data = $users->where('username', $username)->first();
                $datasesi = [
                    'id' => $data['id'],
                    'username' => $data['username'],
                    'nama' => $data['nama'],
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'status' => $data['status'],
                    'role' => $data['role'],
                    'foto' => $data['foto'],
                ];
                session()->set($datasesi);
                return view('layout/main');
            } else {
                session()->setFlashdata('error', 'Username atau Password salah');
                return redirect()->back();
            }
        }
        // echo 'haloo';
    }
    public function editpassword()
    {
        $users = new User();
        $id = $this->request->getPost('id');
        $password = $this->request->getPost('password');
        $user = $users->cekpassword($id, $password);
        // dd($user);
        if ($user) {
            // $data = $users->where('id', $id)->first();
            $passwordbaru = $this->request->getPost('password-baru');
            $pwbaru = $users->ubahpassword($passwordbaru);
            // dd($pwbaru);
            $users->save([
                'id' => $id,
                'password' => $pwbaru
            ]);
            session()->setFlashdata('modal', [
                'name' => 'exampleModaleditpassword',
                'type' => 'success',
                'message' => 'Password berhasil di ubah'
            ]);
            // return redirect()->back()->withInput();
            echo json_encode(['status' => true]);
        } else {
            session()->setFlashdata('modal', [
                'name' => 'exampleModaleditpassword',
                'type' => 'error',
                'message' => 'Password lama tidak cocok'
            ]);
            // return redirect()->back()->to('/profile')->withInput();
            echo json_encode(['status' => true]);
            // echo 'haloo';
        }
    }

    public function editprofile()
    {
        $users = new User();
        $id = $this->request->getPost('id');
        $rules = [
            'username' => 'required|min_length[3]|max_length[20]',
            'nama' => 'required|min_length[3]|max_length[20]',
            'email' => 'required|valid_email',
            'password' => 'permit_empty|min_length[6]',
            'status' => 'required|min_length[3]|max_length[20]',
            'role' => 'required|min_length[3]|max_length[20]'
        ];
        if ($rules) {
            $users->save([
                'id' => $id,
                'username' => $this->request->getPost('username'),
                'nama' => $this->request->getPost('nama'),
                'email' => $this->request->getPost('email'),
                'role' => $this->request->getPost('role'),
                'status' => $this->request->getPost('status'),
                'foto' => 'default'
            ]);
            $data = $users->where('id', $id)->first();
            $datasesi = [
                'id' => $data['id'],
                'username' => $data['username'],
                'nama' => $data['nama'],
                'email' => $data['email'],
                'password' => $data['password'],
                'status' => $data['status'],
                'role' => $data['role'],
                'foto' => $data['foto'],
            ];
            session()->set($datasesi);
            session()->setFlashdata('modal', [
                'name' => 'exampleModaleditprofile',
                'type' => 'success',
                'message' => 'Berhasil mengubah'
            ]);
            return redirect()->back()->withInput();
        } else {
            session()->setFlashdata('modal', [
                'name' => 'exampleModaleditprofile',
                'type' => 'error',
                'message' => 'Form harus di isi semua'
            ]);
            return redirect()->back()->to('/profile')->withInput();
        }

        // echo 'haloo';
    }

    public function logout()
    {
        // Hapus data sesi pengguna
        session()->destroy();

        // Redirect ke halaman login atau halaman lain yang Anda tentukan
        return redirect()->to('/');
    }
}
