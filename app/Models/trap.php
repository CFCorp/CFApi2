<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trap extends Model
{
    protected $table = 'trap';

    protected $fillable = [
        'url'
    ];
    use HasFactory;
}
