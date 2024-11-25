<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LatihanController extends Controller // class adalah blueprint dengan nama kelas LatihanController, extends mengacu pada Controller
{
    //method/function : kebisaan
    //visibilisasi : public, privat, static
    public function index()
    {
        return "Halo Kami Sedang Belajar Laravel";
    } //kalau dalam function bisa tidak menggunakan echo

    public function edit($id)
    {
        return "Ini Adalah form edit dengan nama params:" . $id;
    }

    public function delete($id)
    {
        return "Ini adalah form delete dengan params:" . $id;
    }
}
