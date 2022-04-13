<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hug extends Model
{
    protected $table = 'hug';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
