<div class="form-group">
    <label for="event_name" class="control-label col-md-3">Event Name</label>
    <div class="col-md-4">
        {!! Form::text('event_name',$event->event_name, ['class'=>'form-control']) !!}
    </div>
</div>

<div class="form-group">
    <label for="event_start_date" class="control-label col-md-3">Start Date/Time</label>
    <div class="col-md-2">
        {!! Form::text('event_start_date',$event->event_start_date, ['class'=>'form-control datetimepicker']) !!}
    </div>
</div>
<div class="form-group">
    <label for="event_end_date" class="control-label col-md-3">Start Date/Time</label>
    <div class="col-md-2">
        {!! Form::text('event_end_date',$event->event_end_date, ['class'=>'form-control datetimepicker']) !!}
    </div>
</div>