<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    
    // Assuming your table name is 'programs'
    protected $table = 'programs';
    protected $fillable=['file','description','name','requirements','steps'];

    // Define the 'files' relationship
    public function files()
    {
        return $this->hasMany(File::class);
    }

    
    public function section()
    {
        return $this->belongsTo(Section::class);
    }
  

    public function areas()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Area::class,
            'areas_programs',
            'program_id', // Foreign key in areas_programs table that links to programs
            'area_id'    // Foreign key in areas_programs table that links to areas
        );
    }   
}




