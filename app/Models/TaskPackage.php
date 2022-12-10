<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskPackage extends Model
{
    use HasFactory;
    protected $table = 'task_package';
    protected $primaryKey = 'taskpackageid';
    protected $fillable = ['username','content'];
}
