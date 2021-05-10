<?php

use App\Http\Controllers\DepartmentController;
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

Route::get('department/all',[DepartmentController::class,'index'])->name('department');
Route::post('department/add',[DepartmentController::class,'store'])->name('addDepartment');
