<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $table = 'packages';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price_double',
        'price_triple',
        'price_quad',
        'rating_hotel_makkah',
        'rating_hotel_madinah',
        'city_tour',
        'is_plus',
         ];

    public function city_tour()
    {
        return $this->belongsTo(List_City_Tour::class, 'city_tour', 'name');
    }

    public function product()
    {
        return $this->hasMany(Product::class, 'package_id', 'id');
    }
}
