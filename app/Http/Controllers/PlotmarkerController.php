<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PlotmarkerController extends Controller
{
     /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequest()

    {

        return view('ajaxRequest');

    }

   

    /**

     * Create a new controller instance.

     *

     * @return void

     */

    public function ajaxRequestget(Request $request)

    {
        
        $link = mysqli_connect("localhost", "root", "", "map");
 
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        // Start XML file, create parent node

        // Select all the rows in the markers table

        $locations = DB::table('markers')->select('lat','lng')->get();

        // Iterate through the rows, adding XML nodes for each
    }
       
        
}



?>
       

 

