<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dva extends Model
{
    protected $table = 'anime';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
