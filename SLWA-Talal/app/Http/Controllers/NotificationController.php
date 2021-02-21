<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;

class NotificationController extends Controller
{

    function index(){
        $notiflist = auth()->user()->unreadNotifications;
        $list = [];
        $i=0;
        foreach ($notiflist as $a){
            
            $notif = json_decode($a);
            $list[$i] = $notif->{'data'};
            $data[$i] = $list[$i]->{'data'};
            $i++;
        }
        
        return view('notification', compact('data'));
    }
    

}
