<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $fillable = [
        'ar_title',
        'en_title',
        'ar_description',
        'en_description',
        'image',
        'images',
        'ar_usage',
        'en_usage',
        'status',
        'cate_id',
        'company_id',
        'created_By',
    ];
    protected $casts = [
        'images' => 'array',
    ];

    public function category()
    {

        return $this->belongsTo(category::class, 'cate_id');
    }
    public function company()
    {

        return $this->belongsTo(company::class, 'company_id');
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_By');
    }
}
