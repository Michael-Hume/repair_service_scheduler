class Bike_Category {
    constructor(id, name) {
        this.id = id;
        this.name = name;
    }
}

class Bike_Model {
    constructor(id, name, cat_id, level_sys, size_sys, wheel_size_sys) {
        this.id = id;
        this.name = name;
        this.cat_id = cat_id;
        this.level_sys = level_sys;
        this.size_sys = size_sys;
        this.wheel_size_sys = wheel_size_sys;
    }
}

class Bike_Level {
    constructor(id, name, level_sys) {
        this.id = id;
        this.name = name;
        this.level_sys = level_sys;
    }
}

class Bike_Size {
    constructor(id, name,size_sys) {
        this.id = id;
        this.name = name;
        this.size_sys = size_sys;
    }
}

class Bike_Wheel_Size {
    constructor(id, name, wheel_size_sys) {
        this.id = id;
        this.name = name;
        this.wheel_size_sys = wheel_size_sys;
    }
}

class Bike_Color {
    constructor(id, name) {
        this.id = id;
        this.name = name;
    }
}


var color_sel = document.getElementById("pri_color_sel").value;
var sec_color_sel = document.getElementById("sec_color_sel").value;
var category_sel = document.getElementById("category_sel").value;
var model_sel = document.getElementById("model_sel").value;
var level_sel = document.getElementById("level_sel").value;
var size_sel = document.getElementById("size_sel").value;
var wheel_size_sel = document.getElementById("wheel_size_sel").value;


function populate_select_options(id, array){
    // set 'select' to the current select dropdown box to be altered.
    var select = document.getElementById(id);
    for(index in array) {
        select.options[select.options.length] = new Option(array[index].name, array[index].id);
    }
}

function populate_next_field(field, bike_fields){
    //console.log("SELECTED: " + document.getElementById("category_sel").options[document.getElementById("category_sel").selectedIndex].value);

    for (index in bike_fields){
        //console.log("Field: " + bike_fields[index]);
    }
    switch(field) {
        case 0:
            populate_model_select_options("model_sel", category_obj_array, model_obj_array, "model", field);
            break;
        case 1:
            populate_model_select_options("level_sel", model_obj_array, level_obj_array, "level", field);
            break;
        case 2:
            populate_model_select_options("size_sel", model_obj_array, size_obj_array, "size", field);
            break;
        case 3:
            populate_model_select_options("wheel_size_sel", model_obj_array, wheel_size_obj_array, "wheel_size", field);
            break;
        case 4:
            populate_model_select_options("pri_color_sel", model_obj_array, color_obj_array, "color", field);
            break;
        default:
          // code block
    }
};

