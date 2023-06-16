<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public function price(){
        return $this->hasOne(Price::class);
    }

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function artist(){
        return $this->belongsTo(Artist::class);
    }
}
