<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryWorker extends Model
{
    use HasFactory;
    protected $table = 'delivery_workers';
    protected $primaryKey = 'deliveryworkerid';


}
