<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SearchController extends Controller
{
    public function index()
    {
        // Perform the search based on the provided search term
        $results = "";// DB::table('posts')->where('title', 'LIKE', '%' . $key . '%')->get();


    
        // Render the search results using a view and pass the results data
        return view('dev.livesearch') ->with('results', $results);
    
        
    }

   
public function search($key)
{
    // Perform the search based on the provided search term
    $results = DB::table('posts')->where('title', 'LIKE', '%' . $key . '%')->get();

    // Render the search results using a view and pass the results data
    $html = view('dev.livesearch', compact('results'))->render();

    return $html;
}
}
