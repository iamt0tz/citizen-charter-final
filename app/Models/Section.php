<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    public function programs()
    {
        return $this->hasMany(Program::class);
    }
    
 }
 

 

