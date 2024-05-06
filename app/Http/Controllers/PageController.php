<?php
namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Displays;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use App\Models\Division;
// use App\Models\File;
use App\Models\Program;
use App\Models\Section;
use Database\Factories\ProgramFactory;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\View;

class PageController extends Controller
{
    

        public function index()
        { 
                
                // $data=Division::all();
                return view('index');
         
        }

        public function home()
        { 
            $data = Division:: 
            // whereNotIn('id', [13, 14, 15])
             orderBy('name')
            ->get();

            return view('home', compact('data'));
         
        }
         

        public function manageIndex()
        { 
                
                // $data=Division::all();
                return view('manage/index');
         
        }



        public function sectionlist(Request $request)
        {
                $data=Section::orderBy('name')->with('division')->get();
                 
                return view('sectionlist',compact('data'));
        }

        // public function programlist(Request $request)
        // {
        //         $data=Program::all();

        //         $query = $request->input('query'); 
        //         $programs = Program::where('name', 'LIKE', '%' . $query . '%')->simplePaginate(50);  
        //         return view('programlist',compact('data','programs'));
        // }

        public function showDropdown()
        {
            $divisions = Division::with('sections.programs')->get(); 
            return view('upload', compact('divisions'));
        }
 
        public function save(Request $request)
        {
            $request->validate([
                    'division' => 'required',
                    'section' => 'required', 
                    'file' => 'required|mimes:pdf',  
                ]);

                
            $selectedSectionId = $request->input('selected_section');

            // dd($selectedSectionId);

            $section = Section::find($selectedSectionId);
            if (!$section) {
                return back()->with('error',  'No file uploaded.');
            }
            
            // Check if there is an existing file associated with the program
            // if ($section->file) {
            //     return back()->with('error', 'A file is already associated with this program. Please delete the previous file first.');
            // }

            // Find the selected program
            // $program = Program::find($selectedProgramId);
            //     // $program = new Program;
             
            if($request->hasfile('file'))
            {
                $file = $request->file('file');
                $extention = $file->getClientOriginalExtension();
                $filename = time().'.'.$extention;
                $file->move('uploads/files/', $filename);
                $section->file = $filename; 
            }
  
            $section->save();
            return redirect()->back()->with('success', 'File uploaded successfully.');
        }
  
     
        public function viewSection($id)
        {  
            $data = Section::with('programs') 
            ->where('sections.division_id', '=', $id) 
            ->where('sections.has_external', '=', 1) 
            ->groupBy('sections.id')
            ->get(); 

            // $division = Division::find($id)->get('name');
            
            $division = Division::where('id', $id)->get('name')->first();
            

            // dd($division);
            return view('section',compact('data','division' ));  
             
 
        }

   


        // CIS, SWADs custom views
        public function list_psd() 
        { 
            $excludedData =[19,24];

            $data = Section::with('programs','division')  
            ->where('sections.division_id', '=', 9)  
            // ->whereNotIn('sections.id', $excludedData)
            ->groupBy('sections.id')
            ->get();  
    
            return view('psd.index',compact('data'));
        }
        
        public function showFile($id)
        {
                $data = DB::table('sections')
                ->select('file') 
                ->where('id', '=', $id) 
                ->get();
    
                return view('psd.file',compact('data' ));   
        } 

//   {
        public function list_swad_bohol()
        {
            $data = Section::with('programs','division')  
            ->where('sections.division_id', '=', 13)  
            ->groupBy('sections.id')
            ->get();  
    
            // dd($data);
            return view('psd.index',compact('data'));
        }

        public function list_swad_siquijor()
        {
            $data = Section::with('programs','division')  
            ->where('sections.division_id', '=', 15)  
            ->groupBy('sections.id')
            ->get();  
    
            // dd($data);
            return view('psd.index',compact('data'));
        }
        

