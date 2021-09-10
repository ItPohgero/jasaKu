<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = ['code', 'name', 'province_id', 'regency_id',
        'district_id', 'user_id'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
