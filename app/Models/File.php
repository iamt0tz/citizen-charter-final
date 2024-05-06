<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    // Assuming your table name is 'files'
    protected $table = 'files';
    protected $fillable=['id'];
    // Define the relationship with the Program model
    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
