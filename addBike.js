var color_sel = document.getElementById("color_sel").value;
var sec_color_sel = document.getElementById("sec_color_sel").value;
var category_sel = document.getElementById("category_sel").value;
var model_sel = document.getElementById("model_sel").value;
var level_sel = document.getElementById("level_sel").value;
var size_sel = document.getElementById("size_sel").value;
var wheel_size_sel = document.getElementById("wheel_size_sel").value;


function foo() {
    alert("Submit button clicked!");
    return true;
 }





$(document).ready(function(){
    $('body').on('keyup', 'input.phone-input', function(){
        if($(this).val().length === this.size){
            var inputs = $('input.phone-input');
            inputs.eq(inputs.index(this) + 1).focus();
        }
    });
});