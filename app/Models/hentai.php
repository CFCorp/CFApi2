<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hentai extends Model
{
    protected $table = 'hentai';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
