<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function list(){

        return view('business.list');
    }




}
