<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RangeNilai extends Model
{
    protected $table = 'range_nilai';

    protected $fillable = [
        'min','max','rating','keterangan',
    ];
}
