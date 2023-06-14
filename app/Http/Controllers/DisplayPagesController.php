<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DisplayPagesController extends Controller
{
    // display all pages here
    public function index(){
        return view('layout.app');
    }

    public function indexpage(){
        return view('layout.index');
    }

    public function aboutpage(){
        return view('layout.pages.about');
    }

    public function contactpage(){
        return view('layout.pages.contact');
    }

    public function loginpage(){
        return view('auth.login');
    }

    public function Developer(){
        return view('dev.developer');
    }

    public function report(){
        return view('dev.report');
        //return view('dev.reports');
    }
}
