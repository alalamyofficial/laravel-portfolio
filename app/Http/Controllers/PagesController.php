<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Main;
use App\Service;
use App\Portfolio;
use App\About;

class PagesController extends Controller
{
    public function index(){

        $main = Main::first();
        $services = Service::all();
        $portfolios = Portfolio::all();
        $abouts = About::all();

        return view('pages.index')
        ->with('main',$main)
        ->with('services',$services)
        ->with('portfolios',$portfolios)
        ->with('abouts',$abouts);


    }

    public function dashboard(){

        $services = Service::all();
        $portfolios = Portfolio::all();
        $abouts = About::all();
    
        return view('pages.dashboard')
        ->with('num_of_services',$services)
        ->with('num_of_portfolios',$portfolios)
        ->with('num_of_abouts',$abouts);

    }







    
}
