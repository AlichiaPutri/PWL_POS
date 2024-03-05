<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {   
        $tanggal = Carbon::now();
        $data = [
            ['penjualan_id' => 1, 'user_id' => 3, 'pembeli' => 'Andi', 'penjualan_kode' => 1, 'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 2, 'user_id' => 3, 'pembeli' => 'Citra','penjualan_kode' => 2, 'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 3, 'user_id' => 3, 'pembeli' => 'Bunga','penjualan_kode' => 3, 'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 4, 'user_id' => 3, 'pembeli' => 'Juan', 'penjualan_kode' => 4, 'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 5, 'user_id' => 3, 'pembeli' => 'Nina', 'penjualan_kode' => 5, 'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 6, 'user_id' => 3, 'pembeli' => 'Rizki', 'penjualan_kode' => 6, 'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 7, 'user_id' => 3, 'pembeli' => 'Jeno', 'penjualan_kode' => 7,  'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 8, 'user_id' => 3, 'pembeli' => 'Ridho', 'penjualan_kode' => 8, 'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 9, 'user_id' => 3, 'pembeli' => 'Alexa', 'penjualan_kode' => 9, 'penjualan_tanggal' => $tanggal],
            ['penjualan_id' => 10, 'user_id' => 3,'pembeli' => 'Putri', 'penjualan_kode' => 10, 'penjualan_tanggal' => $tanggal],
        ];
        DB::table('t_penjualan')->insert($data);
        
    }
}
