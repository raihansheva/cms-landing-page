<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('content/home');
    }


    // banner
    public function content(): string
    {
        helper(['form']);
        return view('content/konten');

    }
    // ------------------------


    // solusi
    public function solusi(): string
    {
        return view('content/solusi');
    }
    // ------------------------


    // fitur dan detail fitur 
    public function fitur(): string
    {
        return view('content/fitur');
    }

    public function detailfitur(): string
    {
        return view('content/detail-fitur');
    }
    // ------------------------
}
