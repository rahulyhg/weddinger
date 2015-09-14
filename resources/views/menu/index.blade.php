@extends('layouts.master')
@section('content')

<div class="row">
    <div class="col-md-12">
        <h1 class="header-text">
            {!! $menu->menu_name!!} 
            <i class="fa fa-edit " id="editMenuTitleBtn" data-toggle="modal" data-target="#menuTitleModal"></i></h1>
            <div class="modal fade" id="menuTitleModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="modalLabel">Change Menu Name</h4>
                        </div>
                        {!! Form::model($menu, array('class'=>'form-horizontal','route' => array('event.{eventSlug}.menu.update', $event->slug, $menu->id))) !!}
                        <input type="hidden" name="_method" value="PUT">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="menu_name" class="control-label col-md-3">Menu Name</label>
                                        <div class="col-md-5">
                                            {!! Form::text('menu_name',$menu->menu_name, ['class'=>'form-control','data-original'=>$menu->menu_name]) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 menu-items-section form-horizontal">
            <?php $menuItems = $menu->menu_items ?>
            @for($i =0; $i < $menuItems->count(); ++$i)
            <div class=" menu-item">
                <div class="row item-info edit " >
                    <div class="form-group">
                        <label class="control-label col-md-4">Name</label>
                        <div class="col-md-6">
                            <input type="text" id="menuItem_{{ $menuItems[$i]->id}}" original="{{ $menuItems[$i]->name }}" value="{{ $menuItems[$i]->name }}" class="form-control ">
                        </div>
                    </div>
                </div>
                <div class="row item-info view">
                    <h2>{{ $menuItems[$i]->name }}</h2>
                </div>
                <div class=" row item-controls ">
                    <div class="viewControls">
                        <button class="btn btn-success editItemButton" data-menu-item-id="menuItem_{{$menuItems[$i]->id}}"type="button">Edit</button>
                        <button class="btn btn-danger deleteItemButton" data-menu-item-id="menuItem_{{$menuItems[$i]->id}}"type="button">Delete</button>
                    </div>
                    <div class="editControls">
                        <button class="btn btn-warning cancelEditButton" data-menu-item-id="menuItem_{{$menuItems[$i]->id}}"type="button">Cancel</button>
                        <button class="btn btn-primary saveItemButton" data-menu-item-id="menuItem_{{$menuItems[$i]->id}}"type="button">Save</button>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>
    @endsection
    @section('scripts')
    <script type="text/javascript" src="/js/event/menu.js"></script>
    @endsection