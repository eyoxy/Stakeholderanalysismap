<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapController extends Controller
{
    use FarhanWazir\GoogleMaps\GMaps;

    public function map()
        {
            $config['center'] = 'Yumbe District,Uganda';
            $config['zoom'] = '14';
            $config['map_height']='500px';
            $config['scrollwheel']=false;
            $config['geocodeCaching'] = true;

            $config['directions'] = true;
            $config['directionsStart'] = 'Arua District, Uganda';
            $config['directionsStart'] = 'Koboko District, Uganda';
            $config['directionsStart'] = 'Yumbe District, Uganda';
            $config['directionsStart'] = 'Moyo District, Uganda';
            $config['directionsStart'] = 'Adjumani District, Uganda';
            $config['directionsStart'] = 'Isingiro District, Uganda';
            $config['directionsEnd'] = 'Kiryadongo District, Uganda';
            $config['directionsDivID'] = 'DirectionsDiv';
    
            $gmap = new GMaps();
            $gmap->initialize($config);
         
            $map = $gmap->create_map();
            return view('map',compact('map'));
            
        }
}
