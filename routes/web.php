<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Models\Category;
use App\Models\Idea;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\profilecontroller;

Route::get('/', function () {
    $Ideas = Idea::all();
    $Categories = Category::all();
    $Idea2 = Idea::where('category_id', '=', 2)->get();
    $Idea3 = Idea::where('category_id', '=', 3)->get();
    $Idea4 = Idea::where('category_id', '=', 4)->get();
    $Categoriesdropdown = Category::whereNotIn('id', [1,2,3,4])->get();
        return view('welcome',compact('Ideas','Idea2','Idea3','Idea4','Categories','Categoriesdropdown'));
    //return view('welcome');
})->name('index');

Route::middleware(['admin'])->group(function (){
    Route::get('/AdminPage', [AdminController::class, 'Admin_Page'])->name('adminpage');

    Route::get('/Hold_Member/{id}', [AdminController::class, 'Hold_member'])->name('Hold_Member');
    Route::get('/Resume_Member/{id}', [AdminController::class, 'Resume_member'])->name('Resume_Member');
    Route::get('/Delete_Member/{id}', [AdminController::class, 'Delete_Member'])->name('Delete_Member');

    Route::post('/update_Category/{id}', [AdminController::class, 'update_Category'])->name('update_Category');
    Route::get('/Delete_Category/{id}', [AdminController::class, 'Delete_Category'])->name('Delete_Category');
    Route::post('/AddCategory', [AdminController::class, 'AddCategory'])->name('AddCategory');
});

Route::middleware(['user'])->group(function (){
    Route::get('/profile/{id}', [profilecontroller::class, 'profile'])->name('profile');
    Route::post('/profile_edite/{id}', [profilecontroller::class, 'profile_edite'])->name('profile_edite');

    Route::get('/Edite_think/{id}', [profilecontroller::class, 'Edite_think'])->name('Edite_think');
    Route::post('/update_think/{id}', [profilecontroller::class, 'update_think'])->name('update_think');
    Route::get('/Delete_think/{id}', [profilecontroller::class, 'Delete_think'])->name('Delete_think');
    
    Route::get('/Add_thing/{id}', [profilecontroller::class, 'Add_thing'])->name('Add_thing');
    Route::post('/Add_Data/{id}', [profilecontroller::class, 'Add_Data'])->name('Add_Data');
});
//Route::get('/AdminPage', [AdminController::class, 'Admin_Page'])->name('adminpage');

Route::get('/view/{id}', [profilecontroller::class, 'view'])->name('view');




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
