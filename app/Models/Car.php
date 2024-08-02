<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    use HasFactory;
    Use softDeletes;

    protected $table = ('cars');
    protected $fillable = [
        'cartitle',
        'description',
        'price',
        'image',
        'published',
    ];
    
    }

