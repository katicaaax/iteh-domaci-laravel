<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pastry extends Model
{
    protected $fillable = [
        'name',
        'ingredients',
        'user_id,'
    ];

    public $timestamps = false;

    public function categories()
    {
        return $this->belongsToMany(PastryCategory::class, 'pastry_pastry_category');
    }
}
