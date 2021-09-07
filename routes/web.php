<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
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

Route::get('/', function () {
    return view('welcome');
});

//create route for Image_crud operation.
Route::resource('products', ProductController::class);

//create image crud Here
Route::get('/students',[StudentController::class,'index']);
Route::get('/add-students',[StudentController::class,'create']);
Route::post('/add-students',[StudentController::class,'store']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update-student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}',[StudentController::class,'destroy']);
