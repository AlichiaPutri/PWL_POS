<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        // All penjualan
        $penjualan = TransaksiModel::all();

        // Return Json Response
        return response()->json([
            'penjualan' => $penjualan
        ], 200);
    }

    public function store(Request $request)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'penjualan_id' => 'required',
            'user_id' => 'required',
            'pembeli' => 'required',
            'penjualan_kode' => 'required',
            'penjualan_tanggal' => 'required|date_format:Y-m-d',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'message' => $validator->errors()->first()
            ], 400);
        }

        try {
            // Create penjualan
            $penjualan = TransaksiModel::create([
                'penjualan_id' => $request->penjualan_id,
                'user_id' => $request->user_id,
                'pembeli' => $request->pembeli,
                'penjualan_kode' => $request->penjualan_kode,
                'penjualan_tanggal' => $request->penjualan_tanggal,
                'image' => $request->image->hashName(),
            ]);

            // Return Json Response
            return response()->json([
                'success' => true,
                'penjualan' => $penjualan,
            ], 200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'success' => false,
            ], 500);
        }
    }
    public function show($id)
    {
        $penjualan = TransaksiModel::find($id);
        if ($penjualan) {
            return response()->json($penjualan, 200);
        } else {
            return response()->json(['message' => 'Penjualan tidak ditemukan'], 404);
        }
    }

    public function update(Request $request, TransaksiModel $penjualan)
    {

        $penjualan->update($request->all());
        return $penjualan;

    }

    public function destroy(TransaksiModel $penjualan)
    {
        $penjualan->delete();
        return response()->json([
            "success" => true,
            "message" => 'Data terhapus'
        ]);
    }
}
