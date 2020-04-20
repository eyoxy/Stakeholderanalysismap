<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function Index(){
        $title = 'WELCOME TO MUNI UNIVERSITY BUSINESS INCUBATION CENTER!';
        return view('Pages.Index', compact('title')); 
    }

    public function welcome(){
        return view('Pages.welcome');
    }

    public function savecoords(){
        return view('Pages.savecoords');
    }

    public function Stakeholders(){
        $title = 'Stakeholders';
        return view('Pages.Stakeholders', compact('title'));
    }

   /* public function Services(){
        $data = array(
            'title' => 'Services',
            'Services' => ['Sofware Development', 'Climate Smart Agriculture', 'Co-Office Space', 'Expert Consultancy', 'Idea Pitching and Developmet']
        );
        return view('Pages.Services')->with($data);
    }
    */
    public function MApping(){
        return view('Pages.Mapping');
    }

    public function Contact(){
        return view('Pages.Contact');
    }
}


