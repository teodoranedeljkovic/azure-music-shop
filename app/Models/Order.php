<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function albums(){
        return $this->hasOne(Album::class,'id','album_id');
    }

    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }

}
