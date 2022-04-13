<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nsfwneko extends Model
{
    protected $table = 'nsfwneko';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
