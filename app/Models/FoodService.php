<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodService extends Model
{
    use HasFactory;
    protected $table = 'food_service';
    protected $primaryKey = 'foodserviceid';
    protected $fillable = ['name', 'paypalemail', 'photo', 'rating', 'location'];
}
