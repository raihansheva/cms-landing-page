<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\Riwayat;
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
        $validation = \config\Services::validation();
        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();
        $rules = [
            'username' => 'required',
            'password' => 'required',
        ];

        $login = $this->request->getPost('login');
        if ($login) {
            if ($this->validate($rules)) {
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
                    session()->set('isLoggedIn', true);
                    $riwayat->save([
                        'id_user' => $data['id'],
                        'nama' => $data['nama'],
                        'aktivitas' => 'Login',
                        'aksi' => 'Login' ,
                        'created_at' => date('Y-m-d H:i:s')
                    ]);
                    return view('layout/main');
                } else {
                    session()->setFlashdata('sweetalert', "
                         <script>
                                 Swal.fire({
                                    title: 'Gagal',
                                    text: 'Username atau Password anda salah',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                        </script>
            ");
                    return redirect()->back();
                }
            } else {
                session()->setFlashdata('sweetalert', "
                         <script>
                                 Swal.fire({
                                    title: 'Gagal',
                                    text: 'Username atau Password harus diisi',
                                    icon: 'error',
                                    confirmButtonText: 'Ok'
                                });
                        </script>
            ");
                return redirect()->back();
            }
        }
        // echo 'haloo';
    }
    public function editpassword()
    {
        $users = new User();
        $id = $this->request->getPost('id');
        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();
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
            $riwayat->save([
                'id_user' => $userID,
                'nama' => $nama,
                'aktivitas' => 'Mengubah',
                'aksi' => 'Mengganti password',
                'created_at' => date('Y-m-d H:i:s')
            ]);
            session()->setFlashdata('modal', [
                'name' => 'exampleModaleditpassword',
                'type' => 'success',
                'message' => 'Password berhasil di ubah'
            ]);
            return redirect()->back()->withInput();
            // echo json_encode(['status' => true]);
        } else {
            session()->setFlashdata('modal', [
                'name' => 'exampleModaleditpassword',
                'type' => 'error',
                'message' => 'Password lama tidak cocok'
            ]);
            return redirect()->back()->to('/profile')->withInput();
            // echo json_encode(['status' => false]);
            // echo 'haloo';
        }
    }

    public function editprofile()
    {
        $users = new User();
        $id = $this->request->getPost('id');
        $validation = \config\Services::validation();

        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $usrnm = $this->request->getPost('username');
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $status = $this->request->getPost('status');
        $role = $this->request->getPost('role');

        $dataSebelumnya = $users->find($id);
        $usernameSebelumnya = $dataSebelumnya['username'];
        $namaSebelumnya = $dataSebelumnya['nama'];
        $emailSebelumnya = $dataSebelumnya['email'];
        $statusSebelumnya = $dataSebelumnya['status'];
        $roleSebelumnya = $dataSebelumnya['role'];

        $rules = [
            'username' => 'required',
            'nama' => 'required',
            'email' => 'required|valid_email',
            'status' => 'required',
            'role' => 'required'
        ];
        if ($this->validate($rules)) {
            $aksi = [];
            $users->save([
                'id' => $id,
                'username' => $usrnm,
                'nama' => $nama,
                'email' => $email,
                'role' => $role,
                'status' => $status,
                'foto' => 'default'
            ]);
            // Jika pengguna hanya mengubah judul
            if (!empty($usrnm) && $usrnm !== $usernameSebelumnya) {
                $aksi[] = "Mengubah username dari '$usernameSebelumnya' menjadi '$usrnm' di tabel user";
            }

            // Jika pengguna hanya mengubah deskripsi
            if (!empty($nama) && $nama !== $namaSebelumnya) {
                $aksi[] = "Mengubah nama dari '$namaSebelumnya' menjadi '$nama' di tabel user";
            }
            if (!empty($email) && $email !== $emailSebelumnya) {
                $aksi[] = "Mengubah email dari '$emailSebelumnya' menjadi '$email' di tabel user";
            }
            if (!empty($role) && $role !== $roleSebelumnya) {
                $aksi[] = "Mengubah role dari '$roleSebelumnya' menjadi '$role' di tabel user";
            }
            if (!empty($status) && $status !== $statusSebelumnya) {
                $aksi[] = "Mengubah status dari '$statusSebelumnya' menjadi '$status' di tabel user";
            }

            foreach ($aksi as $a) {
                $riwayat->save([
                    'id_user' => $userID,
                    'nama' => $nama,
                    'aktivitas' => 'Mengubah',
                    'aksi' => $a,
                    'created_at' => date('Y-m-d H:i:s')
                ]);
            }
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
        $session = session();
        $userID = $session->get('id');
        $nama = $session->get('nama');
        $riwayat = new Riwayat();

        $riwayat->save([
            'id_user' => $userID,
            'nama' => $nama,
            'aktivitas' => 'Logout',
            'aksi' => 'Logout',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        // Hapus data sesi pengguna
        session()->destroy();

        // Redirect ke halaman login atau halaman lain yang Anda tentukan
        return redirect()->to('/');
    }
}
