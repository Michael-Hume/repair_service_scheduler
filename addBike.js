class Bike_Model {
    constructor(id, name, cat_id) {
        this.id = id;
        this.name = name;
        this.cat_id = cat_id;
    }
}

var color_sel = document.getElementById("pri_color_sel").value;
var sec_color_sel = document.getElementById("sec_color_sel").value;
var category_sel = document.getElementById("category_sel").value;
var model_sel = document.getElementById("model_sel").value;
var level_sel = document.getElementById("level_sel").value;
var size_sel = document.getElementById("size_sel").value;
var wheel_size_sel = document.getElementById("wheel_size_sel").value;

function add_bike_field(bike_fields, new_field){
    //alert("adding new field: " + new_field);
    bike_fields.push(new_field);
    return bike_fields;
}

function create_bike_fields(){
    //alert("creating bike_fields");
    var bike_fields = [];
    return bike_fields;
}

function print_bike_fields(bike_fields){
    //alert("printing!");
    alert("---> " + bike_fields);
};



function clickTest() {
    //alert("Click Test Run");
    //document.getElementById('category_sel').removeAttribute('disabled');
    document.getElementById('category_sel').removeAttr('disabled');
 };

 function test_func(msg){
    alert(msg);
 };

function disableFields(bike_fields){
    
    document.getElementById("category_sel").disabled = true;

    bike_fields.forEach((cat) => {
        document.getElementById(cat).disabled = true;

    });
    
    
};
function enableFields(fields){
    //alert("enableFields Run");
    //document.getElementById("category_sel").removeAttribute('disabled');
    //document.getElementById("category_sel").disabled = false;
    curr_field = fields[0];
    //alert("Current Field: " + curr_field);
    document.getElementById(curr_field).disabled = false;
    fields.shift();
};



$(document).ready(function(){
    $.fn.enableCategory = function() { 
        document.getElementById('category_sel').removeAttribute('disabled');
    }
});