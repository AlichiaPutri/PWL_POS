<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kategori_id' => 1, 'kategori_kode' => 'ATK', 'kategori_nama' => 'Alat Tulis Kantor'],
            ['kategori_id' => 2, 'kategori_kode' => 'ART', 'kategori_nama' => 'Alat Rumah Tangga'],
            ['kategori_id' => 3, 'kategori_kode' => 'SKCARE', 'kategori_nama' => 'Skincare'],
            ['kategori_id' => 4, 'kategori_kode' => 'BBYCARE', 'kategori_nama' => 'Baby Care'],
            ['kategori_id' => 5, 'kategori_kode' => 'BDYCARE', 'kategori_nama' => 'Body Care'],
        ];
        DB::table('m_kategori')->insert($data);
    }
}
