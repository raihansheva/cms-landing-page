<?php

namespace App\Controllers;
use App\Models\Fitur;
use App\Models\Banner;
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
        return view('content/konten');
    }

    // public function tampilcontent()
    // {
    //     // helper(['form']);
    //     $banner = new Banner();
    //     $data = [
    //         'banner' => $banner->findAll()
    //     ];
    //     // dd($data);
    //     $output = view('content/konten' , $data);
    //     echo json_encode($output);
    //     // return view('content/konten' ,$data);
    // }
    // ------------------------


    // solusi
    public function solusi(): string
    {
        helper(['form']);
        $solusi = new Solusi();
        $data =[
            'solusi' => $solusi->findAll()
        ];
        return view('content/solusi' , $data );
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
}
