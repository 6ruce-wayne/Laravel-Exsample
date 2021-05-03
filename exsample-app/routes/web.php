<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Controller;
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

Route::get('/', function () {
    return view('welcome');
});

// Exsample route
Route::get('/about',[AboutController::class,'index']);

Route::get('/member', function () {
    return view('member.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});



Route::get('/users/{fname}/{lname}', function ($fname,$lname) {
    echo "RMZ Studio...$fname  $lname";
});

Route::get('/product/{name}/{price}', function ($name,$price) {
    echo "<p> Product: $name </p>";
    echo "<p> ราคา:  $price </p>";
});
