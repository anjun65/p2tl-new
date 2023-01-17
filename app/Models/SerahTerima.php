<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SerahTerima extends Model
{
    use HasFactory;

    protected $fillable = [
        'works_id',
        'no_ba',
        'tanggal_serah_terima',
    ];
}
