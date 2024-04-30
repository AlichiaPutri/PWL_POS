<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\BarangModel;

class BarangController extends Controller
{
    public function index(){
        return BarangModel::all()->load('kategori');
    }

    public function store(Request $request){
        $barang = BarangModel::create($request->all());
        return response()->json($barang,201);
    }

    public function show(BarangModel $barang){
        return $barang->load('kategori');
    }

    public function update(Request $request, BarangModel $barang){
        $barang->update($request->all());
        return $barang->load('kategori');
    }

    public function destroy(BarangModel $barang){
        $barang->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data terhapus'
        ]);
    }

}