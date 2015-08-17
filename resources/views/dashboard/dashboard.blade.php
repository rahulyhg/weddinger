@extends('layouts/master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
        <h1 class="header-text">Dashboard</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 dashboard-tabs">
            <a class="col-md-4 tab">
                <div class="tab-icon">
                    <div class="icon-circle">
                        <i class="fa fa-object-group"></i>
                    </div>
                </div>
                <div class="tab-text">Table Seating</div>
            </a>

            <a class="col-md-4 tab">
                <div class="tab-icon">
                    <div class="icon-circle">
                        <i class="fa fa-instagram"></i>
                    </div>
                </div>
                <div class="tab-text">Instastream</div>
            </a>
        </div>
    </div>
</div>

@endsection