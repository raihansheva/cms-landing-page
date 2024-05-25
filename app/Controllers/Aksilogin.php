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
            return redirect()->back()->with('success', 'Password berhasil di ubah');;
        } else {
            return redirect()->back()->with('error', 'Password lama tidak cocok');;
            // echo 'haloo';
        }

        // echo 'haloo';
    }

    public function editprofile()
    {
        $users = new User();
        $id = $this->request->getPost('id');
        $users->save([
            'id' => $id,
            'username' => $this->request->getPost('username'),
            'nama' => $this->request->getPost('nama'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role'),
            'status' => $this->request->getPost('status'),
        ]);
        return redirect()->back();

        // echo 'haloo';
    }
}
