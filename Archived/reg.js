$(document).ready(function(){
    $('body').on('keyup', 'input.phone-input', function(){
        if($(this).val().length === this.size){
            var inputs = $('input.phone-input');
            inputs.eq(inputs.index(this) + 1).focus();
        }
    });
});