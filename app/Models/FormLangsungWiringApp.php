<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLangsungWiringApp extends Model
{
    use HasFactory;

    protected $fillable = [
        'forms_id',
        'terminal1',
        'terminal2',
        'terminal3',
        'terminal4',
        'terminal5',
        'terminal6',
        'terminal7',
        'terminal8',
        'terminal9',
        'terminal11',
        'keterangan_wiring_app',
    ];
}
