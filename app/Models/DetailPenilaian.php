<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPenilaian extends Model
{
    protected $table = 'detail_penilaian';

    protected $fillable = [
        'penilaian_id','kriteria_id',
        'skor_asli','skor_normalisasi','skor_terbobot'
    ];

    public function penilaian()
    {
        return $this->belongsTo(Penilaian::class, 'penilaian_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}

