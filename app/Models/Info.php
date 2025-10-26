<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Info extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'image',
        'deskripsi',
        'email_bisnis',
        'email_label',
        'email_booking',
        'nomor_booking',
    ];
}
