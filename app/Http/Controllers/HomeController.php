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
use App\Models\User;
use Database\Factories\ProgramFactory;
use Illuminate\Contracts\Validation\Validator as ValidationValidator;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator as FacadesValidator;
use Illuminate\Support\Facades\View;

class HomeController extends Controller
 
{ 
             
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('manage/index');
    }

    public function manageIndex()
    { 
            
            // $data=Division::all();
            return view('manage/index');
     
    }

    public function showDropdown()
    {
        // Get the currently logged-in user
        $user = Auth::user();
    
        if ($user) {
            if ($user->is_admin == 1) {
                // User is an admin, show all divisions
                $divisions = Division::with('sections.programs')->get();
            } else {
                // User is not an admin, filter by user's division_id
                $divisionId = $user->division_id;
                $divisions = Division::where('id', $divisionId)
                    ->with('sections.programs')
                    ->get();
            }
    
            return view('manage/upload', compact('divisions'));
        }
    
        // Handle the case where no user is logged in
        return redirect()->route('login'); // Redirect to the login page or handle as needed
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

    public function manageDivisions()
    {
        
        $user = Auth::user();
        // dd($user);

        if(!$user)
        {
            abort(404);
        } else if($user->is_admin == 1)
                { 
                    $divisions = Division::orderBy('name') 
                    ->get();  
                }
                else
                { 
                    $userDivision = $user->division_id; 

                    $userDivision = $user->division_id;
                    $divisions = Division::with('users')
                        ->orderBy('name')
                        ->where('id', $userDivision)  
                        ->get();
                                
                    $inactiveDivisions = Division::with('users')
                    ->onlyTrashed() 
                    ->where('id', $userDivision)  
                    ->orderBy('deleted_at')  
                    ->orderBy('name') 
                    ->get(); 

                    return view('manage.divisions', compact('divisions','inactiveDivisions'));
                }

        $inactiveDivisions = Division::onlyTrashed()
        ->orderBy('deleted_at')  
        ->orderBy('name') 
        ->get(); 
        return view('manage.divisions', compact('divisions','inactiveDivisions'));
 
    }

    public function addDivision(){
        return view('manage.adddivision');
    }

    public function editDivision($id)
    {       
        $division = Division::find($id);    
        if(auth()->user()->is_admin==0)
        {
            if ( !$division || auth()->user()->division_id != $division->id) {
                abort(403, 'Unauthorized action.');
            }
        }  

        return view('manage.updatedivision', compact('division')); 
    } 


    public function storeUpdateDivision(Request $request, $id)
    {  
        // $currentUser = Auth::user();
        $updateDivision  = Division::find($id); 

         $request->validate([ 
        'name' => 'string|unique:divisions,name,'.$updateDivision->id,
        'description' => 'string',
        // 'password' => 'string|min:8',
        // 'password' => 'string|min:8|confirmed', // 'confirmed' validates that 'password' matches 'password_confirmation'
        // 'selected_division' => 'required',
        ]);


        
         
        if ($request->filled('name')) { 
            $updateDivision->name = $request->input('name'); 
        } 

        if ($request->filled('description'))
        {
            $updateDivision->description = $request->input('description'); 
        }
         
        $updateDivision->save();  
        return redirect()->route('manage.divisions')->with('success', 'Division updated successfully.');   
        

        
        
    }


    public function destroyDivision($id)
    {
        $division = Division::find($id);

        if (!$division) {
            return redirect()->back()->with('error', 'Division cannot be found.');
        }

        $division->delete(); 
        return redirect()->back()->with('success', 'Division deleted successfully.');
    
    }

    
    public function restoreDivision($id)
    {  
        $restoreDivision = Division::withTrashed()->find($id);

       if(!$restoreDivision)
       { 
            return redirect()->route('manage.divisions')->with('error', 'Division cannot be found.');
       }
  
        $restoreDivision->restore(); 
        // dd('TRUE');
        return redirect()->route('manage.divisions')->with('success', 'Division restored successfully.');
    }

    
            
    public function manageprograms()
    { 
        $divisions = Division::all();
        $sections = Section::all();
        $programs = Program::all();

        return view('manage.programs',compact('divisions','sections','programs'));
    }

    public function editsection($id)
    {  
        
        $sections = Section::all();
        $divisions = Division::all();
        $selectedSection = Section::find($id);

        // dd($selectedSection);

        if(auth()->user()->is_admin==0)
        {
            if (!$selectedSection ||  auth()->user()->division_id != $selectedSection->division_id) {
                        abort(403, 'Unauthorized action.');
                    }
        }
        
        return view('manage.updatesection',compact('sections', 'selectedSection','divisions' ));  


        // if(auth()->user()->is_admin==0)
        // {
        //     if ( !$division || auth()->user()->division_id != $division->id) {
        //         abort(403, 'Unauthorized action.');
        //     }
        // } 
    }

 
    public function editprograms($id)
    {
        $programs = Program::all();
        $divisions = Division::all();
        $sections = Section::all();
        $selectedProgram = Program::find($id);

        if (!$selectedProgram) {
            // Handle the case where the program with the given ID doesn't exist
            return back()->with('error', 'No such program found.'); // For example, return a 404 error page
            }
        // dd($programs);

        // dd($)
        return view('manage.updateprograms', compact('programs', 'selectedProgram', 'divisions','sections'));
    }

    public function updateprograms(Request $request, $id)
    {
        $program = Program::find($id);
        $program->name = $request->input('name');

        $selectedSectionId = $request->input('selected_section');

            // Update the main file
            if ($request->hasFile('file')) {
                $existingFile = 'uploads/files/' . $program->file;
                if (File::exists($existingFile)) {
                    File::delete($existingFile);
                }
                $file = $request->file('file');
                $fileExtension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $fileExtension;
                $file->move('uploads/files/', $filename);
                $program->file = $filename;
            }

            // Update requirements
            if ($request->hasFile('requirements')) {
                $existingRequirements = 'uploads/files/' . $program->requirements;
                if (File::exists($existingRequirements)) {
                    File::delete($existingRequirements);
                }
                $requirementsFile = $request->file('requirements');
                $requirementsExtension = $requirementsFile->getClientOriginalExtension();
                $requirementsFilename = time() . '.' . $requirementsExtension;
                $requirementsFile->move('uploads/files/', $requirementsFilename);
                $program->requirements = $requirementsFilename;
            }

            // Update steps
            if ($request->hasFile('steps')) {
                $existingSteps = 'uploads/files/' . $program->steps;
                if (File::exists($existingSteps)) {
                    File::delete($existingSteps);
                }
                $stepsFile = $request->file('steps');
                $stepsExtension = $stepsFile->getClientOriginalExtension();
                $stepsFilename = time() . '.' . $stepsExtension;
                $stepsFile->move('uploads/files/', $stepsFilename);
                $program->steps = $stepsFilename;
            }

            if ($selectedSectionId !== null) {
                $program->section_id = $selectedSectionId;
            }

            // dd($selectedSectionId);


            $program->update();
            return redirect()->back()->with('success','Program Updated Successfully');
    }
       
    
    public function createSection()
    {
        // Get the currently logged-in user
        $user = Auth::user();
    
        if ($user) {
            if ($user->is_admin == 1) {
                // User is an admin, show all divisions
                $divisions = Division::with('sections.programs')->get();
            } else {
                // User is not an admin, filter by user's division_id
                $divisionId = $user->division_id;
                $divisions = Division::where('id', $divisionId)
                    ->with('sections.programs')
                    ->get();
            }
    
            return view('manage.addsection', compact('divisions'));
        }
    
        // Handle the case where no user is logged in
        return redirect()->route('login'); // Redirect to the login page or handle as needed
    }

    public function storeSection(Request $request)
    {
        $request->validate([
            'division' => 'required',
            'name' => 'required', 
            'description' => 'required', 
            'file' => 'mimes:pdf', 
        ]);
        
        $selectedDivisionId = $request->input('selected_division');
        // dd($selectedDivisionId);

        $section_name = $request->input('name'); 
        $description = $request->input('description'); 

        $newSection = new Section;
        
        // Set attributes of the new program based on the selected program
        $newSection->name = $section_name; 
        $newSection->division_id = $selectedDivisionId; 
        $newSection->description = $description; 

                    
        if($request->hasfile('file'))
        {
            $file = $request->file('file');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/files/', $filename);
            $newSection->file = $filename;

            // $file2 = $request->file('requirements');
            // $extention2 = $file2->getClientOriginalExtension();
            // $filename2 = time().'.'.$extention2;
            // $file2->move('uploads/files/', $filename2);
            // $program->requirements = $filename2; 
        } 
        if (!$selectedDivisionId) {
            return back()->with('error', 'No such division found.');
        }   
        $newSection->save(); 
        return redirect()->back()->with('success', 'New section record created successfully.'); 
    }

    public function destroySection($id)
    {
        $section = Section::find($id);

        if (!$section) {
            return redirect()->back()->with('error', 'Section cannot be found.');
        }

        $section->delete(); 
        return redirect()->back()->with('success', 'Section deleted successfully.');
    
    }

    public function restoreSection($id)
    {  
        $restoreSection = Section::withTrashed()->find($id);

       if(!$restoreSection)
       { 
            return redirect()->route('managesection')->with('error', 'Section cannot be found.');
       }
  
        $restoreSection->restore(); 
        // dd('TRUE');
        return redirect()->route('managesection')->with('success', 'Section restored successfully.');
    }
    

    public function createProgram()
    {
        
        $divisions = Division::with('sections.programs')->get(); 
        return view('manage.addprogram', compact('divisions'));
    }
  
    // IMPORTANT: ORIGINAL CODE FOR UPLOADING FILE ===========================================================================================
    public function storeProgram(Request $request)
    { 
        $request->validate([
            'division' => 'required',
            'section' => 'required',
            'name' => 'required',
            'file' => 'required|mimes:pdf', 
            'steps' => 'required|mimes:pdf',
            'requirements' => 'required|mimes:pdf',
        ]);
        
        $selectedSectionId = $request->input('selected_section');
        $program_name = $request->input('name');
         
        $newProgram = new Program;
         
        $newProgram->name = $program_name;
        $newProgram->section_id = $selectedSectionId; 
        
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/files/', $filename);
            $newProgram->file = $filename;
        }
        
        if ($request->hasFile('steps')) {
            $file3 = $request->file('steps');
            $extension3 = $file3->getClientOriginalExtension();
            $filename3 = time() . '.' . $extension3;
            $file3->move('uploads/files/', $filename3);
            $newProgram->steps = $filename3;
        }
        
        if ($request->hasFile('requirements')) {
            $file2 = $request->file('requirements');
            $extension2 = $file2->getClientOriginalExtension();
            $filename2 = time() . '.' . $extension2;
            $file2->move('uploads/files/', $filename2);
            $newProgram->requirements = $filename2;
        }
        
        $newProgram->save();
        
        return redirect()->back()->with('success', 'New program record created successfully.');
    }

    
    public function manageUsers(Request $request)
    { 
 
        $currentUserId = auth()->id();  
        $users = User::withTrashed()
        ->where('id', '!=', $currentUserId)
        ->orderBy('deleted_at') 
        ->orderByDesc('is_admin') 
        ->orderBy('name') 
        ->get();

        $activeUsers = User::where('id', '!=', $currentUserId)
        ->orderBy('deleted_at') 
        ->orderByDesc('is_admin') 
        ->orderBy('name') 
        ->get();

        $inactiveUsers = User::onlyTrashed() 
        ->where('id', '!=', $currentUserId)
        ->orderBy('deleted_at') 
        ->orderByDesc('is_admin') 
        ->orderBy('name') 
        ->get();

        // dd($inactiveUsers);

        return view('manage.users', compact('users','activeUsers','inactiveUsers'));
 
    }

    public function restoreUser($id)
    { 
       
        $restoreUser = User::withTrashed()->find($id);

       if(!$restoreUser)
       { 
            return redirect()->route('manage.users')->with('error', 'User cannot be found.');
       }
  
        $restoreUser->restore(); 
        return redirect()->route('manage.users')->with('success', 'User restored successfully.');
    }
      
    public function addUser()
    {
        
        $data = User::with('division')->get(); 
        $divisions = Division::get(); 
        // dd($data);
        return view('manage.adduser', compact('data','divisions'));
    }
 
 
    public function createUser(Request $request)
    {
        $request->validate([ 
            'name' => 'required|string|max:20',
            'email' => 'required|email|unique:users',
            // 'password' => 'required|string|min:8',
            'password' => 'required|string|min:8|confirmed', // 'confirmed' validates that 'password' matches 'password_confirmation'
            // 'selected_division' => 'required',
        ]);
 
        // $password->password->Hash::make($request['password']);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->is_admin = $request->input('is_admin');
        $user->division_id = $request->input('selected_division');
        $user->password = Hash::make($request['password']); // Hash the password for security
         
         
        $user->save();

        return redirect()->back()->with('success', 'User registered successfully.'); 
        
    }

        
    public function editUser($id)
    {   
        $divisions = Division::all(); 
        $user = Auth::user();
        if($user->is_admin == 0){
            $selectedUser = $user;
            return view('manage.updateuser',compact('divisions','selectedUser'));  
        }
        // $users = User::all();
        $selectedUser = User::find($id);
        // $divisions = Division::all(); 
        // dd($users);
        
        return view('manage.updateuser',compact('divisions','selectedUser'));  
 
    }


    public function managesection()
    {
        // Get the currently logged-in user
        $user = Auth::user();

        if ($user) {
            if ($user->is_admin == 1) {
                // User is an admin, show all sections
                $sections = Section::with('division')->orderBy('division_id')->get();

                $inactiveSection = Section::onlyTrashed()
                ->with('division') 
                ->orderBy('deleted_at')  
                ->orderBy('name') 
                ->get();

            } else {
                // User is not an admin, filter sections by user's division_id
                $divisionId = $user->division_id;
                $sections = Section::where('division_id', $divisionId)
                    ->with('division')
                    ->orderBy('division_id')
                    ->get();

                $inactiveSection = Section::where('division_id', $divisionId)
                    ->onlyTrashed()
                    ->with('division') 
                    ->orderBy('deleted_at')  
                    ->orderBy('name') 
                    ->get();
            
            }

            return view('manage.sections', compact('sections','inactiveSection'));
        }

        // Handle the case where no user is logged in
        return redirect()->route('login'); // Redirect to the login page or handle as needed
    }

    
    public function updateSection(Request $request, $id)
    {  
        $request->validate([  
            'file' => 'mimes:pdf',  
        ]);

        $selectedSection = Section::find($id);
         
        $selectedSection->name = $request->input('name'); 
        
        $selectedDivisionId = $request->input('selected_division');
        // dd($selectedDivisionId);

        if ($selectedDivisionId !== null) {
            $selectedSection->division_id = $selectedDivisionId;
        }

        if ($request->hasFile('file')) {
            $existingFile = 'uploads/files/' . $selectedSection->file;
            if (File::exists($existingFile)) {
                File::delete($existingFile);
            }
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $fileExtension;
            $file->move('uploads/files/', $filename);
            $selectedSection->file = $filename;
        }

        $selectedSection->has_external = $request->input('has_external'); 
        // $external =  $request->input('has_external');
        // dd($external); 

        $selectedSection->description = $request->input('description');
        // $selectedSection->division_id = $request->input('selected_division');


        $selectedSection->update();
        return redirect()->back()->with('success','Section updated successfully'); 
    }

    public function storeUpdateManageUser(Request $request, $id)
    { 

        
        $currentUser = Auth::user();
        $updateUser  = User::find($id);
        
         $request->validate([ 
        'name' => 'string|max:20', 
        'email' => 'email|unique:users,email,'.$updateUser->id,
        // 'password' => 'string|min:8',
        // 'password' => 'string|min:8|confirmed', // 'confirmed' validates that 'password' matches 'password_confirmation'
        // 'selected_division' => 'required',
        ]);


        
        $updateUser->name = $request->input('name'); 
        $updateUser->email = $request->input('email'); 
         
        if ($request->filled('password')) { 
            $updateUser->password = $request->input('password');
            $updateUser->password = Hash::make($request['password']);
        } 

        if ($request->filled('is_admin'))
        {
            $updateUser->is_admin = $request->input('is_admin');
        }
        if ($request->filled('selected_division'))
        { 
            $updateUser->division_id = $request->input('selected_division');
        }
            
        $updateUser->save(); 
        
        if($currentUser->is_admin == 0){
            return redirect()->back()->with('success','Profile updated successfully'); 
        } 
        else{ return redirect()->route('manage.users')->with('success', 'User updated successfully.');  }
        // 

        
        
    }

    public function destroyUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }

        $user->delete(); 
        return redirect()->back()->with('success', 'User deleted successfully.');
    
    }

}

