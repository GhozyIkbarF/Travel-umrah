<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Free extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'free';
    protected $fillable = ['name'];

    public function product()
    {
        return $this->belongsToMany(Product::class, 'product_free', 'free_id', 'product_id');
    }
}
