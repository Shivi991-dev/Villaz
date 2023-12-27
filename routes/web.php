<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('website.index');
})->name('home');
// Route::view('/','admin.index')->name('admin');
// Route::view('/admin','admin.index')->name('admin');

/////////////// WEBSITE FUNCTIONS //////////////
Route::view('/login','website.login')->name('login');
Route::view('/register','website.register');
Route::get('/search/location',[WebsiteController::class,'searchLocation'])->name('searchLocation');
Route::get('/search-villa',[WebsiteController::class,'searchVilla'])->name('searchVilla');
Route::get('/villasingle', [WebsiteController::class, 'singleVilla'])->name('singleVilla');

Route::get('/bookVillaView',[WebsiteController::class,'bookVillaView'])->name('bookVillaView');


//////////////// USER CONTROLLER FUNCTIONS //////////////
Route::post('/registerUser',[UserController::class,'registerUser'])->name('registerUser');
Route::post('/loginUser',[UserController::class,'loginUser'])->name('loginUser');
Route::get('/logoutUser',[UserController::class,'logoutUser'])->name('logoutUser');
Route::get('/verify-email/{email}',[UserController::class,'verifyEmail'])->name('verifyEmail');


////////// ADMIN FUNCTIONS ///////////////
Route::group(['middleware' => ['auth', 'checkroles:2']], function () {
    
    Route::view('/admin','admin.index')->name('admin');
    /////////// USER MANAGEMENT //////////////
    Route::get('/manage-users',[AdminController::class,'manageUsersFilterController'])->name('manageUsers');
    Route::get('/manage-view',[AdminController::class,'manageUserView'])->name('manageUserView');
    Route::get('/approveUser',[AdminController::class,'approveUser'])->name('approveUser');
    Route::get('/disapproveUser',[AdminController::class,'disapproveUser'])->name('disapproveUser');
    Route::get('/add-villa',[AdminController::class,'addVillaView'])->name('addVillaView');
    Route::post('/addVilla',[AdminController::class,'addVilla'])->name('addVilla');
});

// ///////////// FILTERS   ////////// ////
Route::get('/filterAmenity',[FilterController::class,'filterAmenity'])->name('filterAmenity');
