<?php

namespace App\Http\Controllers;

use App\Models\posts;
use Illuminate\Http\Request;

class RegisterPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //here you can display all the posts
        $myposts = posts::all();
        return view('dev.posts') ->with('myposts', $myposts);
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

        $request ->validate([
            'titleid' => 'required',
             'title' => 'required',
             'body' => 'required',
        ]);
             //var_dump($request);
             //die();
             // Save posts to database after validation 
             $posts = new posts();
             
             $posts -> titleid = $request -> titleid;
             $posts -> title = $request -> title;
             $posts -> body = $request -> body;
             $save_posts = $posts -> save();
     
             /// check if data is saved to the database
          if ($save_posts) {
              // if data saved successful
              return back() -> with('success', 'You have Saved successfully');
          }else{
              return back() -> with('fail', 'Something went wrong');
          }

    }

    /**
     * Display the specified resource.
     */
    public function show(posts $posts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(posts $posts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, posts $posts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $post = posts::find($id);
        $post->delete();
        
        
        return redirect()->route('go2posts')->with('Success', 'Post Deleted Successfull');
    }
}
