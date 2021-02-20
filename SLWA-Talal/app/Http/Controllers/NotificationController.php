<?php

  

namespace App\Http\Controllers;

  

use Illuminate\Http\Request;

use App\User;

use Notification;

use App\Notifications\eventAdded;

  

class NotificationController extends Controller

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

        return view('home');

    }

  

    public function sendNotification()

    {

        $user = User::first();

  

        $details = [

            'greeting' => 'Hi '.$user.name(),

            'body' => 'You have successfully added your event',

            'thanks' => 'Thank you for using our services',

            'actionText' => 'Go to table',

            'actionURL' => url('/'),

            'order_id' => 101

        ];

  

        Notification::send($user, new eventAdded($details));

   

        dd('done');

    }

  

}