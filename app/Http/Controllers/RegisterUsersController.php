<?php

namespace App\Http\Controllers;

use App\Models\admins;
use App\Models\posts;
use Illuminate\Http\Request;
use DateTime;
use DB;
use Hash;
use Session;

class RegisterUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //here you can display all the users
        $user = admins::all();
        return view('dash.admin') ->with('user', $user) ;
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
            'username' => 'required',
            'usertype' => 'required',
            'password' => 'required',
        ]);
        
               //var_dump($request);
               //die();
        // Save fields to database after validation 
        $regdate = date('Y-m-d H:i:s');
        $authstatus = 1;
        $attendantid = 1;
        $accountid = 1;
        // Save fields to database after validation 
        $usersinfo = new admins();

        $usersinfo -> username = $request -> username;
        $usersinfo -> usertype = $request -> usertype;
        $usersinfo -> regdate = $regdate;
        $usersinfo -> authstatus = $authstatus;
        $usersinfo -> attendantid = $attendantid;
        $usersinfo -> accountid = $accountid;
        $usersinfo -> password = Hash::make($request -> password);
        $save = $usersinfo -> save();

        /// check if data is saved to the database
     if ($save) {
         // if data saved successful
         return back() -> with('success', 'You have Saved successfully');
     }else{
         return back() -> with('fail', 'Something went wrong');
     }
     
    }

    /**
     * Display the specified resource.
     */
    public function show(admins $admins)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(admins $admins)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, admins $admins)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $myuser = admins::find($id);
        $myuser->delete();
        
        
        return redirect()->route('go2users')->with('Success', 'User Deleted Successfull');
    }
}
