<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class about extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_intro',
        'en_intro',
        'ar_vision',
        'en_vision',
        'ar_target',
        'en_target',
        'ar_mision',
        'en_mision',



    ];
}
