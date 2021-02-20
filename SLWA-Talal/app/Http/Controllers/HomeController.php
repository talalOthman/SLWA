<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\events;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $events = [];
        $data = events::all()->toArray();
        //$data = events::where('user', "=" ,Auth::user()->email);
        foreach($data as $event){
            if($event['user'] == Auth::user()->email){
                $events[] = \Calendar::event(
                $event['title'], //event title
                true, //full day event?
                $event['start'], //start time (you can also use Carbon instead of DateTime)
                $event['end'], //end time (you can also use Carbon instead of DateTime)
                $event['id'], //optionally, you can specify an event ID
                );
            }
            
        }

            


        $calendar= \Calendar::addEvents ($events);
        
        return view('home', compact('calendar'));
        }

            
}
