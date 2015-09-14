$(function(){
    MenuEngine.init();
});

var MenuEngine = {
    init:function(){
        this.initEventHandlers();
    },
    initEventHandlers:function(){

        $(".editItemButton").click(function(){
            $this = $(this);
            
            $viewDiv = $this.parents(".item-controls").siblings('.view');
            $editDiv = $this.parents(".item-controls").siblings('.edit');
            
            $viewControlsDiv = $this.parent();
            $editControlsDiv = $this.parent().siblings('.editControls');

            $editDiv.show();
            $editControlsDiv.show();

            $viewDiv.hide();
            $viewControlsDiv.hide();
        });

        $(".cancelEditButton").click(function(){
            $this = $(this);
            
            $viewDiv = $this.parents(".item-controls").siblings('.view');
            $editDiv = $this.parents(".item-controls").siblings('.edit');
            
            $editControlsDiv = $this.parent();
            $viewControlsDiv = $this.parent().siblings('.viewControls');

            $editDiv.hide();
            $editControlsDiv.hide();

            $viewDiv.show();
            $viewControlsDiv.show();
        });
    }

};

