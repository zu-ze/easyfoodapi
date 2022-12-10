<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'orderitemid';
    protected $table = 'order_item';
    protected $fillable = ['username','content'];
}
