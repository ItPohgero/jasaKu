<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $fillable = ['invoice', 'client_id', 'worker_id', 'skill_id', 'date', 'phone', 'notes'];
}
