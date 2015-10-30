@extends('layouts.master')
@section('content')
<div class="row">
    <div class="col-md-12">
        <h1 class="header-text">Instastream</h1>
    </div>
</div>
<div class="row" id="hashtags">
    <div class="col-md-12 add-hashtags">

    </div>

    <div class="col-md-12 current-hashtags">
        
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="{{ elixir('js/event/instastream.js') }}"></script>
@endsection

<!-- <div class="col-md-6 current-hashtags">
            <h2 class="header-text">Current Hashtags</h2>
            @foreach($event->hashtags as $hashtag)
            <div class="form-horizonal">
                <div class="col-md-2">
                    <div class="checkbox">
                        <label for="{{ $hashtag->tag_name }}_{{ $hashtag->id }}" class="hashtag">
                            <input type="checkbox" id="{{ $hashtag->tag_name }}_{{ $hashtag->id }}" name="{{ $hashtag->tag_name }}_{{ $hashtag->id }}" data-hash-tag-id="{{ $hashtag->id }}"> 
                            #{{ $hashtag->tag_name }}
                        </label>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h2 class="header-text">Add Hashtag</h2>
            <form class="form-horizontal" action="{{ route('event.instastream.hashtag.create',$event->slug) }}" method="POST">
                {!! Form::token() !!}
                <div class="form-group">
                    <label for="tag_name" class="col-md-4 control-label">Tag Name small</label>
                    <div class="col-md-5">
                        <input type="text" id="tag_name" name="tag_name" class="form-control" placeholder="Exclude the '#'">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Submit</button>
            </form>
        </div> -->