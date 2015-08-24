@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="header-text">Create Menu</h1>
    </div>
</div>

{!! Form::model($menu, array('class'=>'form-horizontal','route' => array('event.{eventSlug}.menu.store', $event->id))) !!}
<input type="hidden" name="event_id" id="event_id" value="{{ $event->id }}">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="menu_name" class="control-label col-md-3">Menu Name</label>
            <div class="col-md-3">
                {!! Form::text('menu_name',$menu->menu_name, ['class'=>'form-control','data-original'=>$menu->menu_name]) !!}
            </div>
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary pull-right">Save</button>
{!! Form::close() !!}
<!-- <div class="row">
    <div class="col-md-12">
        <h3 class="header-text">Menu Items</h3>
        <button class="btn btn-success"><i class="fa fa-plus"></i> Add Item</button>
    </div>
</div>
<div class="row">
    <div class="col-md-12 menu-items-section" id="menuItems">
        <div class="form-group menu-item">
            <label class="control-label col-md-4">Item Name</label>
            <div class="col-md-6">
                <input type="text" id="menu_items[0]['name']" name="menu_items[0]['name']" class="form-control ">
            </div>
        </div>
         <div class="form-group menu-item">
            <label class="control-label col-md-4">Item Name</label>
            <div class="col-md-6">
                <input type="text" id="menu_items[1]['name']" name="menu_items[1]['name']" class="form-control ">
            </div>
        </div>
    </div>
</div> -->
@endsection