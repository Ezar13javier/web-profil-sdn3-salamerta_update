<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'gambar',
        'tanggal_dipublikasikan',
        'user_id',
    ];

    protected $casts = [
        'tanggal_dipublikasikan' => 'datetime',
    ];
}
