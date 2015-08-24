@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="header-text">{{$event->event_name}} Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!! Form::model($event, array('class'=>'form-horizontal','id'=>'editForm' ,'route' => array('event.update', $event->id))) !!}
            <input type="hidden" name="_method" value="PUT">
            <div class="form-group">
                <label for="event_name" class="control-label col-md-3">Event Name</label>
                <div class="col-md-4">
                    {!! Form::text('event_name',$event->event_name, ['class'=>'form-control','data-original'=>$event->event_name]) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="event_start_date" class="control-label col-md-3">Start Date/Time</label>
                <div class="col-md-2">
                    {!! Form::text('event_start_date',$event->event_start_date->format('d/m/Y h:i A'), ['class'=>'form-control datetimepicker','data-original'=>$event->event_start_date->format('d/m/Y h:i A')]) !!}
                </div>
            </div>
            <div class="form-group">
                <label for="event_end_date" class="control-label col-md-3">Start Date/Time</label>
                <div class="col-md-2">
                    {!! Form::text('event_end_date',$event->event_end_date->format('d/m/Y h:i A'), ['class'=>'form-control datetimepicker','data-original'=>$event->event_end_date->format('d/m/Y h:i A')]) !!}
                </div>
            </div>
            <div class="form-group form-buttons">
                <button type="button" id="editBtn" class="btn btn-success pull-right"><i class="fa fa-pencil-square-o"></i> Edit</button>
                <button type="submit" id="submitBtn" class="btn btn-primary pull-right"><i class="fa fa-floppy-o"></i> Save</button>
                <button type="button" id="cancelBtn" class="btn btn-danger pull-right"><i class="fa fa-remove"></i> Cancel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h1 class="header-text">Tools</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 dashboard-tabs">
            <a class=" tab">
                <div class="tab-icon">
                    <div class="icon-circle">
                        <i class="fa fa-users"></i>
                    </div>
                </div>
                <div class="tab-text">Guests</div>
            </a>
            <a class=" tab" href="{{ route('event.{eventSlug}.menu.index',[$event->slug]) }}">
                <div class="tab-icon">
                    <div class="icon-circle">
                        <i class="fa fa-map"></i>
                    </div>
                </div>
                <div class="tab-text">Menu</div>
            </a>
            <a class=" tab">
                <div class="tab-icon">
                    <div class="icon-circle">
                        <i class="fa fa-object-group"></i>
                    </div>
                </div>
                <div class="tab-text">Table Seating</div>
            </a>
            <a class=" tab">
                <div class="tab-icon">
                    <div class="icon-circle">
                        <i class="fa fa-instagram"></i>
                    </div>
                </div>
                <div class="tab-text">Instastream</div>
            </a>
            <a class=" tab">
                <div class="tab-icon">
                    <div class="icon-circle">
                        <i class="fa fa-gift"></i>
                    </div>
                </div>
                <div class="tab-text">Gift Registry</div>
            </a>

        </div>
    </div>
</div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{ elixir('js/event/dashboard.js') }}"></script>
@endsection