var EditFormEngine = {
    $form: $(),
    $submitBtn: $(),
    $editBtn: $(),
    $cancelBtn: $(),
    formInputs:[],
    init:function(){
        this.$form = $("#editForm");
        this.$submitBtn = $("#submitBtn");
        this.$editBtn = $("#editBtn");
        this.$cancelBtn = $("#cancelBtn");

        this.$form.find('input[type="text"]').each(function(index, element){
            EditFormEngine.formInputs.push($(element));
        });
        this.initEventHandlers();
        this.disableEditing();

    },
    disableEditing:function(){
        this.formInputs.forEach(function($element){
            $element.val($element.attr('data-original'));   
            $element.prop('disabled',true);         
        });
        this.$cancelBtn.hide();
        this.$submitBtn.hide();
        this.$editBtn.show();
        this.$form
    },
    enableEditing:function(){
        this.formInputs.forEach(function($element){
            $element.prop('disabled',false);         
        });
        this.$cancelBtn.show();
        this.$submitBtn.show();
        this.$editBtn.hide();
    },
    initEventHandlers:function(){

        this.$editBtn.click(function(){
            EditFormEngine.enableEditing();
        });

        this.$cancelBtn.click(function(){
            EditFormEngine.disableEditing();
        });
    }
};

$(function(){
    EditFormEngine.init("editForm");
});