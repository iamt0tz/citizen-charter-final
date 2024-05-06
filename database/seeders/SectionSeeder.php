<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
      
    {
        $sections = [
        ['name'=>'Data Management and Integration Section',
        'description'=>'DMIS',
        'division_id'=> 2,
        ],

        ['name'=>'General Services Management Section',
        'description'=>'GSMS',
        'division_id'=> 1,
        ],

        ['name'=>'Procurement Management Section',
        'description'=>'PMS',
        'division_id'=> 1,
        ],

        ['name'=>'Property and Asset Management Section',
        'description'=>'PAMS',
        'division_id'=> 1,
        ],


        ['name'=>'Property and Asset Section',
        'description'=>'PSS',
        'division_id'=> 1,
        ],

        ['name'=>'Records and Archives Management Section',
        'description'=>'RAMS',
        'division_id'=> 1,
        ],

        ['name'=>'Disaster Response and Rehabilitation Section',
        'description'=>'DRRS',
        'division_id'=> 3,
        ],

        ['name'=>'Accounting Section',
        'description'=>'AS',
        'division_id'=> 4,
        ],

        ['name'=>'Budget Section',
        'description'=>'BS',
        'division_id'=> 4,
        ],

        ['name'=>'HR Welfare Section',
        'description'=>' ',
        'division_id'=>5,
        ],

        ['name'=>'Human Resource Planning and Performance Management Section',
        'description'=>'HRPPMS',
        'division_id'=> 5,
        ],

        ['name'=>'Personnel Administration Section',
        'description'=>'PAS',
        'division_id'=> 5,
        ],

        ['name'=>'Social Marketing Section',
        'description'=>'SMS',
        'division_id'=> 6,
        ],
        
        ['name'=>'Social Technology Unit',
        'description'=>'STU',
        'division_id'=> 6,
        ],
        
        ['name'=>'Information and Communications Technology Section',
        'description'=>'ICTS',
        'division_id'=> 7,
        ],
        
        ['name'=>'National Household Targeting Section',
        'description'=>'NHTS',
        'division_id'=> 7,
        ],
        
        ['name'=>'Standards Section',
        'description'=>'SS',
        'division_id'=> 7,
        ],
        
        ['name'=>'Sustainable Livelihood Program Regional Program Management Office',
        'description'=>'SLP',
        'division_id'=> 8,
        ],
        
        ['name'=>'Center and Residential Care Facilities',
        'description'=>'CRCF',
        'division_id'=> 9,
        ],
        
        ['name'=>'Crisis Intervention Section',
        'description'=>'CIS',
        'division_id'=> 9,
        ],
        
        ['name'=>'Recovery and Reintegration Program for Trafficked Persons',
        'description'=>'RRPTP',
        'division_id'=> 9,
        ],
        
        ['name'=>'Social Pension Program',
        'description'=>' ',
        'division_id'=> 9,
        ],
        
        ['name'=>'Welfare and Development Cebu',
        'description'=>'SWAD',
        'division_id'=> 9,
        ],
        
        ['name'=>'Capability Building Section',
        'description'=>'CBS',
        'division_id'=> 9,
        ],

        ['name'=>'Community Based Programs',
        'description'=>'CBS',
        'division_id'=> 9,
        ],

    ];        

    foreach ($sections as $key => $sections) {
                Section::create($sections);
            }

    }
}
