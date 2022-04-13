<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class neko extends Model
{
    protected $table = 'neko';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
