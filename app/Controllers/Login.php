<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\User;
use CodeIgniter\HTTP\ResponseInterface;

class LoginController extends BaseController
{
    public function login()
    {
        $user = new User();
        $login = $this->request->getPost('login');
        if ($login) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            $user = $user->login($username, $password);
            if ($user) {
                $data = $user->where('username', $username)->first();
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
}
