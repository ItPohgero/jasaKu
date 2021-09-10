<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;


class Worker extends Model
{
    use HasFactory;

    protected $fillable = [
        'code', 'nik', 'born', 'province_id', 'regency_id',
        'district_id', 'user_id', 'desc'
    ];

    public function province(){
        return $this->belongsTo(Province::class);
    }

    public function regency(){
        return $this->belongsTo(Regency::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function requests(){
        return $this->hasMany(Request::class);
    }

}
