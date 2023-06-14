<?php

namespace App\Http\Controllers;

use App\Models\subjects;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubjectController extends Controller
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
        $subject = subjects::all();
        return view('dash.subject') ->with('subject', $subject);
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
        // Store all the created subjects in database
        // Validate al fields before saving to database
        $request ->validate([
            'subjectname' => 'required',
        ]);
        
               //var_dump($request);
               //die();

        $attendantid = Auth::guard('guardsadmins')->User()->id;
        $accountid = Auth::guard('guardsadmins')->User()->accountid;

        // Save fields to database after validation 
        $subject = new subjects();
        $subject -> subjectname = $request -> subjectname;
        $subject -> attendantid = $attendantid;
        $subject -> accountid = $accountid;
        $save = $subject -> save();

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
    public function show(subjects $subjects)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subjects $subjects)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subjects $subjects)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subjects $subjects)
    {
        //
    }
}
