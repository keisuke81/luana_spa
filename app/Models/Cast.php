<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'nickname',
        'birthday',
        'img_url',
        'best_score',
        'occupation',
        'length_of_golf',
        'possible_date_round',
        'anyone_together',
        'transportation',
        'self_produce',
        'message',
        'provider',
        'line_id'
    ];
}
