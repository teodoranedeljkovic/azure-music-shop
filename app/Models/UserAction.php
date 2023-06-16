<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAction extends Model
{
    public function users(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
