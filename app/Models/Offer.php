<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cast_id',
        'area_id',
        'golf_course',
        'date',
        'start_at',
        'num_of_users',
        'num_of_women',
        'reserved',
    ];
}
