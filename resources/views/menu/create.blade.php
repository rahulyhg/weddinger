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
@endsection