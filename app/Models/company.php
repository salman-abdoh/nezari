<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'ar_country',
        'en_country',
        'image',
        'status',




    ];
    public function product(){

        return $this->hasMany(products::class,'company_id');
    }

}
