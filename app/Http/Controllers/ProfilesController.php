<?php

namespace App\Http\Controllers;

use App\Models\profiles;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DateTime;

class ProfilesController extends Controller
{
    public function __construct(){
        //parent::__construct();
        $this->middleware('auth:guardsadmins');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userprofile = profiles::all();
        return view('dash.registeruser') -> with('userprofile',  $userprofile);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Store all the created users in database
        // Validate al fields before saving to database
        $request ->validate([
            'fullname' => 'required',
            'address' => 'required',
            'careof' => 'required',
            'contact' => 'required',
            'email' => 'required | email ',
            'userid' => 'required',
            'class' => 'required',
            'payments' => 'required',
            'initials' => 'required | max:3',
            'photo' => 'required',
        ]);
        
               //var_dump($request);
               //die();
        // Save fields to database after validation

        $attendantid = Auth::guard('guardsadmins')->User()->id;
        $authstatus = Auth::guard('guardsadmins')->User()->authstatus;
        $accountid = Auth::guard('guardsadmins')->User()->accountid;
        
        // Save fields to database after validation 
        $usersinfo = new profiles();

        $usersinfo -> fullname = $request -> fullname;
        $usersinfo -> address = $request -> address;
        $usersinfo -> careof = $request -> careof;
        $usersinfo -> contact = $request -> contact;
        $usersinfo -> email = $request -> email;
        $usersinfo -> userid = $request -> userid;
        $usersinfo -> class = $request -> class;
        $usersinfo -> payments = $request -> payments;
        $usersinfo -> initials = $request -> initials;
        $usersinfo -> photo = $request -> photo;
        $usersinfo -> sign = $request -> sign;
        $usersinfo -> authstatus = $authstatus;
        $usersinfo -> accountid = $accountid;
        $usersinfo -> attendantid = $attendantid;
        $save = $usersinfo -> save();

        /// check if data is saved to the database
     if ($save) {
         // if data saved successful
         return back() -> with('success', 'You have Registered successfully');
     }else{
         return back() -> with('fail', 'Something went wrong');
     }
    }

    /**
     * Display the specified resource.
     */
    public function show(profiles $profiles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(profiles $profiles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, profiles $profiles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(profiles $profiles)
    {
        //
    }
}
