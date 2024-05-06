<?php
 
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController; 
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// main views (public)
Route::get('/',[PageController::class,'index'])->name('index'); 
Route::get('/home',[PageController::class,'home'])->name('home');   
Route::get('/division',[PageController::class,'index']); 
Route::get('/section',[PageController::class,'index']);   
Route::get('/section/{id}',[PageController::class,'viewSection'])->name('section'); 
Route::get('/sectionlist',[PageController::class,'sectionlist'])->name('sectionlist'); 


// auth
Auth::routes([
    'register' => false, // Register Routes... 
    'reset' => false, // Reset Password Routes...  
    'verify' => false, // Email Verification Routes...
]);

// manage
Route::get('manage/', [HomeController::class, 'manageIndex'])->name('manage');
Route::get('/manage/sections', [HomeController::class, 'managesection'])->name('managesection'); 
Route::get('/manage/updatesection/{id}', [HomeController::class, 'editsection']);
Route::put('/manage/editsection/{id}', [HomeController::class, 'updatesection']); 
Route::get('/manage/addsection',[HomeController::class,'createSection']); //adding section
Route::post('manage/addsection',[HomeController::class,'storeSection'])->name('addsection');
  
// admin actions
Route::middleware(['auth','is-admin'])->group(function () {
     
    //manage users
    Route::get('manage/users',[HomeController::class,'manageUsers'])->name('manage.users'); 
    Route::get('manage/adduser',[HomeController::class,'addUser']);
    Route::post('manage/createUser',[HomeController::class,'createUser'])->name('createUser');
    Route::delete('manage/deleteuser/{id}',[HomeController::class,'destroyUser'])->name('delete.user');
    Route::get('manage/restore/{id}',[HomeController::class,'restoreUser']);

    // manage division
    Route::delete('manage/delete/{id}',[HomeController::class,'destroyDivision'])->name('delete.division');
    Route::get('manage/restoredivision/{id}',[HomeController::class,'restoreDivision'])->name('restore.division');
    Route::get('manage/add-division',[HomeController::class,'addDivision']);
    Route::post('manage/createDivision',[HomeController::class,'createDivision'])->name('create-division');  
});

// file uploading
Route::post('manage/upload', [HomeController::class, 'save'])->name('upload');
Route::get('manage/upload', [HomeController::class, 'showDropdown']);

// manage division for all users, no add & delete
Route::get('manage/divisions',[HomeController::class,'manageDivisions'])->name('manage.divisions'); //division page 
Route::get('/manage/updatedivision/{id}', [HomeController::class, 'editDivision']);// display edit division page 
Route::put('/manage/storeUpdateDivision/{id}', [HomeController::class, 'storeUpdateDivision']);//save edit division page 

// manage section
Route::delete('manage/deletesection/{id}',[HomeController::class,'destroySection'])->name('delete.section');
Route::get('/manage/update/{id}', [HomeController::class, 'editUser']);
Route::put('/manage/storeUpdateManageUser/{id}', [HomeController::class, 'storeUpdateManageUser']);
Route::get('manage/restoreSection/{id}',[HomeController::class,'restoreSection']); 
 
// CUSTOM VIEWS for SWADs
Route::get('/psd',[PageController::class,'list_psd'])->name('psd'); 
Route::get('/swad-bohol',[PageController::class,'list_swad_bohol']); 
Route::get('/swad-siquijor',[PageController::class,'list_swad_siquijor']); 
Route::get('/swad-negros',[PageController::class,'list_swad_negros']); 
 
//main viewing of file
Route::get('/psd/file/{id}',[PageController::class,'showFile']);


 



// ***** old routes bfore the main change (section views)*****
// Route::get('/view/{id}',[PageController::class,'viewFile']); 
// Route::delete('/delete_program/{program}', [PageController::class, 'deleteProgram'])->name('delete_program'); 
// Route::get('/listfiles', [PageController::class, 'listfiles'])->name('listfiles');
// Route::get('/programlist', [PageController::class, 'programlist'])->name('programlist'); 
//         //create custom views
// Route::get('/create_view', [PageController::class, 'create_view']);
// Route::post('storeView', [PageController::class, 'storeView'])->name('storeView');

// Route::get('/programlist',[PageController::class,'programlist']);

// Route::get('/files',[PageController::class,'listfiles']);

// manage 
// Route::get('/manage/updateprograms/{id}', [HomeController::class, 'editprograms']);
// Route::put('/manage/editprograms/{id}', [HomeController::class, 'updateprograms']);
// Route::get('/manage/programs', [HomeController::class, 'manageprograms'])->name('manageprograms');

// Route::get('/manage/addprogram', [HomeController::class, 'createProgram']);
// Route::post('manage/addprogram',[HomeController::class,'storeProgram'])->name('addprogram');




//mta modal
// Route::get('/psd/show-modal/{id}',[PageController::class,'showModalFile']);
// Route::get('/psd/show-steps/{id}',[PageController::class,'showModalSteps']);
// Route::get('/psd/show-requirements/{id}',[PageController::class,'showModalRequirements']);

//managePrograms modal
// Route::get('/manage/viewCharter/{id}',[HomeController::class,'viewCharter']);
// Route::get('/manage/viewSteps/{id}',[HomeController::class,'viewSteps']);
// Route::get('/manage/viewRequirements/{id}',[HomeController::class,'viewRequirements']);