<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RangeNilai;

class RangeNilaiSeeder extends Seeder
{
    public function run(): void
    {
        $ranges = [
            ['min'=>10,'max'=>50,'rating'=>1,'keterangan'=>'Sangat Rendah'],
            ['min'=>51,'max'=>60,'rating'=>2,'keterangan'=>'Rendah'],
            ['min'=>61,'max'=>75,'rating'=>3,'keterangan'=>'Sedang'],
            ['min'=>76,'max'=>90,'rating'=>4,'keterangan'=>'Baik'],
            ['min'=>91,'max'=>100,'rating'=>5,'keterangan'=>'Sangat Baik'],
        ];

        foreach ($ranges as $r) {
            RangeNilai::create($r);
        }
    }
}