        public function list_swad_negros()
        {
            $data = Section::with('programs','division')  
            ->where('sections.division_id', '=', 14)  
            ->groupBy('sections.id')
            ->get();  
    
            // dd($data);
            return view('psd.index',compact('data'));
        }


//         //ongoing
//         // public function create_view()
//         // {

//         //     $programs = Program::all();

//         //     return view('create_view',compact('programs','programs'));
 
//         // }
        

//         // public function storeView(Request $request ) 
//         // {  

//         //     $request->validate([
//         //         'title' => 'required|string|max:255',
//         //         'purpose' => 'required|string',
//         //         'selectedProgramIds' => 'required|array',
//         //     ]);

//         //     $areas = Area::create([
//         //         'title' => $request->input('title'),
//         //         'purpose' => $request->input('purpose'),
//         //     ]);
    
//         //     // Attach the selected programs to the new area
//         //     $selectedProgramIds = $request->input('selectedProgramIds');
//         //     $areas->programs()->attach($selectedProgramIds);

//         //     return redirect()->back()->with('success', 'Area created successfully');
    
 
//         // }
 
        
//         // public function managesection()
//         // { 
//         //     $sections=Section::orderBy('division_id')->with('division')->get();
//         //     // dd($sections);
//         //     return view('manage.sections',compact('sections'));
//         // }

                
//         // public function manageprograms()
//         // { 
//         //     $divisions = Division::all();
//         //     $sections = Section::all();
//         //     $programs = Program::all();

//         //     return view('manage.programs',compact('divisions','sections','programs'));
//         // }

//         // public function editsection($id)
//         // {  
//         //     $sections = Section::all();
//         //     $divisions = Division::all();
//         //     $selectedSection = Section::find($id);
            
//         //     return view('manage.updatesection',compact('sections', 'selectedSection','divisions' ));  

//         // }

//         // public function updateSection(Request $request, $id)
//         // {  
//         //     $request->validate([  
//         //         'file' => 'mimes:pdf',  
//         //     ]);

//         //     $selectedSection = Section::find($id);
             
//         //     $selectedSection->name = $request->input('name'); 
            
//         //     $selectedDivisionId = $request->input('selected_division');
//         //     // dd($selectedDivisionId);

//         //     if ($selectedDivisionId !== null) {
//         //         $selectedSection->division_id = $selectedDivisionId;
//         //     }

//         //     if ($request->hasFile('file')) {
//         //         $existingFile = 'uploads/files/' . $selectedSection->file;
//         //         if (File::exists($existingFile)) {
//         //             File::delete($existingFile);
//         //         }
//         //         $file = $request->file('file');
//         //         $fileExtension = $file->getClientOriginalExtension();
//         //         $filename = time() . '.' . $fileExtension;
//         //         $file->move('uploads/files/', $filename);
//         //         $selectedSection->file = $filename;
//         //     }

//         //     $selectedSection->has_external = $request->input('has_external'); 
//         //     // $external =  $request->input('has_external');
//         //     // dd($external); 

//         //     $selectedSection->description = $request->input('description');
//         //     // $selectedSection->division_id = $request->input('selected_division');
 
 
//         //     $selectedSection->update();
//         //     return redirect()->back()->with('success','Section updated successfully'); 
//         // }
 
 
//         // public function editprograms($id)
//         // {
//         //     $programs = Program::all();
//         //     $divisions = Division::all();
//         //     $sections = Section::all();
//         //     $selectedProgram = Program::find($id);

//         //     if (!$selectedProgram) {
//         //         // Handle the case where the program with the given ID doesn't exist
//         //         return back()->with('error', 'No such program found.'); // For example, return a 404 error page
//         //         }
//         //     // dd($programs);

//         //     // dd($)
//         //     return view('manage.updateprograms', compact('programs', 'selectedProgram', 'divisions','sections'));
//         // }

//         // public function updateprograms(Request $request, $id)
//         // {
//         //     $program = Program::find($id);
//         //     $program->name = $request->input('name');
  
//         //     $selectedSectionId = $request->input('selected_section');

//         //         // Update the main file
//         //         if ($request->hasFile('file')) {
//         //             $existingFile = 'uploads/files/' . $program->file;
//         //             if (File::exists($existingFile)) {
//         //                 File::delete($existingFile);
//         //             }
//         //             $file = $request->file('file');
//         //             $fileExtension = $file->getClientOriginalExtension();
//         //             $filename = time() . '.' . $fileExtension;
//         //             $file->move('uploads/files/', $filename);
//         //             $program->file = $filename;
//         //         }

//         //         // Update requirements
//         //         if ($request->hasFile('requirements')) {
//         //             $existingRequirements = 'uploads/files/' . $program->requirements;
//         //             if (File::exists($existingRequirements)) {
//         //                 File::delete($existingRequirements);
//         //             }
//         //             $requirementsFile = $request->file('requirements');
//         //             $requirementsExtension = $requirementsFile->getClientOriginalExtension();
//         //             $requirementsFilename = time() . '.' . $requirementsExtension;
//         //             $requirementsFile->move('uploads/files/', $requirementsFilename);
//         //             $program->requirements = $requirementsFilename;
//         //         }

//         //         // Update steps
//         //         if ($request->hasFile('steps')) {
//         //             $existingSteps = 'uploads/files/' . $program->steps;
//         //             if (File::exists($existingSteps)) {
//         //                 File::delete($existingSteps);
//         //             }
//         //             $stepsFile = $request->file('steps');
//         //             $stepsExtension = $stepsFile->getClientOriginalExtension();
//         //             $stepsFilename = time() . '.' . $stepsExtension;
//         //             $stepsFile->move('uploads/files/', $stepsFilename);
//         //             $program->steps = $stepsFilename;
//         //         }

//         //         if ($selectedSectionId !== null) {
//         //             $program->section_id = $selectedSectionId;
//         //         }

//         //         // dd($selectedSectionId);


//         //         $program->update();
//         //         return redirect()->back()->with('success','Program Updated Successfully');
//         // }


           

//         // public function createSection()
//         // { 
//         //     $divisions = Division::all(); 
//         //     return view('manage.addsection',compact('divisions' ));   
//         // }

//         // public function storeSection(Request $request)
//         // {
//         //     $request->validate([
//         //         'division' => 'required',
//         //         'name' => 'required', 
//         //         'description' => 'required', 
//         //         'file' => 'mimes:pdf', 
//         //     ]);
            
//         //     $selectedDivisionId = $request->input('selected_division');
//         //     // dd($selectedDivisionId);

//         //     $section_name = $request->input('name'); 
//         //     $description = $request->input('description'); 

//         //     $newSection = new Section;
            
//         //     // Set attributes of the new program based on the selected program
//         //     $newSection->name = $section_name; 
//         //     $newSection->division_id = $selectedDivisionId; 
//         //     $newSection->description = $description; 

                        
//         //     if($request->hasfile('file'))
//         //     {
//         //         $file = $request->file('file');
//         //         $extention = $file->getClientOriginalExtension();
//         //         $filename = time().'.'.$extention;
//         //         $file->move('uploads/files/', $filename);
//         //         $newSection->file = $filename;

//         //         // $file2 = $request->file('requirements');
//         //         // $extention2 = $file2->getClientOriginalExtension();
//         //         // $filename2 = time().'.'.$extention2;
//         //         // $file2->move('uploads/files/', $filename2);
//         //         // $program->requirements = $filename2; 
//         //     } 
//         //     if (!$selectedDivisionId) {
//         //         return back()->with('error', 'No such division found.');
//         //     }   
//         //     $newSection->save(); 
//         //     return redirect()->back()->with('success', 'New section record created successfully.'); 
//         // }
        

//         // public function createProgram()
//         // {
            
//         //     $divisions = Division::with('sections.programs')->get(); 
//         //     return view('manage.addprogram', compact('divisions'));
//         // }
 


//         // IMPORTANT: ORIGINAL CODE FOR UPLOADING FILE ===========================================================================================
//         // public function storeProgram(Request $request)
//         // { 
//         //     $request->validate([
//         //         'division' => 'required',
//         //         'section' => 'required',
//         //         'name' => 'required',
//         //         'file' => 'required|mimes:pdf', 
//         //         'steps' => 'required|mimes:pdf',
//         //         'requirements' => 'required|mimes:pdf',
//         //     ]);
            
//         //     $selectedSectionId = $request->input('selected_section');
//         //     $program_name = $request->input('name');
             
//         //     $newProgram = new Program;
             
//         //     $newProgram->name = $program_name;
//         //     $newProgram->section_id = $selectedSectionId; 
            
//         //     if ($request->hasFile('file')) {
//         //         $file = $request->file('file');
//         //         $extension = $file->getClientOriginalExtension();
//         //         $filename = time() . '.' . $extension;
//         //         $file->move('uploads/files/', $filename);
//         //         $newProgram->file = $filename;
//         //     }
            
//         //     if ($request->hasFile('steps')) {
//         //         $file3 = $request->file('steps');
//         //         $extension3 = $file3->getClientOriginalExtension();
//         //         $filename3 = time() . '.' . $extension3;
//         //         $file3->move('uploads/files/', $filename3);
//         //         $newProgram->steps = $filename3;
//         //     }
            
//         //     if ($request->hasFile('requirements')) {
//         //         $file2 = $request->file('requirements');
//         //         $extension2 = $file2->getClientOriginalExtension();
//         //         $filename2 = time() . '.' . $extension2;
//         //         $file2->move('uploads/files/', $filename2);
//         //         $newProgram->requirements = $filename2;
//         //     }
            
//         //     $newProgram->save();
            
//         //     return redirect()->back()->with('success', 'New program record created successfully.');
//         // }

//   }
}

 