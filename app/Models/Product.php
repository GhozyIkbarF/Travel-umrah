<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected  $fillable = [
        'date',
        'image',
        'maskapai',
        'price_double',
        'price_triple',
        'price_quad',
        'hotel_makkah',
        'hotel_madinah',
        'rating_hotel_plus',
        'kuota',
        'package_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class, 'package_id');
    }

    public function relasi_maskapai()
    {
        return $this->belongsTo(Maskapai::class, 'maskapai');
    }

    public function relasi_hotel_makkah()
    {
        return $this->belongsTo(Hotel::class, 'hotel_makkah');
    }

    public function relasi_hotel_madinah()
    {
        return $this->belongsTo(Hotel::class, 'hotel_madinah');
    }

    public function free()
    {
        return $this->belongsToMany(Free::class, 'product_free', 'product_id', 'free_id');
    }

    public function promo()
    {
        return $this->belongsToMany(Promo::class, 'product_promo', 'product_id', 'promo_id');
    }
}
