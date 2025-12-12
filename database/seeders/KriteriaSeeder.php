<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Kriteria;

class KriteriaSeeder extends Seeder
{
    public function run(): void
    {
        Kriteria::insert([
        ['kode'=>'C1','nama'=>'Kehadiran','tipe'=>'benefit','bobot'=>0.35,'aktif'=>1],
        ['kode'=>'C2','nama'=>'Kedisiplinan','tipe'=>'benefit','bobot'=>0.25,'aktif'=>1],
        ['kode'=>'C3','nama'=>'Tanggung Jawab','tipe'=>'benefit','bobot'=>0.25,'aktif'=>1],
        ['kode'=>'C4','nama'=>'Kerja Sama','tipe'=>'benefit','bobot'=>0.15,'aktif'=>1],
    ]);
    }
}

