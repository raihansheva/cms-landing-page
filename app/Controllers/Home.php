<?php

namespace App\Controllers;

use App\Models\Artikel;
use App\Models\Fitur;
use App\Models\Banner;
use App\Models\Harga;
use App\Models\Headerartikel;
use App\Models\Headersolusi;
use App\Models\Solusi;
use App\Controllers\BaseController;

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
        $data = [
            'banner' => $banner->findAll(),
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

    public function detailfitur(): string
    {

        $fitur = new Fitur();
        $data = [
            'fitur' => $fitur->findAll(),
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

    public function benefit(): string
    {
        helper(['form']);
        $harga = new Harga();

        $data = [
            'paketharga' => $harga->findAll()
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
        // $artikel = new Artikel();
        // $headartikel = new Headerartikel();
        // $data = [
        //     'artikel' => $artikel->findAll(),
        //     'head' => $headartikel->findAll()
        // ];
        return view('content/tentang-kami');
    }
}
