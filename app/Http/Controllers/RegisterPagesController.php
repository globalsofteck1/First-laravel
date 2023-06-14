<?php

namespace App\Http\Controllers;

use App\Models\rolespages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterPagesController extends Controller
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
        //here you can display all the pages
        $pages = rolespages::all();
        return view('dash.dashboard') ->with('pages', $pages);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Show form for creating a new page
        return "This is my page for creating pages";
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Store all the created pages in database
        // Validate al fields before saving to database
        $request ->validate([
            'pagename' => 'required',
        ]);
        
               //var_dump($request);
               //die();
        // Save fields to database after validation 


        $attendantid = Auth::guard('guardsadmins')->User()->id;
        $accountid = Auth::guard('guardsadmins')->User()->accountid;

        $data = new rolespages();
        $data -> pagename = $request -> pagename;
        $data -> attendantid = $attendantid;
        $data -> accountid = $accountid;
        $save = $data -> save();

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
    public function show(rolespages $rolespages)
    {
        // This displays a specific data from database
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(rolespages $rolespages)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, rolespages $rolespages)
    {
        //
    }

    /**
     * Remove or delete the specified resource from storage.
     */
    public function destroy($id)
    {
        $pages = rolespages::find($id);
        $pages->delete();
        
        
        return redirect()->route('dash')->with('Success', 'Page Deleted Successfull');
    }
}
