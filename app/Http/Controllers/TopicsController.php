<?php

namespace App\Http\Controllers;

use App\Models\topics;
use App\Models\subjects;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TopicsController extends Controller
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
        $topics = topics::all();
        $subjects = subjects::all();
        return view('dash.topic') ->with('topics', $topics) 
                                  ->with('subjects', $subjects);
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
    public function stores(Request $request)
    {
        
               //var_dump($request);
               //die();

        // Save fields to database after validation 
        $topics = new topics();
        //$topics -> subjectid = $request -> subjectid;
        $topics -> topicname = $request -> topicname;
        $save = $topics -> save();

        /// check if data is saved to the database
     if ($save) {
         // if data saved successful
         return back() -> with('success', 'You have Saved successfully');
     }else{
         return back() -> with('fail', 'Something went wrong');
     }
    }
    public function store(Request $request)
    {
        // Store all the created pages in database
        // Validate al fields before saving to database
        $request ->validate([
            'topicname' => 'required',
        ]);

        $subjectId = $request->input('subjectid');

        $attendantid = Auth::guard('guardsadmins')->User()->id;
        $accountid = Auth::guard('guardsadmins')->User()->accountid;
 
          // Create the new topic
        $topic = new topics();
        $topic->topicname = $request->input('topicname');
          // Set other properties of the topic as needed

           // Associate the topic with the subject
        $subject = subjects::findOrFail($subjectId);
        $topic->subjects()->associate($subject);
        $topic -> attendantid = $attendantid;
        $topic -> accountid = $accountid;
        //dd($topic);

           // Save the topic
           $save = $topic->save();

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
    public function show(topics $topics)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(topics $topics)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, topics $topics)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(topics $topics)
    {
        //
    }
}
