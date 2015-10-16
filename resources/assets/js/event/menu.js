$(function(){
    MenuEngine.init();
});

var MenuEngine = MenuEngine || {
    menuId:'',
    init:function(){
        this.menuId = $("#menuId").val();
        this.initEventHandlers();
    },
    initEventHandlers:function(){
        $(document).on('click','.editItemButton',function(){
            MenuEngine.showEditFields(this);
        });

        $(document).on('click','.cancelEditButton',function(){
            MenuEngine.cancelEdit(this);
            MenuEngine.hideEditFields(this);
        });

        $(document).on('click','.saveItemButton',function(){
            MenuEngine.saveChages(this);
        });

        $(document).on('click','.deleteItemButton',function(){
            MenuEngine.deleteItem(this);
        });
    },
    showEditFields:function(eventButton){
        $eventButton = $(eventButton);
        $parentDiv = $eventButton.parents(".item-controls");
        $viewDiv = $parentDiv.siblings('.view');
        $editDiv = $parentDiv.siblings('.edit');

        $viewControlsDiv = $eventButton.parent();
        $editControlsDiv = $eventButton.parent().siblings('.editControls');

        $editDiv.show();
        $editControlsDiv.show();

        $viewDiv.hide();
        $viewControlsDiv.hide();
    },
    hideEditFields:function(eventButton){
        $eventButton = $(eventButton);
        $parentDiv = $eventButton.parents(".item-controls");
        $viewDiv = $parentDiv.siblings('.view');
        $editDiv = $parentDiv.siblings('.edit');

        $editControlsDiv = $eventButton.parent();
        $viewControlsDiv = $eventButton.parent().siblings('.viewControls');

        $editDiv.hide();
        $editControlsDiv.hide();

        $viewDiv.show();
        $viewControlsDiv.show();
    },
    cancelEdit:function(eventButton){
        $eventButton = $(eventButton);
        $editDiv = $eventButton.parents(".item-controls").siblings('.edit');
        $menuItemInput = $editDiv.find('.menu-item-input');
        var originalValue = $menuItemInput.attr('data-original');
        $menuItemInput.val(originalValue);
    },
    saveChages:function(eventButton){
        $eventButton = $(eventButton);
        var menuItemId = $eventButton.attr('data-menu-item-id');
        var inputId = $eventButton.attr('data-menu-item-input');
        $menuItemInput = $("#"+inputId);
        var newMenuItemName = $menuItemInput.val();

        var request = $.ajax({
            url:"menu/menu-item/"+menuItemId,
            method:"PUT",
            dataType:"JSON",
            data:{ name:newMenuItemName }
        });
        request.done(function(msg){
            MenuEngine.updateMenuItem(msg['menu-item']);
            toastr.success('Updated ' +msg['menu-item'].name);
        });
        request.fail(function(jqXHR, msg){
            toastr.error(msg);
        });
    },
    updateMenuItem:function(menuItem){
        $parentDiv = $('#'+menuItem.id);
        $parentDiv.find('.item-name-title').html(menuItem.name);
        $("#menuItem_"+menuItem.id).attr('data-original',menuItem.name);
        //This is janky as all hell and should be fixed
        //Switch the whole thing to a more OOP format...later
        MenuEngine.hideEditFields($parentDiv.find('.saveItemButton'));
    },
    deleteItem:function(eventButton){
        if(confirm("Are you sure you want to delete this item?")){
            $eventButton = $(eventButton);
            var menuItemId = $eventButton.attr('data-menu-item-id');
            
            var request = $.ajax({
                url:"menu/"+ this.menuId +"/menu-item/"+menuItemId,
                method:"DELETE",
            });
            request.done(function(jqXHR, msg){
                $eventButton.parents('.menu-item').fadeOut(300,function(){
                    $(this).remove();
                });
                toastr.success(jqXHR.message);
            });
            request.fail(function(jqXHR, msg){
                toastr.error(msg);
            });
        }
    },

};

