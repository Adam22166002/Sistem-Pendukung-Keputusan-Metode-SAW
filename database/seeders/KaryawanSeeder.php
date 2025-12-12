<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['kode_karyawan'=>'A1','nama'=>'Aprilia Tri Utami','status'=>'aktif'],
            ['kode_karyawan'=>'A2','nama'=>'Danar Wahyu Murdoko','status'=>'aktif'],
            ['kode_karyawan'=>'A3','nama'=>'Styawati','status'=>'aktif'],
            ['kode_karyawan'=>'A4','nama'=>'Dedi Nur Setiawan','status'=>'aktif'],
            ['kode_karyawan'=>'A5','nama'=>'Ananda Irfan Ikhsanudin','status'=>'aktif'],
            ['kode_karyawan'=>'A6','nama'=>'Lulik Kurnia','status'=>'aktif'],
            ['kode_karyawan'=>'A7','nama'=>'Nurdin Arif','status'=>'aktif'],
            ['kode_karyawan'=>'A8','nama'=>'Fajar Rohmadi','status'=>'aktif'],
            ['kode_karyawan'=>'A9','nama'=>'Razkya Putri Ayunda','status'=>'aktif'],
            ['kode_karyawan'=>'A10','nama'=>'Rosiyanti Ningsih','status'=>'aktif'],
            ['kode_karyawan'=>'A11','nama'=>'Sabela Kurnia Sari','status'=>'aktif'],
            ['kode_karyawan'=>'A12','nama'=>'Putri Agustin','status'=>'aktif'],
            ['kode_karyawan'=>'A13','nama'=>'Mega Handayani','status'=>'aktif'],
            ['kode_karyawan'=>'A14','nama'=>'Cecep Agus Suryana','status'=>'aktif'],
            ['kode_karyawan'=>'A15','nama'=>'Tunggul Pribadi','status'=>'aktif'],
            ['kode_karyawan'=>'A16','nama'=>'Mahesa Sanjaya','status'=>'aktif'],
            ['kode_karyawan'=>'A17','nama'=>'Abian Aksa Putra','status'=>'aktif'],
            ['kode_karyawan'=>'A18','nama'=>'Handayani Putri Larasati','status'=>'aktif'],
            ['kode_karyawan'=>'A19','nama'=>'Andini Sholeha','status'=>'aktif'],
            ['kode_karyawan'=>'A20','nama'=>'Widodo Rahayu','status'=>'aktif'],
            ['kode_karyawan'=>'A21','nama'=>'Agung Budi Pamungkas','status'=>'aktif'],
            ['kode_karyawan'=>'A22','nama'=>'Ikhwan Syarif','status'=>'aktif'],
            ['kode_karyawan'=>'A23','nama'=>'Dwi Candra Saputra','status'=>'aktif'],
            ['kode_karyawan'=>'A24','nama'=>'Tri Hartanto B.','status'=>'aktif'],
            ['kode_karyawan'=>'A25','nama'=>'Desti Anggaraini','status'=>'aktif'],
            ['kode_karyawan'=>'A26','nama'=>'Rohmati','status'=>'aktif'],
            ['kode_karyawan'=>'A27','nama'=>'Dwi Irfan Ardiyanto','status'=>'aktif'],
            ['kode_karyawan'=>'A28','nama'=>'Muhammad Al Ghifari','status'=>'aktif'],
            ['kode_karyawan'=>'A29','nama'=>'Sifa Ayu Lestari','status'=>'aktif'],
            ['kode_karyawan'=>'A30','nama'=>'Puspita Sari','status'=>'aktif'],
            ['kode_karyawan'=>'A31','nama'=>'Septiana Putri','status'=>'aktif'],
        ];

        foreach ($data as $item) {
            Karyawan::create($item);
        }
    }
}
