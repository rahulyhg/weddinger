@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
       <h1 class="header-text">Create Event</h1>
   </div>
</div>
<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" action="{{ route('event.store')}}" method="POST">
            {!! Form::token() !!}
            @include('event._form')
            <button type="submit" class="pull-right btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
