<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkAttachmentImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'works_id',
        'path',
    ];
}
