<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function foto(){
        return $this->hasOne(Foto::class);
    }
}

