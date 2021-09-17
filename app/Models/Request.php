<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Request extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['invoice', 'client_id', 'worker_id', 'skill_id', 'date', 'phone','point', 'status', 'notes', 'offer'];

    public function worker(){
        return $this->belongsTo(Worker::class);
    }

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function skill(){
        return $this->belongsTo(Skill::class);
    }
}
