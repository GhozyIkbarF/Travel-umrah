<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'promo';
    protected $fillable = ['name'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_promo', 'promo_id', 'product_id');
    }
}
