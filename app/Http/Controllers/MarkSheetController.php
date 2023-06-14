<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Validators\ValidationException;

use App\Models\posts;
use App\Models\marksheets;

use App\Imports\MarksImport;

use App\Exports\MarksExport;

use DB;

class MarkSheetController extends Controller
{
    
    public function __construct(){
        // This function guards users from accessing the page content with out an acccount
        //parent::__construct();
        $this->middleware('auth:guardsadmins');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 

        // join the two tables (pages & permissions with left join) and pass the data
        $usecredentials = DB::select('select * from profiles');

        $marksresult = DB::select('select * from marksheets');

        $subjects = DB::select('select * from subjects');
        $topics = DB::select('select * from topics');

        $profilemarksheet = DB::select('select *, marksheets.userid, profiles.fullname
                                        from marksheets Left join profiles 
                                        on marksheets.userid = profiles.userid
                                        order by marksheets.userid');
  
           //dd($usecredentials); 
            //die();
            // display all the data on this page marksheet.blade
            /// demosheet
        return view('dash.marksheet')
                  ->with('usecredentials',$usecredentials)
                  ->with('marksresult',$marksresult)
                  ->with('subjects',$subjects)
                  ->with('topics',$topics)
                  ->with('profilemarksheet',$profilemarksheet);
    }

    /**
     * **************************************************************************
     *                Handle all CRUDE operations here.
     * **************************************************************************
     */

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
        // Store all the marks in database
        // Validate al fields before saving to database
        $request ->validate([
            'marks' => 'required | max:5',
            'score' => 'required | max:5',
            'desc' => 'required | max:25',
        ]);
        
               //var_dump($request);
               //die();
        // Save fields to database after validation 


        //$attendantid = Auth::guard('guardsadmins')->User()->id;
        //$accountid = Auth::guard('guardsadmins')->User()->accountid;
  
        $data = new marksheets();
        $data -> subjectid = $request -> subjectid;
        $data -> chapterid = $request -> chapterid;
        $data -> marks = $request -> marks;
        $data -> score = $request -> score;
        $data -> desc = $request -> desc;
        $data -> userid = $request -> userid;
        //dd($data);
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
     * Display the specified marks.
     */
    public function show(marksheets $marksheet)
    {
        // display specific marks for the teacher
         $marks = marksheets::find($id);
    }

    /**
     * Display the specified marks from searcehed data.
     */
    public function search(marksheets $marksheet)
    {
        // search specific marks for the teacher
         $search_marks = marksheets::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(marksheets $marksheet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, marksheets $marksheet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $datasheet = marksheets::find($id);
        $datasheet->delete();
        
        
        return redirect()->route('dash')->with('Success', 'Marks Deleted Successfull');
    }

    /**
     * **************************************************************************
     *                Handle all Import/Export sheets operations here.
     * **************************************************************************
     */
/*
 ######################################################################################################
 ******************************************************************************************************
                            Handel all spreed sheet imports
 ******************************************************************************************************
 ######################################################################################################
 */
public function processExcel(Request $request)
{
    // ...

    try {
        $import = new MarksImport();
        $import->import($file);

        if ($import->failures()->isNotEmpty()) {
            $failures = $import->failures();

            throw new ValidationException($import, $failures);
        }

        // Process the data if there are no validation errors

        return redirect()->back()->with('success', 'Excel file uploaded successfully.');
    } catch (ValidationException $e) {
        $failures = $e->failures();

        return back()->withErrors($failures)->withInput()->with('error', 'There are validation errors in the Excel file.');
    }
}
    public function ImportSheet(Request $request)
    {
            // if their is no errors, process the data
        //dd('import');
        /// The argument in file() is directly from the file input value in the blade.php
        Excel::import(new MarksImport, $request->file(key: 'marksfile'), 'Excel');

        return redirect()->back()->withSuccess('you uploaded successfully');
    }
    /*
     ######################################################################################################
     ******************************************************************************************************
                                Handel all spreed sheet exports
     ******************************************************************************************************
     ######################################################################################################
     */
    public function ExportSheet()
    {
        //dd('export');
        return Excel::download(new MarksExport, 'marksheet.xlsx');
    }
}