function populate_model_select_options(id, tier_1_array, tier_2_array, field, field_idx){
    // Set 'select' to the current select dropdown box to be altered.
    var select = document.getElementById(id);
    reset_fields(field_idx);

    switch(field) {
        case 'model':
            // Get the category the user has selected
            selected_category = document.getElementById("category_sel").options[document.getElementById("category_sel").selectedIndex];
            selected_category_id = selected_category.value;
            selected_category_name = selected_category.text;
            console.log("Showing " + selected_category_name + " bike models.");

            // Iterate all models and make/add Options for those that match the category selected
            for(index in tier_2_array) {
                // If the model's cat_id matched the selected_cat_id, make/add Option to dropdown
                if (tier_2_array[index].cat_id == selected_category_id){
                    select.options[select.options.length] = new Option(tier_2_array[index].name, tier_2_array[index].id);
                };
            }
        break;
        // For the selected model get model's level sys
        case 'level':
            selected_model = document.getElementById("model_sel").options[document.getElementById("model_sel").selectedIndex];
            selected_model_id = selected_model.value;
            selected_model_name = selected_model.text;
            
            console.log("Searching for level system used...");
            for(index in tier_1_array) {
                // If the level's level_sys matches the selected_model_level_sys, make/add Option to dropdown
                if (tier_1_array[index].id == selected_model_id){
                    console.log("Level System found at id: "+ tier_1_array[index].id);
                    console.log("Level System found at name: "+ tier_1_array[index].name);
                    selected_model_level_sys = tier_1_array[index].level_sys;
                    console.log("Level System found, system: "+ selected_model_level_sys);
                };
            }
            
            console.log("Loading level system...");
            for(index in tier_2_array) {
                // If the level's level_sys matches the selected_model_level_sys, make/add Option to dropdown
                console.log("Checking: " + tier_2_array[index].name);
                if (tier_2_array[index].level_sys == selected_model_level_sys){
                    console.log("Creating Option: " + tier_2_array[index].name);
                    select.options[select.options.length] = new Option(tier_2_array[index].name, tier_2_array[index].id);
                };
            }
        break;

        case 'size':
            selected_model = document.getElementById("model_sel").options[document.getElementById("model_sel").selectedIndex];
            selected_model_id = selected_model.value;
            selected_model_name = selected_model.text;
                
            console.log("Searching for size system used...");
            for(index in tier_1_array) {
                // If the size's size_sys matches the selected_model_size_sys, make/add Option to dropdown
                if (tier_1_array[index].id == selected_model_id){
                    console.log("Size System found at id: "+ tier_1_array[index].id);
                    console.log("Size System found at name: "+ tier_1_array[index].name);
                    selected_model_size_sys = tier_1_array[index].size_sys;
                    console.log("Size System found, system: "+ selected_model_size_sys);
                };
            }
                
            console.log("Loading size system...");
            for(index in tier_2_array) {
                // If the size's size_sys matches the selected_model_size_sys, make/add Option to dropdown
                console.log("Checking: " + tier_2_array[index].name);
                if (tier_2_array[index].size_sys == selected_model_size_sys){
                    console.log("Creating Option: " + tier_2_array[index].name);
                    select.options[select.options.length] = new Option(tier_2_array[index].name, tier_2_array[index].id);
                };
            }
        break;

        case 'wheel_size':
            selected_model = document.getElementById("model_sel").options[document.getElementById("model_sel").selectedIndex];
            selected_model_id = selected_model.value;
            selected_model_name = selected_model.text;
                
            console.log("Searching for wheel size system used...");
            for(index in tier_1_array) {
                // If the size's size_sys matches the selected_model_size_sys, make/add Option to dropdown
                if (tier_1_array[index].id == selected_model_id){
                    console.log("Wheel Size System found at id: "+ tier_1_array[index].id);
                    console.log("Wheel Size System found at name: "+ tier_1_array[index].name);
                    selected_model_wheel_size_sys = tier_1_array[index].wheel_size_sys;
                    console.log("Wheel Size System found, system: "+ selected_model_wheel_size_sys);
                };
            }
                
            console.log("Loading wheel size system...");
            for(index in tier_2_array) {
                // If the size's size_sys matches the selected_model_size_sys, make/add Option to dropdown
                console.log("Checking: " + tier_2_array[index].name);
                if (tier_2_array[index].wheel_size_sys == selected_model_wheel_size_sys){
                    console.log("Creating Option: " + tier_2_array[index].name);
                    select.options[select.options.length] = new Option(tier_2_array[index].name, tier_2_array[index].id);
                };
            }
        break;

        case 'color':
            // Get the category the user has selected
            selected_category = document.getElementById("pri_color_sel").options[document.getElementById("pri_color_sel").selectedIndex];
            selected_category_id = selected_category.value;
            selected_category_name = selected_category.text;
            console.log("Showing " + selected_category_name + " primary colors.");

            // Iterate all models and make/add Options for those that match the category selected
            for(index in tier_2_array) {
                // If the model's cat_id matched the selected_cat_id, make/add Option to dropdown
                if (tier_2_array[index].cat_id == selected_category_id){
                    select.options[select.options.length] = new Option(tier_2_array[index].name, tier_2_array[index].id);
                };
            }
        break;

            

            // For the selected model get model's size sys

            // For the selected model get model's wheel size sys

            /*
            console.log("Showing " + document.getElementById("model_sel").options[document.getElementById("model_sel").selectedIndex].name + " levels.");
            for(index in array) {
                if (array[index].level_sys == selected_model_id){
                    select.options[select.options.length] = new Option(array[index].name, array[index].id);
                };
            }

            console.log("Showing " + document.getElementById("model_sel").options[document.getElementById("model_sel").selectedIndex].name + " sizes.");
            for(index in array) {
                if (array[index].cat_id == cat_sel_id){
                    select.options[select.options.length] = new Option(array[index].name, array[index].id);
                };
            }
            */

          break;
          case 'size':
            // code block
            break;
          case 'wheel_size':
            // code block
            break;
        default:
          // code block
      }
}

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

 function reset_fields(curr_idx){
    var i=0;
    var select;
    var num_fields = bike_fields.length;
    console.log("-> " + num_fields + " fields, starting scrub at " + curr_idx + " [" + bike_fields[curr_idx] + "]");
    for(index in bike_fields){
        console.log("Index: " + index + " -> " + bike_fields[index]);
    }
    for(i=curr_idx; i<num_fields-3; i++) {
        // Set 'select' to the current select dropdown box to be altered.
        select = document.getElementById(bike_fields[i]);
        console.log("Clearing " + bike_fields[i]);
        //console.log("Remaining Options: " + bike_fields.length);
        var k ,L = select.options.length - 1;
        for(k = L; k >= 1; k--) {
            select.options.remove(k);
        }
    }
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