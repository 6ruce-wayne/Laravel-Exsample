<?php

use App\Http\Controllers\DepartmentController;
use App\Models\Department;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Support\Facades\DB;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
 //   $user = User::all(); //มาจาก Model user
    $user=DB::table('users')->get();
    return view('dashboard',compact('user'));
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function(){ //กำหนด middleware แบบกลุ่ม
Route::get('department/all',[DepartmentController::class,'index'])->name('department');
Route::post('department/add',[DepartmentController::class,'store'])->name('addDepartment');
Route::get('department/edit/{id}',[DepartmentController::class,'edit'])->name('editDepartment');
Route::post('department/update/{id}',[DepartmentController::class,'update'])->name('updateDepartment');

Route::get('department/softDelete/{id}',[DepartmentController::class,'softDelete'])->name('deleteDepartment');
Route::get('department/restore/{id}',[DepartmentController::class,'restore'])->name('restoreDepartment');
Route::get('department/delete/{id}',[DepartmentController::class,'delete'])->name('deleteDepartment');


});
