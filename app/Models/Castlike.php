<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Castlike extends Model
{
    use HasFactory;

    protected $table = 'castlikes';
    public $timestamps = false;
    protected $guarded = [];
}
