<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembukaanBarangBukti extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'status',
    ];
}
