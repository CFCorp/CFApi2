<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class baguette extends Model
{
    protected $table = 'baguette';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
