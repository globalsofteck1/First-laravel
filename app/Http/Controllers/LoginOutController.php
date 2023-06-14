<?php

namespace App\Http\Controllers;

use App\Models\admins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginOutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */

    ///########################################## login to users 
    public function authenticateusers(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

         //var_dump();
         //die();
   
        $credentials = $request->only('username', 'password');
        if (Auth::guard('guardsadmins')->attempt($credentials)) {
            return redirect()->intended('dash')
                        ->withSuccess('Signed in');
        }
   
        $credentials = $request->only('username', 'password');
        if (Auth::guard('guarstudent')->attempt($credentials)) {
            return redirect()->intended('student')
                        ->withSuccess('Signed in');
        }
       // if login crdentials does not match, you redirect back direct to url home page ('/')
        return redirect("/")->withSuccess('Login details are not valid');
    }

     /////################### Signout users  #################////////////////
     public function signout(){
       
        ///// check and Signout for the admin
        if (Auth::guard('guardsadmins')->check()) {
            Auth::guard('guardsadmins')->logout();
          //  dd("sign out");
             }

        return redirect("/login")
        ->withSuccess('You have logged out, please sign in again');

    }
}
