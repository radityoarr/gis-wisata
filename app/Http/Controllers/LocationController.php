<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $locations = Location::all();
        return response()->json($locations);
    }
    public function dashboard()
    {
        $jumlahLokasi = Location::count(); 
        return view('admin.dashboard', compact('jumlahLokasi'));
    }
    public function dataWisata()
    {
        $locations = Location::all(); 
        return view('data-wisata', compact('locations')); 
    }
    public function show($id)
    {
        $location = Location::findOrFail($id);
        return view('detail-wisata', compact('location'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'jam_operasional' => 'required|string',
            'fasilitas' => 'required|string',
            'harga_tiket' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048', 
        ]);
    
        $thumbnailPath = null;
        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('images', 'public'); 
        }
    
        Location::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'jam_operasional' => $request->jam_operasional,
            'harga_tiket' => $request->harga_tiket,
            'fasilitas' => $request->fasilitas,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'thumbnail' => $thumbnailPath, 
        ]);
    
        return redirect()->route('admin.data-wisata')->with('success', 'Data wisata berhasil ditambahkan!');
    }
    public function edit($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.ubah-data', compact('location'));
    }
    public function update(Request $request, $id)
    {
        $location = Location::findOrFail($id);
        
        $location->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'jam_operasional' => $request->jam_operasional,
            'harga_tiket' => $request->harga_tiket,
            'fasilitas' => $request->fasilitas,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,

        ]);

        return redirect()->route('admin.data-wisata')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy($id)
    {
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('admin.data-wisata')->with('success', 'Data berhasil dihapus');
    }

}