<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PastryCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description'
    ];

    public $timestamps = false;

    public function pastries()
    {
        return $this->belongsToMany(Pastry::class, 'pastry_pastry_category');
    }
}
