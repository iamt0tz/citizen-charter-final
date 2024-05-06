<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Division extends Model
{
    use HasFactory, SoftDeletes, CascadeSoftDeletes;

    
    protected $cascadeDeletes = ['sections'];
    protected $cascadeRestores = ['sections'];
 
   public function sections()
   {
       return $this->hasMany(Section::class);
   }

   public function users()
   {
       return $this->hasMany(User::class);
   }
}


