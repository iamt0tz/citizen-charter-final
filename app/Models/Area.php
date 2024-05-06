<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';
    protected $fillable=['title','purpose'];


    public function programs()
    {  
        return $this->belongsToMany(
            Program::class,
            'areas_programs',
            'area_id',   // Foreign key in areas_programs table that links to areas
            'program_id' // Foreign key in areas_programs table that links to programs
        );
    }
}
