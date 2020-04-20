<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class SaveCoordsController extends Controller
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

    public function ajaxRequestPost(Request $request)

    {
        $link = mysqli_connect("localhost", "root", "", "map");
 
        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }
        $latitude = $request->latitude;
        $longitude = $request->longitude;

        $input['lat'] = $latitude;
        $input['lng'] = $longitude;
        $sql = "INSERT INTO markers (lat, lng) VALUES ( '$latitude', '$longitude')";
        if(mysqli_query($link, $sql)){
            echo "Records added successfully.";
            return 'You have saved the following coordinates in the database: Latitude: ' . $latitude .' Longitude: ' . $longitude;
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
       

    }
}
