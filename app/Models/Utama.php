<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utama extends Model
{
     use HasFactory, HasUuids;

    protected $fillable = [
        'foto1',
        'foto2',
        'foto3',
        'foto4',
        'foto5',
        'foto6',
    ];
}
