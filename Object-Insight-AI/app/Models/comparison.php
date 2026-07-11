<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class comparison extends Model
{
    protected $fillable=[
    'user_id',
    'image_one',
    'image_two',
    'object_one',
    'object_two',
    'differences',
    'similarities',
    'comparison_result'];
}
