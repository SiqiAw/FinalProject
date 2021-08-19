<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use MaddHatter\LaravelFullCalendar\Facades\Calendar;
use Session;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        $event = [];
        
        foreach($events as $row){
            $enddate = $row->end_date."24:00:00";
            $event[] = \Calendar::event(
                $row->eventname,
                false,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }

        $calendar = \Calendar::addEvents($event);
        return view('calendarpage', compact('events','calendar'));

    }

    public function display()
    {
        return view('addevent');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'eventname' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $events = new Event;

        $events->eventname = $request->input('eventname');
        $events->color = $request->input('color');
        $events->start_date = $request->input('start_date');
        $events->end_date = $request->input('end_date');

        $events->save();

        Session::flash('success', "Event add successful!");
        return redirect()->route('showCalendar');

    }

    public function show()
    {
        $events = Event::all();
        return view('eventlist')->with('events', $events);
    }

    public function edit($id)
    {
        $events = Event::find($id);
        return view('editevent', compact('events','id'));
    }    

    public function update()
    {
        $r=request();//retrive submited form data
        $events = Event::find($r->ID); //get the record based on product ID
        
        $this->validate($r,[
            'eventname' => 'required',
            'color' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $events->eventname = $r->eventname;
        $events->color = $r->color;
        $events->start_date = $r->start_date;
        $events->end_date = $r->end_date;

        $events->save();

        Session::flash('success', "Event update successful!");
        return redirect()->route('showCalendar');

    }

    public function delete($id) 
    {
        $events = Event::find($id);
        $events->delete();

        Session::flash('success', "Event deleted!");
        return redirect()->route('showCalendar');
        
    }
}
