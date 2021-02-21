<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\events;
use \Calendar;
use App\Models\movies;
use \Carbon\Carbon;
use Auth;
use Notification;
use App\Notifications\EventsNotification;
use App\Notifications\EventsNotification2;
use Illuminate\Notifications\Notifiable;


class FullcalendarController extends Controller
{

    public function insert(Request $request){

        $start = Carbon::createFromFormat('d/m/Y', $request->start)->format('Y-m-d');
        $end = Carbon::createFromFormat('d/m/Y', $request->end)->format('Y-m-d');





        $event = new events;
        $event->title = $request->title;
        $event->start = $start;
        $event->end = $end;
        if($request->description){
            $event->description = $request->description;
        }
        else{
            $event->description = NULL;
        }
        $event->user=Auth::user()->email;
        $event->save();

        $details = [

            'greeting' => 'Hi ',

            'body' => 'You have successfully added your event '.$event->title,

            'thanks' => 'Thank you for using our services',

            'notif_id' => rand(100000,1000000)

        ];

        $user = auth()->user();
        Notification::send($user, new EventsNotification());

        return redirect()->route('home')->with('successMsg', "Event inserted successfully");
    }

    public function insertApi($id){
        $event = new events;
        $movie = movies::find($id);
        $event->title = $movie->title;
        $event->start = $movie->start;
        $event->end = $movie->end;
        $event->description = "null";
        $event->user=Auth::user()->email;
        $event->save();


        $user = auth()->user();
        Notification::send($user, new EventsNotification());

        return redirect()->route('home')->with('successMsg', "Event inserted successfully");
    }

    public function update(Request $request){
        $data = events::find($request->id);
        $data->title = $request->title;
        $data->start = $request->start;
        $data->end = $request->end;
        $data->description = $request->description;
        return redirect()->route('home');
    }

    
    public function deleteRedirect(){
        $events = [];
        $list = [];
        $data = events::all();
        //$data = events::where('user', "=" ,Auth::user()->email);
        $i = 0;
        foreach($data as $event){
            if($event->user == Auth::user()->email){
                $list[$i] = $event;
                $i++;
            }
            
        }
        return view('delete', ['event'=>$list]);
    }

    public function delete($id){
        //$data = events::find($id);
        $data = events::where('id', $id);
        
//
        $user = auth()->user();
        Notification::send($user, new EventsNotification2());


//
        $data->delete();
        return redirect()->route('home')->with('successMsg', "Event Deleted successfully");
    }


}


