<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        $title = 'ini halaman belajar';

        return view('belajar', compact('title'));
    }

    public function pertambahan()
    {
        $title = 'ini halaman pertambahan';

        return view('pertambahan', compact('title'));
    }

    public function actionTambah(Request $nilai)
    {
        $angka1 = $nilai->angka1;
        $angka2 = $nilai->angka2;
        $jumlah = $angka1 + $angka2;

        return view('pertambahan', compact('jumlah'));
    }

    public function perkurangan()
    {
        $title = 'ini halaman perkurangan';

        return view('perkurangan', compact('title'));
    }

    public function actionKurang(Request $nilai)
    {
        $title = 'ini halaman perkurangan';
        $angka1 = $nilai->angka1;
        $angka2 = $nilai->angka2;
        $jumlah = $angka1 - $angka2;

        return view('perkurangan', compact('jumlah', 'title'));
    }

    public function pembagian()
    {

        $title = 'ini halaman pembagian';

        return view('pembagian', compact('title'));
    }

    public function actionPembagian(Request $nilai)
    {
        $title = 'ini halaman pembagian';
        $angka1 = $nilai->angka1;
        $angka2 = $nilai->angka2;
        $bagi = $angka1 / $angka2;

        return view('pembagian', compact('bagi', 'title'));
    }

    public function perkalian()
    {
        $title = 'ini halaman perkalian';

        return view('perkalian', compact('title'));
    }

    public function actionPerkalian(Request $nilai)
    {
        $title = 'ini halaman perkalian';
        $angka1 = $nilai->angka1;
        $angka2 = $nilai->angka2;
        $kali = $angka1 * $angka2;

        return view('perkalian', compact('kali', 'title'));
    }
}
