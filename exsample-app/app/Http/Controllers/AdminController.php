<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        $user = $_REQUEST['user'];
        return view('admin.index')->with('user',$user);
    }
}
