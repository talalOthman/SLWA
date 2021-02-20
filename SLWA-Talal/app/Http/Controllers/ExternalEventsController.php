<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\movies;

class ExternalEventsController extends Controller
{
    public function index(){
        $movie = movies::All();
        return view('api', ['movie'=>$movie]);
    }
}
