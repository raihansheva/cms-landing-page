<?php

namespace App\Controllers;

use App\Models\KontakClient;
use App\Models\Privacy;
use App\Models\TermsCond;
use App\Models\User;
use App\Models\Fitur;
use App\Models\Harga;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Layout;
use App\Models\Solusi;
use App\Models\Artikel;
use App\Models\Tentangkami;
use App\Models\Headersolusi;
use App\Models\Headerartikel;
use App\Models\Headertentangkami;
use App\Controllers\BaseController;
use Irsyadulibad\DataTables\DataTables;

class Home extends BaseController
{
    // public function __construct()
    // {
    //     $this->model = new Banner();
    // }
    
    public function get_data_kontak()
    {
        return DataTables::use('kontak_user')->make();
    }
    public function login()
    {
        return view('page_login');
    }
    public function ubahPP()
    {
        $pp = new Privacy();
        $id = $this->request->getPost('id');
        $pp->save([
            'id' => $id,
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda mengubah privacy & policy',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
        return redirect()->back()->to('/privacypolicy');
    }
    public function ubahterms()
    {
        $pp = new TermsCond();
        $id = $this->request->getPost('id');
        $pp->save([
            'id' => $id,
            'deskripsi' => $this->request->getPost('deskripsi'),
        ]);
        session()->setFlashdata('sweetalert', "
                <script>
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Anda mengubah terms & conditions',
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                </script>
            ");
        return redirect()->back()->to('/termsconditions');
    }



    public function PP()
    {
        $pp = new Privacy();
        $data = [
            'pp'=> $pp->findAll()
        ];
        return view('content/other/privacy', $data);
    }
    public function TC()
    {
        $tc = new TermsCond();
        $data = [
            'tc'=> $tc->findAll()
        ];
        return view('content/other/termsCond', $data);
    }



    public function kontakuser()
    {
        return view('content/kontakuser');
    }

    public function hapuskontak()
    {
        $id = $this->request->getPost('id');
        $kontak = new KontakClient();
        $delete = $kontak->where('id', $id)->delete();
        return redirect()->back()->to('/kontakuser');
    }
    public function index(): string
    {
        $solusi = new Solusi();
        $fitur = new Fitur();
        $harga = new Harga();
        $data = [
            'solusi' => $solusi->countAll(),
            'fitur' => $fitur->countAll(),
            'harga' => $harga->countAll(),
        ];
        return view('content/home' , $data);
    }
    public function profile()
    {
        return view('content/profile');
    }


    // banner
    public function content()
    {
        helper(['form']);
        $banner = new Banner();
        $layout = new Layout();
        $footer = new Footer();
        $data = [
            'banner' => $banner->findAll(),
            'layout' => $layout->findAll(),
            'footer' => $footer->findAll(),
        ];


        return view('content/konten', $data);
    }

    // ------------------------


    // solusi
    public function solusi(): string
    {
        helper(['form']);
        $solusi = new Solusi();
        $headsolusi = new Headersolusi();

        $data = [
            'solusi' => $solusi->findAll(),
            'head' => $headsolusi->findAll(),
        ];
        // dd($head);
        return view('content/solusi', $data);
    }
    // ------------------------


    // fitur dan detail fitur 
    public function fitur()
    {
        helper(['form']);
        $fitur = new Fitur();
        $solusi = new Solusi();
        $data = [
            'fitur' => $fitur->findAll(),
            'solusi' => $solusi->findAll()
        ];

        return view('content/fitur', $data,);
    }

    public function detailfitur($id)
    {

        $fitur = new Fitur();
        $layout = new Layout();
        // $idF = $id;
        $data = [
            'fitur' => $fitur->findAll(),
            'idF' => $id,
            'layout' => $layout->findAll(2)
        ];
        return view('content/detail-fitur', $data);
    }
    // ------------------------

    public function paketharga(): string
    {
        helper(['form']);
        $harga = new Harga();
        $solusi = new Solusi();
        $data = [
            'paket_harga' => $harga->findAll(),
            'solusi' => $solusi->findAll()
        ];
        return view('content/paket-harga', $data);
    }

    public function benefit($id)
    {
        helper(['form']);
        $harga = new Harga();
        // $idB = $id
        $data = [
            'paketharga' => $harga->findAll(),
            'idB' => $id
        ];
        return view('content/benefit', $data);
    }
    public function artikel(): string
    {
        helper(['form']);
        $artikel = new Artikel();
        $headartikel = new Headerartikel();
        $data = [
            'artikel' => $artikel->findAll(),
            'head' => $headartikel->findAll()
        ];
        return view('content/artikel', $data);
    }
    public function tentangkami(): string
    {
        helper(['form']);
        $about = new Tentangkami();
        $headabout = new Headertentangkami();
        $data = [
            'tentang' => $about->findAll(),
            'head' => $headabout->findAll()
        ];
        return view('content/tentang-kami', $data);
    }
}
