<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('content/home');
    }

    public function login(): string
    {
        return view('login');
    }

    public function content(): string
    {
        helper(['form']);
        return view('content/konten');

    }

    public function solusi(): string
    {
        return view('content/solusi');
    }

    public function fitur(): string
    {
        return view('content/fitur');
    }
}
