<?php

namespace App\Controllers;

use App\Models\Artikel;
use App\Models\Fitur;
use App\Models\Banner;
use App\Models\Footer;
use App\Models\Harga;
use App\Models\Headerartikel;
use App\Models\Headersolusi;
use App\Models\Headertentangkami;
use App\Models\Layout;
use App\Models\Solusi;
use App\Controllers\BaseController;
use App\Models\Tentangkami;

class Home extends BaseController
{
    public function __construct()
    {
        $this->model = new Banner();
    }
    public function index(): string
    {
        return view('content/home');
    }


    // banner
    public function content()
    {
        helper(['form']);
        $banner = new Banner();
        $footer = new Footer();
        $data = [
            'banner' => $banner->findAll(),
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

        return view('content/fitur', $data, );
    }

    public function detailfitur($id)
    {

        $fitur = new Fitur();
        $layout = new Layout();
        // $idF = $id;
        $data = [
            'fitur' => $fitur->findAll(),
            'idF' => $id,
            'layout' => $layout->findAll()
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
        return view('content/benefit' , $data);
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
        return view('content/tentang-kami' , $data);
    }
}
