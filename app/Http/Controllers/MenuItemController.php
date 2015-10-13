<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuItemRequest;
use App\Models\MenuItem;
class MenuItemController extends Controller
{
    private $menuItem;

    public function __construct(MenuItem $menuItem)
    {
        $this->menuItem = $menuItem;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  MenuItemRequest  $request
     * @return Response
     */
    public function store(MenuItemRequest $request)
    {
        //
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
        $menuItem = MenuItem::findOrFail($menuItemId);
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
    public function destroy($id)
    {
        //
    }
}
