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
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $eventSlug, $menuId)
    {
        $this->menu = Menu::findOrFail($menuId);
        $this->menu->fill($request->input());
        $this->menu->save();
        return redirect()->back()->with('message','Menu name updated');
        //Do this homie
    }

}
