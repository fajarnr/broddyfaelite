<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Musik extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'link_direct',
        'judul',
        'ciptaan',
        'cover',
    ];
}
