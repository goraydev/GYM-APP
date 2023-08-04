<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
class IndexController extends Controller
{
 
    public function index()
    {
       
        return view('auth.login');
    }

   
}
