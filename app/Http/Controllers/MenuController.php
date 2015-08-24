<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Menu;
use App\Models\MenuItem;
use App\Http\Requests\MenuRequest;
class MenuController extends Controller
{

     /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct(Event $event, Menu $menu)
     {
        $this->middleware('auth');
        $this->event = $event;
        $this->menu = $menu;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($eventSlug)
    {
        $event =Event::findBySlugOrIdOrFail($eventSlug); 
        $menu = $event->menu;
        if(is_null($menu))
        {
            return redirect()->route('event.{eventSlug}.menu.create',[$event->slug]);
        }
        return view('menu.index')->with(compact('event','menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($eventSlug)
    {
        $event =Event::findBySlugOrIdOrFail($eventSlug); 
        $menu = $this->menu->newInstance();
        return view('menu.create')->with(compact('event','menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(MenuRequest $request)
    {
        $menu = $this->menu;

        $menu->fill($request->input());
        $menu->save();
        $event = $menu->event;
        return redirect()->route('event.{eventSlug}.menu.index',[$event->slug])->with(compact('menu','event'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($eventSlug)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
