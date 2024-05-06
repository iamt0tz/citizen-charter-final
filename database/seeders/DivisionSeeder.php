<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $name = [
            ['name'=>'Administrative Division', 'description'=> 'AD'],
            ['name'=>'Pantawid Pamilyang Pilipino Program','description'=>'4Ps'],
            ['name'=>'Disaster Response Management Division','description'=>'DRMD'],
            ['name'=>'Finance Management Division','description'=>'FMD'],
            ['name'=>'Human Resource Management & Development Division','description'=>'HRMDD'],
            ['name'=>'Office of the Regional Director','description'=>'ORD'],
            ['name'=>'Policy & Plans Division','description'=>'PPD'],
            ['name'=>'Promotive Services Division','description'=>'Promotive'],
            ['name'=>'Protective Services Division','description'=>'PSD'],
        ];
    
        foreach ($name as $key => $name) {
            Division::create($name);
        }
    }
}
