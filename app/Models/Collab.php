<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Collab extends Model
{
     use HasFactory, HasUuids;

    protected $fillable = [
        'banner',
        'judul',
        'tahun',
        'image1',
        'image2',
        'image3',
        'deskripsi',
    ];
}
