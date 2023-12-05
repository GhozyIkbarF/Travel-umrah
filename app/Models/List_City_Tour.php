<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class List_City_Tour extends Model
{
    use HasFactory;

    protected $table = 'list_city_tours';
    protected $fillable = ['name'];
}
