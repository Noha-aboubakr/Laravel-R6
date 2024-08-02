<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class classe extends Model
{
    use HasFactory;
    Use softDeletes;

    protected $table = ('classes');
    protected $fillable = [
        'classname',
        'capacity',
        'price',
        'timefrom',
        'timeto',
        'image',
        'isfulled',
    ];
}
