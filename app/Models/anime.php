<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class anime extends Model
{
    protected $table = 'anime';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
