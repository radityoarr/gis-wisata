<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function tambahData()
    {
        return view('admin.tambah-data');
    }

    public function storeData(Request $request)
    {
        // Logika simpan data
        return back()->with('success', 'Data berhasil ditambahkan.');
    }
}

