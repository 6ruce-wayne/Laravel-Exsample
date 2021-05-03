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

Route::get('/', function () {
    return view('welcome');
});

// Exsample route
Route::get('/about', function () {
    echo "Hello Laravel";
});

Route::get('/users/{fname}/{lname}', function ($fname,$lname) {
    echo "RMZ Studio...$fname  $lname";
});

Route::get('/product/{name}/{price}', function ($name,$price) {
    echo "<p> Product: $name </p>";
    echo "<p> ราคา:  $price </p>";
});
