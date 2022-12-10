<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    protected $table = 'food_item';
    protected $primaryKey = 'fooditemid';
    protected $fillable = [];
}
