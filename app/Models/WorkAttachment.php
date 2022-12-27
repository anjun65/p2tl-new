<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkAttachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'id_pelanggan',
    ];
}
