<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    //

    public function index()
    {
        $sections = Division::with('sections')->get();
        
        return view('section',compact('sections')); 

        
        
    }
}
