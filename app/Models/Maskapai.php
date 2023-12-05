<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maskapai extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
    ];

    public function product()
    {
        return $this->hasMany(Product::class, 'maskapai');
    }
}
