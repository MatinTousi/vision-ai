<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Object_Analyse extends Model
{
    protected $table = 'object_analyses';
    protected $fillable = [
        'user_id',
        'image',
        'object_name',
        'category',
        'confidence',
        'description',
        'history',
        'usage'
    ];
}
