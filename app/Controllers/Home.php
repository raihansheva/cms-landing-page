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
    public function __construct() {
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
        $data =[
            'banner' => $banner->findAll(),
        ];
        

        return view('content/konten',$data);
    }

    // ------------------------


    // solusi
    public function solusi(): string
    {
        helper(['form']);
        $solusi = new Solusi();
        $headsolusi = new Headersolusi();
        
        $data =[
            'solusi' => $solusi->findAll(),
            'head' => $headsolusi->findAll(),
        ];
        // dd($head);
        return view('content/solusi' , $data);
    }
    // ------------------------


    // fitur dan detail fitur 
    public function fitur(): string
    {
        helper(['form']);
        $fitur = new Fitur();
        $data = [
            'fitur' => $fitur->findAll()
        ];
        return view('content/fitur' , $data);
    }

    public function detailfitur(): string
    {
        return view('content/detail-fitur');
    }
    // ------------------------

    public function paketharga(): string
    {
        helper(['form']);
        $harga = new Harga();

        $data = [
            'paket_harga' => $harga->findAll()
        ];
        return view('content/paket-harga' , $data);
    }

    public function benefit(): string
    {
        helper(['form']);
        // $harga = new Harga();

        // $data = [
        //     'paket_harga' => $harga->findAll()
        // ];
        return view('content/benefit' );
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
        return view('content/artikel' ,$data );
    }
}
