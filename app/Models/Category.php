<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//tiene muchos nombre entidad 
//return $this->hasMany(Thread::class);
class Category extends Model
{
    use HasFactory;
    public function threads(){
        return $this->hasMany(Thread::class);
    }
}
