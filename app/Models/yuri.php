<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class yuri extends Model
{
    protected $table = 'yuri';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
