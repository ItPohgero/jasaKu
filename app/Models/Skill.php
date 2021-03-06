<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug'];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function requests(){
        return $this->hasMany(Request::class);
    }
}
