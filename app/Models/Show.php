<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Show extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'tanggal',
        'name_acara',
        'tempat',
        'deskripsi',
        'tiket',
    ];
}
