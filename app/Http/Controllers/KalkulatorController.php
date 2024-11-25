<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KalkulatorController extends Controller
{
    public function index()
    {
        return view('kalkulator.index'); //"." adalah pembatas folder dan path
    }

    public function storeTambah(Request $request) //request bawaan dari laravel
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $jumlah =  $angka1 + $angka2;
        $title = "hasil dari " . $angka1 . " + " . $angka2 . "adalah : " . $jumlah;
        return view('kalkulator.tambah', compact('jumlah', 'title'));
    }

    public function tambah()
    {
        $title = "Form Tambah";
        $jumlah = 0;
        return view('kalkulator.tambah', compact('title', 'jumlah')); //compact digunakan untuk melempar data ke view
    }

    public function kurang()
    {
        $title = "Form Kurang";
        $jumlah = 0;
        return view('kalkulator.kurang', compact('title', 'jumlah'));
    }
    public function storeKurang(Request $request) //request bawaan dari laravel
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $jumlah =  $angka1 - $angka2;
        $title = "hasil dari " . $angka1 . " - " . $angka2 . "adalah : " . $jumlah;
        return view('kalkulator.kurang', compact('jumlah', 'title'));
    }

    public function bagi()
    {
        $title = "Form Bagi";
        $jumlah = 0;
        return view('kalkulator.bagi', compact('title', 'jumlah'));
    }
    public function storeBagi(Request $request) //request bawaan dari laravel
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $jumlah =  $angka1 / $angka2;
        $title = "hasil dari " . $angka1 . " / " . $angka2 . "adalah : " . $jumlah;
        return view('kalkulator.bagi', compact('jumlah', 'title'));
    }

    public function kali()
    {
        $title = "Form Kali";
        $jumlah = 0;
        return view('kalkulator.kali', compact('title', 'jumlah'));
    }
    public function storeKali(Request $request) //request bawaan dari laravel
    {
        $angka1 = $request->angka1;
        $angka2 = $request->angka2;
        $jumlah =  $angka1 * $angka2;
        $title = "hasil dari " . $angka1 . " * " . $angka2 . "adalah : " . $jumlah;
        return view('kalkulator.kali', compact('jumlah', 'title'));
    }
}
