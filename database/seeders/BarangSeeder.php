<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 3, 'barang_kode' => 'MTZ', 'barang_nama' => 'Moisturizer', 'harga_beli' => '20000', 'harga_jual' => '25000'],
            ['barang_id' => 2, 'kategori_id' => 3, 'barang_kode' => 'SSN', 'barang_nama' => 'Sunscreen', 'harga_beli' => '50000', 'harga_jual' => '55000'],
            ['barang_id' => 3, 'kategori_id' => 3, 'barang_kode' => 'SRM', 'barang_nama' => 'Serum', 'harga_beli' => '75000', 'harga_jual' => '70000'],
            ['barang_id' => 4, 'kategori_id' => 3, 'barang_kode' => 'TNR', 'barang_nama' => 'Toner', 'harga_beli' => '15000', 'harga_jual' => '18000'],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'FCW', 'barang_nama' => 'Facial Wash', 'harga_beli' => '30000', 'harga_jual' => '50000'],
            ['barang_id' => 6, 'kategori_id' => 4, 'barang_kode' => 'BTLS', 'barang_nama' => 'Botol Susu', 'harga_beli' => '40000', 'harga_jual' => '50000'],
            ['barang_id' => 7, 'kategori_id' => 5, 'barang_kode' => 'HNDBY', 'barang_nama' => 'Hand Body', 'harga_beli' => '10000', 'harga_jual' => '12000'],
            ['barang_id' => 8, 'kategori_id' => 5, 'barang_kode' => 'SBN', 'barang_nama' => 'Sabun', 'harga_beli' => '20000', 'harga_jual' => '25000'],
            ['barang_id' => 9, 'kategori_id' => 1, 'barang_kode' => 'PN', 'barang_nama' => 'Pena', 'harga_beli' => '1500', 'harga_jual' => '2000'],
            ['barang_id' => 10, 'kategori_id' => 1,'barang_kode' => 'BK', 'barang_nama' => 'Buku', 'harga_beli' => '2000', 'harga_jual' => '3000'],
        ];
        DB::table('m_barang')->insert($data);
        
    }
}

