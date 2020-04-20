<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $link = mysqli_connect("localhost", "root", "", "map");
 
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $locations = DB::table('markers')->select('lat','lng')->get();
    // dd($locations);

    $map = GMaps::create_map();
    return view('welcome')->with('locations', $locations);
});
Route::post('savecoords', 'SaveCoordsController@ajaxRequestPost');
Route::get('plotmarker', 'PlotmarkerController@ajaxRequestget');
//Route::get('plotmarker', 'PlotmarkerController@plotmarker');
//Route::get('/map', 'MapController@map');
//Route::get('/savecoords');
Route::get('/Stakeholders', 'PagesController@Stakeholders');
Route::get('/Mapping', 'PagesController@Mapping');
Route::get('/Contact', 'PagesController@Contact');
/*Route::get('/Contact', 'PagesController@Contact');*/