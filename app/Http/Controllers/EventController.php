<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Http\Requests\EventRequest;
use Auth;
use Carbon\Carbon;
class EventController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->middleware('auth');
        $this->event = $event;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('event.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $event = $this->event->newInstance();
        return view('event.create')->with(compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(EventRequest $request)
    {
        $event = $this->event->newInstance();

        $input = $request->input();

        $validator = $event->getValidator($input);
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors();
        }

        $event->event_name= $input['event_name'];
        $event->event_start_date = Carbon::createFromFormat('d/m/Y h:i A',$input['event_start_date']);
        $event->event_end_date = Carbon::createFromFormat('d/m/Y h:i A',$input['event_end_date']);
        $event->user_id = Auth::user()->id;

        $event->save();
        return redirect()->route('event.show',[$event->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($eventSlug)
    {
        $event = Event::findBySlugOrIdOrFail($eventSlug);

        if($event->user->id != Auth::user()->id)
        {
            return abort(404,"Sorry, We couldn't find what you're looking for");
        }
        return view('event.dashboard')->with(compact('event'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(EventRequest $request, $id)
    {
        $event = Event::findOrFail($id);

        $input = $request->input();

        $validator = $event->getValidator($input);
        if($validator->fails())
        {
            return redirect()->back()->withInput()->withErrors();
        }

        $event->event_name= $input['event_name'];
        $event->event_start_date = Carbon::createFromFormat('d/m/Y h:i A',$input['event_start_date']);
        $event->event_end_date = Carbon::createFromFormat('d/m/Y h:i A',$input['event_end_date']);

        $event->save();
        return redirect()->route('event.show',[$event->slug])->with('message','Event Updated');
    }   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
