<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class BelajarController extends Controller
{

    public function index()
    {
        $users = User::all();
        $users = User::orderBy('id', 'desc')->get();
        return view('belajar', compact('users'));
    }

    public function getCallName()
    {
        return $this->callName();
    }


    public function tambah()
    {
        return view('tambah');
    }

    public function kurang()
    {
        return view('kurang');
    }

    public function bagi()
    {
        return view('bagi');
    }

    public function kali()
    {
        return view('kali');
    }

    public function hasil_tambah(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 + $angka2;
        $data['jumlah'] = $jumlah;
        return view('tambah', compact('jumlah')); //compact akan mengubah data menjadi array
        // return view('tambah', $jumlah); //data harus array
        // return view('tambah', $data);
    }
    public function hasil_kurang(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 - $angka2;
        $data['jumlah'] = $jumlah;
        return view('kurang', compact('jumlah')); //compact akan mengubah data menjadi array
        // return view('tambah', $jumlah); //data harus array
        // return view('tambah', $data);
    }
    public function hasil_bagi(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 / $angka2;
        $data['jumlah'] = $jumlah;
        return view('bagi', compact('jumlah')); //compact akan mengubah data menjadi array
        // return view('tambah', $jumlah); //data harus array
        // return view('tambah', $data);
    }
    public function hasil_kali(Request $request)
    {
        $angka1 = $request->angka1;
        $angka2 = $request->input('angka2');

        $jumlah = $angka1 * $angka2;
        $data['jumlah'] = $jumlah;
        return view('kali', compact('jumlah')); //compact akan mengubah data menjadi array
        // return view('tambah', $jumlah); //data harus array
        // return view('tambah', $data);
    }
}
