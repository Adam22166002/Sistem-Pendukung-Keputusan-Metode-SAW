<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    protected $table = 'kriteria';

    protected $fillable = [
        'kode','nama','deskripsi','tipe','bobot','aktif'
    ];

    public function detail()
    {
        return $this->hasMany(DetailPenilaian::class, 'kriteria_id');
    }
}
