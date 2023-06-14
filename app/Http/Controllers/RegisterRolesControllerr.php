<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\rolespermissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;//import if you want to use sql commands directly
use Hash;
use Response;
use DateTime;

class RegisterRolesControllerr extends Controller
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
        //here you can display all the roles
        $roles = roles::all();
        return view('dash.roles') ->with('roles', $roles) ;
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
        // Store all the created pages in database
        // Validate al fields before saving to database
        $request ->validate([
            'type' => 'required',
        ]);
        
               //var_dump($request);
               //die();

        $attendantid = Auth::guard('guardsadmins')->User()->id;
        $accountid = Auth::guard('guardsadmins')->User()->accountid;

        // Save fields to database after validation 
        $roles = new roles();
        $roles -> type = $request -> type;
        $roles -> attendantid = $attendantid;
        $roles -> accountid = $accountid;
        $save = $roles -> save();

        /// check if data is saved to the database
     if ($save) {
         // if data saved successful
         return back() -> with('success', 'You have Saved successfully');
     }else{
         return back() -> with('fail', 'Something went wrong');
     }
    }

    /**
     * Save Permissions granted by an admin.
     */
    public function SavePermissions(Request $request)
    {
        $attendantid = Auth::guard('guardsadmins')->User()->id;
        $accountid = Auth::guard('guardsadmins')->User()->accountid;
        $mainroleid = $request-> mainroleid;
        //$regMonth= date('F');
        //$regYear=  date('Y');
        $date=new DateTime('NOW');
        $Regdate=date_format($date,"M-d-Y");
        //dd("Saved");


        if($mainroleid!="" || $mainroleid!=0){   

            if(isset($request->accesstatus)){
            
            //create and Initialize an empty array of selected ids
            //let's first delete ids of items which are not in this array
            $selected_ids = array();
            foreach ($request->perm_id as $selected) {
            if($selected!=0){
            $selected_ids[] = $selected; //add id's of submitted form fieldds
            }
            }
            if(count($selected_ids) > 0){//check if there are any id's in an array
            // Get the ids separated by comma
            $in_clause_ids = implode(", ", $selected_ids);
            $sqlQuery =DB::delete('Delete from rolespermissions where roleid=:roleid 
                                  AND accountid=:accountid 
                                  AND id NOT IN ('.$in_clause_ids.')',[
                                    'roleid'=>$mainroleid,'accountid'=>$accountid
                                ]);
            }
            /////////////////////////////////////////////////

            //updating
        for ($i = 0; $i < count($request->accesstatus); $i++) {

            if($request->perm_id[$i] <= 0 || $request->perm_id[$i] == ""){
            //create new data
        $data = new rolespermissions();
        $data->roleid = $request->roleid[$i];
        $data->pageid = $request->pageid[$i];
        $data->attendantid = $attendantid;
        $data->accesstatus = $request->accesstatus[$i+1];//not recognising 0 as index
        $data->createstatus=$request->createstatus[$i+1];//not recognising 0 as index
        $data->deletestatus=$request->deletestatus[$i+1];//not recognising 0 as index
        $data->editstatus=$request->editstatus[$i+1];//not recognising 0 as index
        $data->viewstatus=$request->viewstatus[$i+1];//not recognising 0 as index
        $data->attendantid = $attendantid;
        $data->accountid = $accountid;

        //echo"createstatus".$request->createstatus[$i+1]; 
        //var_dump($request->createstatus);
        //var_dump($request->all()); die();
        //var_dump($request->all());
         //var_dump($request->pageid[$i]); die();
              $data->save();
        }else{
        //update
            $data = rolespermissions::find($request->perm_id[$i]); 
            $data->roleid = $request->roleid[$i];
            $data->pageid = $request->pageid[$i];
            $data->attendantid = $attendantid;
            $data->accesstatus = $request->accesstatus[$i+1];//not recognising 0 as index
            $data->createstatus = $request->createstatus[$i+1];//not recognising 0 as index
            $data->deletestatus = $request->deletestatus[$i+1];//not recognising 0 as index
            $data->editstatus = $request->editstatus[$i+1];//not recognising 0 as index
            $data->viewstatus = $request->viewstatus[$i+1];//not recognising 0 as index
            $data->attendantid = $attendantid;
            $data->accountid = $accountid;
             $data->save();

        }//end else

                } //end for loop 
            }
        }

              //return redirect('update-rolesperm-data/'.$mainroleid)
                     //->with('success','Info saved Successfully '); 
                     return redirect()->back()->with('permissionsuccess','Permission saved Successfully ');

    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $attendantid = Auth::guard('guardsadmins')->User()->id;
        $accountid = Auth::guard('guardsadmins')->User()->accountid;

        /// using sql directly to get roles from database
        $useroles = roles::find($id);

        // join the two tables (pages & permissions with left join) and pass the data
        $usepagesdata = DB::select('select *,roles_pages.id as page_id, 
                                            roles_perm.id as perm_id 
                                            from rolespages as roles_pages 
                                            Left join rolespermissions as roles_perm 
                                            on roles_pages.id = roles_perm.pageid 
                                            AND roles_perm.roleid=:roleid 
                                            AND roles_perm.accountid=:accountid',
                                            [
                                                 'roleid'=>$id,'accountid'=>$accountid
                                             ]);
           //dd($usepagesdata); 
            //die();
   
        return view('dash.permission')
                  ->with('ShowRole',$useroles)
                    //->with('PermissionsInfo',$permissionsdata)
                  ->with('usepagesdata',$usepagesdata);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(roles $roles)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $roles = roles::find($id);
        $roles->delete();
        
        
        return redirect()->route('go2roles')->with('Success', 'Role Deleted Successfull');
    }

    /**
     * Delete the specified row without using resource route.
     */
    public function delete($id)
    {
        //roles::where('id', '=', $id)->delete();
        
        //return redirect()->route('go2roles')->with('delete-role', 'Role Deleted Successfull');
    }
}
