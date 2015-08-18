@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="header-text">Events</h1>

    </div>
</div>

<div class="row">
    <div class="col-md-12 ">
    <a href="{{ route('event.create') }}" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-plus"></i> Add Event</a>
        <table class="table table-striped event-list">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Guest Count</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach(Auth::user()->events as $event)
                <tr>
                    <td>{{ $event->event_name }}</td>
                    <td>{{ $event->event_start_date->format('l jS \\of F Y h:i:s A') }}</td>
                    <td>{{ $event->event_end_date->format('l jS \\of F Y h:i:s A') }}</td>
                    <td>{{ $event->guestList->count() }}</td>
                    <td><a href="{{ route('event.show', [$event])}}" class="btn btn-primary">View</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection