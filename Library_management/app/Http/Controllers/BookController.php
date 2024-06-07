<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function create(){
    return view('create');
}
    public function store(){
        
    }
}
