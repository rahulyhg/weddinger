<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuItemRequest;
use App\Models\MenuItem;
use App\Models\Menu;
class MenuItemController extends Controller
{
    private $menuItem;

    public function __construct(MenuItem $menuItem)
    {
        $this->menuItem = $menuItem;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuItemRequest  $request
     * @return Response
     */
    public function store(MenuItemRequest $request, $eventSlug, $menuId)
    {
        $this->menuItem->newInstance();
        $menu = Menu::findOrFail($menuId);

        $this->menuItem->fill($request->input());
        $this->menuItem->menu_id = $menu->id;
        $this->menuItem->save();
        
        return redirect()->route('event.{eventSlug}.menu.index',[$menu->event->slug])->with(compact('menu','event'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  MenuItemRequest  $request
     * @param  int  $id
     * @return Response
     */
    public function update(MenuItemRequest $request, $eventNameSlug, $menuItemId)
    {
        $menuItem = $this->menuItem->findOrFail($menuItemId);
        $menuItem->fill($request->input());
        $menuItem->save();
        return response()->json(['message'=>"success","menu-item"=>$menuItem]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($eventSlug,$menuId,$menuItemId)
    {
        $menuItem = $this->menuItem->findOrFail($menuItemId);
        $itemName = $menuItem->name;
        $menuItem->delete();
        return response()->json(['message'=>$itemName.' deleted successfully']);
        
    }
}
