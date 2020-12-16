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
        $type = "Brands";
        return view('welcome',compact('Ideas','Idea2','Idea3','Idea4','Categories','Categoriesdropdown'));
    //return view('welcome');
})->name('index');

Route::get('/AdminPage', [AdminController::class, 'Admin_Page'])->name('adminpage');
Route::get('/Hold_Member/{id}', [AdminController::class, 'Hold_member'])->name('Hold_Member');
Route::get('/Resume_Member/{id}', [AdminController::class, 'Resume_member'])->name('Resume_Member');
Route::get('/Delete_Member/{id}', [AdminController::class, 'Delete_Member'])->name('Delete_Member');

Route::get('/profile/{id}', [profilecontroller::class, 'profile'])->name('profile');

Route::get('/get_idea/{id}', [IdeaController::class, 'get_idea'])->name('get_idea');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
