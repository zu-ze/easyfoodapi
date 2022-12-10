<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTask extends Model
{
    use HasFactory;
    protected $table = 'delivery_task';
    protected $primaryKey = 'deliverytaskid';
    protected $fillable = [];
}
