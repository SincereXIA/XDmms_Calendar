<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class CalenderController extends Controller
{
    //
    public function index()
    {
        //$events = Event::where('event_time','>',\Carbon\Carbon::now()->addMonths(-3)->timestamp);
        $events = Event::all();
        return view('calender.index',compact('events'));
    }
}
