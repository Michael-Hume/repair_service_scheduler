/*
$(document).ready(function() {
		
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,basicWeek,basicDay'
        },
        defaultDate: '2021-8-1',
        navLinks: true, // can click day/week names to navigate views
        editable: true,
        eventLimit: true, // allow "more" link when too many events
        events: [
            
            {
                title: 'Long Event',
                start: '2016-12-07',
                end: '2016-12-10'
            },
            
            {
                title: 'Lunch',
                start: '2016-12-12T12:00:00'
            }
        ]
    });
});
*/

class Repair{
    cust_id = 0; 
    drop_date;
    drop_time;
    service_date;
    pickup_date;
    parts_list;

    constructor(cust_id, curr_date, time){
        this.cust_id = cust_id;
        this.drop_date = curr_date;
        this.drop_time = curr_time;
    }
};

class Customer{
    cust_id;
    firstname;
    lastname;
    phone;
    text_opt;
    email;
    bicycles;

    constructor(cust_id, firstname, lastname, phone, text_opt){
        this.cust_id = cust_id;
        this.firstname = firstname;
        this.lastname = lastname;
        this.phone = phone;
        this.text_opt = text_opt;
    }
}

class Bicycle{
    brand;
    model;
    bike_id;
    cat_id;
    level_id;
    name;
    part_num;
    price;
    pri_color_id;
    sec_color_id;
    tert_color_id;
    quart_color_id;
    size_id;
    SKU;
    tert_color_id;
    wheel_size_id;
    year;
    /*
    constructor(brand, model, color){
        this.brand = brand;
        this.model = model;
        this.color = color;
    }
    */
    constructor(bike_id, cat_id, level_id, name, part_num, price, pri_color_id, sec_color_id, tert_color_id, quart_color_id, size_id, SKU, wheel_size_id, year){
        this.brand = "Specialized";
        this.bike_id = bike_id;
        this.cat_id = cat_id;
        this.level_id = level_id;
        this.name = name;
        this.part_num = part_num;
        this.price = price;
        this.pri_color_id = pri_color_id;
        this.sec_color_id = sec_color_id;
        this.tert_color_id = tert_color_id;
        this.quart_color_id = quart_color_id;
        this.size_id = size_id;
        this.SKU = SKU;
        this.wheel_size_id = wheel_size_id;
        this.year = year;
    }
}

function time_unit_builder(){
    console.log("Running time_unit_builder...");
    var daily_units = [];
    hourly_units = ["00", "15", "30", "45"];
    hour = 9;

    while(hour<18){
        console.log("Hour: " + hour);
        
        hourly_units.forEach((unit, index) => 
            daily_units.push(hour + ":" + unit));
        hour++;
            
    };
    return daily_units;
};

function proto_sked_builder(day_col, modal){
    daily_tune_ups = 4;
    daily_adjustments = 2;
    daily_flats = 4;
    daily_misc = 1;
    date_str = "today";

    daily_total_appts = daily_tune_ups + daily_adjustments + daily_flats;

    for(i=0; i<daily_tune_ups; i++){
        var button = document.createElement('input');
        button.type = 'button';
        button.id =  "tune_up_btn_" + date_str + "_" + (i+1);
        button.textContent = "Tune Up";
        button.value = "Tune Up";
        //button.className = 'time_unit_btn';
        button.className = 'tu_appt_button';
        button.onclick = function(){
            display_res_modal(button, modal);
        }
        //button.onClick = select_time_unit();
    
        var container = document.getElementById(day_col);
        container.appendChild(button);
    }

    for(i=0; i<daily_adjustments; i++){
        var button = document.createElement('input');
        button.type = 'button';
        button.id =  "adjust_btn_" + date_str + "_" + (i+1);
        button.textContent = "Adjustment";
        button.value = "Adjustment";
        //button.className = 'time_unit_btn';
        button.className = 'adj_appt_button';
        button.onclick = function(){
            display_res_modal(button, modal);
        }
        //button.onClick = select_time_unit();
    
        var container = document.getElementById(day_col);
        container.appendChild(button);
    }

    for(i=0; i<daily_flats; i++){
        var button = document.createElement('input');
        button.type = 'button';
        button.id =  "flat_btn_" + date_str + "_" + (i+1);
        button.textContent = "Flat";
        button.value = "Flat";
        //button.className = 'time_unit_btn';
        button.className = 'flat_appt_button';
        button.onclick = function(){
            display_res_modal(button, modal);
        }
        //button.onClick = select_time_unit();
    
        var container = document.getElementById(day_col);
        container.appendChild(button);
    }

    for(i=0; i<daily_misc; i++){
        var button = document.createElement('input');
        button.type = 'button';
        button.id =  "misc_btn_" + date_str + "_" + (i+1);
        button.textContent = "Misc.";
        button.value = "Misc. Repair";
        //button.className = 'time_unit_btn';
        button.className = 'misc_appt_button';
        button.onclick = function(){
            display_res_modal(button, modal);
        }
        //button.onClick = select_time_unit();
    
        var container = document.getElementById(day_col);
        container.appendChild(button);
    }
}

function sked_builder(m1, m2, m3){
    appt_units = [];

    // Sets the time units required to complete each type of service
    tune_up_unit_req = 4;
    adjust_unit_req = 2;
    flat_unit_req = 1;

    // Sets the number of units a level 2 mechanic can complete per day
    m1_max_units = 10; 
    m2_max_units = 28;
    m3_max_units = 10;

    //Starts daily unit available count
    total_day_units = 0;


    total_day_units = (m1*m1_max_units)+(m2*m2_max_units)+(m3*m3_max_units);

    var button = document.createElement('input');
    button.type = 'button';
    button.id = day_col + "_" + time_str + "_btn";
    button.textContent = time_str;
    button.value = time_str;
    //button.className = 'time_unit_btn';
    button.className = 'appt_button';

};

function populate_unit_button(time_str, day_col, modal){
    console.log("Running populate_unit_button...");
    console.log(day_col + "--> " + time_str);
    var button = document.createElement('input');
    button.type = 'button';
    button.id = day_col + "_" + time_str + "_btn";
    button.textContent = time_str;
    button.value = time_str;
    //button.className = 'time_unit_btn';
    button.className = 'appt_button';
    button.onclick = function(){
        display_res_modal(button, modal);
    }
    //button.onClick = select_time_unit();

    var container = document.getElementById(day_col);
    container.appendChild(button);
}

function display_res_modal(btn, res_modal){
    console.log("Trying to display modal...");
    res_modal.style.display = "block";
    
    //TODO: make this into "reset modal" function
    document.getElementById("tune_up_dropdown").value="standard_tune_up";
    document.getElementById("front_flat_box").checked = false;
    document.getElementById("rear_flat_box").checked = false;
    document.getElementById("front_brake_adj_box").checked = false;
    document.getElementById("rear_brake_adj_box").checked = false;
    document.getElementById("front_derailleur_adj_box").checked = false;
    document.getElementById("rear_derailleur_adj_box").checked = false;
    hide_repair_detail_options();
}

//document.getElementById('.flat_rep_btn').addEventListener('click', showBtn); 
//document.getElementById("btn2").style.display = "none";

function toggle_flat_buttons() { 
    if((document.getElementById("front_flat_btn").style.display) === 'block'){ 
        document.getElementById("front_flat_btn").style.display = 'none'; 
        document.getElementById("rear_flat_btn").style.display = 'none'; 
        document.getElementById("std_tube_btn").style.display = 'none'; 
        document.getElementById("hd_tube_btn").style.display = 'none'; 
        //toggle_parts_req();
    }
    else{
        document.getElementById("front_flat_btn").style.display = 'block'; 
        document.getElementById("front_flat_btn").style.display = 'block'; 
        document.getElementById("rear_flat_btn").style.display = 'block'; 
        document.getElementById("std_tube_btn").style.display = 'block'; 
        document.getElementById("hd_tube_btn").style.display = 'block'; 
        toggle_parts_req();
    }
} 


function toggle_brake_adj_buttons(){ 
    if((document.getElementById("front_brake_btn").style.display) === 'block'){ 
        document.getElementById("front_brake_btn").style.display = 'none'; 
        document.getElementById("rear_brake_btn").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("front_brake_btn").style.display = 'block'; 
        document.getElementById("front_brake_btn").style.display = 'block'; 
        document.getElementById("rear_brake_btn").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_new_tire_buttons(){ 
    if((document.getElementById("front_tire_btn").style.display) === 'block'){ 
        document.getElementById("front_tire_btn").style.display = 'none'; 
        document.getElementById("rear_tire_btn").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("front_tire_btn").style.display = 'block'; 
        document.getElementById("front_tire_btn").style.display = 'block'; 
        document.getElementById("rear_tire_btn").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_new_wheel_buttons(){ 
    if((document.getElementById("front_wheel_btn").style.display) === 'block'){ 
        document.getElementById("front_wheel_btn").style.display = 'none'; 
        document.getElementById("rear_wheel_btn").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("front_wheel_btn").style.display = 'block'; 
        document.getElementById("front_wheel_btn").style.display = 'block'; 
        document.getElementById("rear_wheel_btn").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_tubeless_buttons(){ 
    if((document.getElementById("front_tubeless_btn").style.display) === 'block'){ 
        document.getElementById("front_tubeless_btn").style.display = 'none'; 
        document.getElementById("rear_tubeless_btn").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("front_tubeless_btn").style.display = 'block'; 
        document.getElementById("front_tubeless_btn").style.display = 'block'; 
        document.getElementById("rear_tubeless_btn").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_der_adj_buttons(){ 
    if((document.getElementById("front_der_btn").style.display) === 'block'){ 
        document.getElementById("front_der_btn").style.display = 'none'; 
        document.getElementById("rear_der_btn").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("front_der_btn").style.display = 'block'; 
        document.getElementById("front_der_btn").style.display = 'block'; 
        document.getElementById("rear_der_btn").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_tune_up_buttons() { 
    if((document.getElementById("geared_tu_btn").style.display) === 'block'){ 
        document.getElementById("geared_tu_btn").style.display = 'none'; 
        document.getElementById("90_day_btn").style.display = 'none'; 
        document.getElementById("sgl_spd_tu_btn").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("geared_tu_btn").style.display = 'block'; 
        document.getElementById("geared_tu_btn").style.display = 'block'; 
        document.getElementById("90_day_btn").style.display = 'block'; 
        document.getElementById("sgl_spd_tu_btn").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_parts_req(){
    /*
    var tune_up_vis = document.getElementById("tune_up_dropdown").style.display;
    var brake_adj_vis = document.getElementById("front_brake_adj_box").style.display;
    var derailleur_adj_vis = document.getElementById("front_derailleur_adj_box").style.display;
    
    // If the parts req field wans't previously visible, make it visible.
    if((document.getElementById("parts_req_button").style.display) === 'none'){ 
        document.getElementById("parts_req_button").style.display = 'block'; 
    }
    // If of the the repair fields is visible, make the parts req visible.
    else if((tune_up_vis === 'block') || (brake_adj_vis === 'block') || (derailleur_adj_vis == 'block')){
        document.getElementById("parts_req_button").style.display = 'block'; 
    }
    // If no parts fields are visible, hide the parts field.
    else if((tune_up_vis === 'none') && (brake_adj_vis === 'none') && (derailleur_adj_vis == 'none')){
        document.getElementById("parts_req_button").style.display = 'none';
        hide_parts_list();
    }
    */
} 

function toggle_parts_req_textarea(){
    if((document.getElementById("part_1_ta").style.display) === 'block'){ 
        hide_parts_list();
    }
    else{
        document.getElementById("part_1_ta").style.display = 'block';
    }
}

function add_parts(){
    // If the parts req field wans't previously visible, make it visible.
    if((document.getElementById("part_input").style.display) === 'none'){ 
        document.getElementById("part_input").style.display = 'block'; 
        document.getElementById("add_more_parts_btn").style.display = 'block';
    }
}

function hide_repair_detail_options(){
    console.log("Hiding details...");
    document.getElementById("front_flat_btn").style.display = "none";
    document.getElementById("rear_flat_btn").style.display = "none";
    document.getElementById("std_tube_btn").style.display = "none";
    document.getElementById("hd_tube_btn").style.display = "none";

    document.getElementById("front_brake_btn").style.display = "none";
    document.getElementById("rear_brake_btn").style.display = "none";

    document.getElementById("front_der_btn").style.display = "none";
    document.getElementById("rear_der_btn").style.display = "none";

    document.getElementById("front_tubeless_btn").style.display = "none";
    document.getElementById("rear_tubeless_btn").style.display = "none";

    document.getElementById("front_wheel_btn").style.display = "none";
    document.getElementById("rear_wheel_btn").style.display = "none";

    document.getElementById("front_tire_btn").style.display = "none";
    document.getElementById("rear_tire_btn").style.display = "none";

    document.getElementById("geared_tu_btn").style.display = "none";
    document.getElementById("90_day_btn").style.display = "none";
    document.getElementById("sgl_spd_tu_btn").style.display = "none";

    document.getElementById("std_tube_btn").disabled = 'true'; 
    document.getElementById("hd_tube_btn").disabled = 'true'; 
    
    //document.getElementById("parts_req_button").style.display = "none";

    //hide_parts_list();
    
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                  A D D S     T O     P A R T S     L I S T 
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function add_to_parts_list(){
    var ul = document.getElementById('parts_list');
    var li = document.createElement('li');
    var new_part = document.getElementById('part_input').value;
    var parts_count = 0;

    //Count the number of parts currently in the list
    while(ul.getElementsByTagName('li') [parts_count++]); 

    // Add new part to the list
    li.appendChild(document.createTextNode(new_part));
    li.setAttribute("part_req_id", ("part_" + (parts_count)));
    ul.appendChild(li);
    document.getElementById("remove_last_part_btn").style.display = 'block';

    console.log("Adding - " + new_part + " - part num:" + parts_count);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                  R E M O V E     L A S T     P A R T
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function remove_last_part(){
    let parts_list = document.getElementById('parts_list');
    parts_list.removeChild(parts_list.lastElementChild);

    var ul = document.getElementById('parts_list');
    var li = document.createElement('li');
    var parts_count = 0;
    while(ul.getElementsByTagName('li') [parts_count++]); 

    console.log("PARTS COUNT: " + parts_count);

    if(parts_count<2){
        document.getElementById("remove_last_part_btn").style.display = 'none';
    }
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                  H I D E     P A R T S     L I S T 
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function hide_parts_list(){
    document.getElementById("part_input").style.display = 'none';
    document.getElementById("part_input").value = ''; 
    document.getElementById("add_more_parts_btn").style.display = 'none'; 
    document.getElementById("remove_last_part_btn").style.display = 'none';
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                      C L E A R     P A R T S     L I S T 
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function clear_parts_list(){
    document.getElementById("part_input").value = ''; 

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                              A D D S     T O     S E R V I C E S     L I S T 
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function add_to_services_list(){
    var ul = document.getElementById('services_list');
    var li = document.createElement('li');
    var new_part = document.getElementById('part_input').value;
    var parts_count = 0;

    //Count the number of parts currently in the list
    while(ul.getElementsByTagName('li') [parts_count++]); 

    // Add new part to the list
    li.appendChild(document.createTextNode(new_part));
    li.setAttribute("part_req_id", ("part_" + (parts_count)));
    ul.appendChild(li);
    document.getElementById("remove_last_part_btn").style.display = 'block';

    console.log("Adding - " + new_part + " - part num:" + parts_count);
}


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                  R E G I S T E R     C U S T O M E R
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function register_customer(phone_input){
    document.getElementById("phone_input").setCustomValidity("Phone number is not valid.");
    console.log("User Entered: " + phone_input);
    var phone_rvcd = scrub_phone_number(phone_input);
    if(phone_rvcd != "invalid"){
        var xhr = new XMLHttpRequest();
        xhr.onload = function () {
            // Process our return data
            if (xhr.status >= 200 && xhr.status < 300) {
                // This will run when the request is successful
                console.log('success!', xhr);
                console.log(xhr.responseText);

                var db_response = xhr.responseText;

                if(!(db_response == "no_cust_found")){
                    var cust_name_array = db_response.split(",");

                    document.getElementById("first_name_input").value = cust_name_array[0];
                    document.getElementById("first_name_input").disabled = false;

                    document.getElementById("last_name_input").value = cust_name_array[1];
                    document.getElementById("last_name_input").disabled = false;

                    document.getElementById("email_input").value = cust_name_array[2];
                    document.getElementById("email_input").disabled = false;
                }
                else{
                    document.getElementById("first_name_input").disabled = false;
                    document.getElementById("last_name_input").disabled = false;
                    document.getElementById("email_input").disabled = false;
                }
            } else {
                // This will run when it's not successful
                console.log('The request failed!');
            }
        };
        // The first argument is the post type (GET, POST, PUT, DELETE, etc.)
        // The second argument is the endpoint URL
        // The third indicates if the request should run asyncronously
        xhr.open('POST', 'customer_AJAX.php', true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("phone_data="+phone_data,); 


    }
    else{
        document.getElementById("phone_input").setCustomValidity("Phone number is not valid.");
        return 0;
    }

}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                              S C R U B     P H O N E     N U M B E R
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Cleans up phone number inputs for searching/saving to db
function scrub_phone_number(raw_number){
    let clean_number = raw_number;
    clean_number = clean_number.replaceAll("-", "");
    clean_number = clean_number.replaceAll(".", "");
    clean_number = clean_number.replaceAll("(", "");
    clean_number = clean_number.replaceAll(")", "");
    clean_number = clean_number.replaceAll(" ", "");

    // If it IS a number
    if(!(isNaN(clean_number))){
        console.log(clean_number + " is a number.");

        //If its more than 10 digits, reject
        if(clean_number.length > 10){
            console.log("Phone number is too damn long!");
            return "invalid";
        }
        //If its shorter than 7 digits, reject
        else if(clean_number.length < 7){
            console.log("Where's...THE REST?!?");
            return "invalid";
        }
        else{
            console.log("Valid number, Good to Go!");
            return clean_number;
        }
    }
    else{
        console.log(clean_number + " is NOT a number.");
        return "invalid";
    }
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                      P O P U L A T E     C U S T O M E R     I N F O
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Takes phone number input and checks against db for existing customer
function populate_customer_info() {
    var xhr = new XMLHttpRequest();

    //let phone_data = {phone_data: document.getElementById("phone_input").value};
    //let phone_data = "TEST MSG";
    var phone_data = scrub_phone_number(document.getElementById("phone_input").value);

    if(phone_data == "invalid"){
        return;
    }
    else{
        // Setup our listener to process completed requests
        xhr.onload = function () {
            // Process our return data
            if (xhr.status >= 200 && xhr.status < 300) {
                // This will run when the request is successful
                console.log('success!', xhr);
                console.log(xhr.responseText);

                var db_response = xhr.responseText;

                if(!(db_response == "no_cust_found")){
                    var cust_name_array = db_response.split(",");

                    document.getElementById("first_name_input").value = cust_name_array[0];
                    document.getElementById("first_name_input").disabled = false;

                    document.getElementById("last_name_input").value = cust_name_array[1];
                    document.getElementById("last_name_input").disabled = false;

                    document.getElementById("email_input").value = cust_name_array[2];
                    document.getElementById("email_input").disabled = false;
                }
                else{
                    document.getElementById("first_name_input").disabled = false;
                    document.getElementById("last_name_input").disabled = false;
                    document.getElementById("email_input").disabled = false;
                }
            } else {
                // This will run when it's not successful
                console.log('The request failed!');
            }
        };

        // Create and send a GET request
        // The first argument is the post type (GET, POST, PUT, DELETE, etc.)
        // The second argument is the endpoint URL
        // The third indicates if the request should run asyncronously
        xhr.open('POST', 'customer_AJAX.php', true);
        xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xhr.send("phone_data="+phone_data); 
    }   
}

/*
// handles the click event for link 1, sends the query
function getOutput() {
    getRequest(
        'ajax.php', // PHP file
         drawOutput,  // handle successful request
         db_return_error    // handle error
         
    );
    //return false;
    return "fuuuuuccckk meeee tooooo";
  }  
  // handles drawing an error message
  function db_return_error() {
      var container = document.getElementById('output');
      container.innerHTML = 'Error retrieving from database';
  }
  // handles the response, adds the html
  function drawOutput(responseText) {
      var container = document.getElementById('cust_db_return');
      container.innerHTML = responseText;
  }
  */

  /*
function book_suggestion(){
    var phone_input = document.getElementById("phone_input").value;

    var xhr = new XMLHttpRequest();
    xhr.open("POST", '/server', true);

    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...
        xhr = new XMLHttpRequest();
    } 
    else if (window.ActiveXObject) { // IE 8 and older
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    
    xhr.open("POST", "ajax.php", true); 
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");      
    console.log("Sending: " + phone_input);            
    xhr.send(phone_input);

    
    xhr.onreadystatechange = display_data;
    function display_data() {
        if (xhr.readyState == 4) {
            console.log("BR_1");
            if (xhr.status == 200) {
                alert(xhr.responseText);	   
                document.getElementById("cust_db_return").innerHTML = xhr.responseText;
            } 
            else {
                alert('There was a problem with the request.');
            }         
        }
    }
}
*/


function fill_customer_info(fname, lname, phone, text_opt){
    //TODO: adjust minutes to display 9:05 instead of 9:5
    const d = new Date();
    var year = d.getFullYear();
    var month = get_month(d.getMonth());
    var date = d.getDate();
    var day = get_weekday(d.getDay());
    var hours = d.getHours();
    var minutes = d.getMinutes();

    var curr_date = day + " " + month + " " + date + ", " + year;
    var curr_time = hours + ":" + minutes;

    document.getElementById("date").innerHTML = curr_date;
    document.getElementById("time").innerHTML = curr_time;
    document.getElementById("fname").innerHTML = fname;
    document.getElementById("lname").innerHTML = lname;
    document.getElementById("phone").innerHTML = phone;

    if(text_opt == 1){
        document.getElementById("text_opt").innerHTML = "Yes";
    }
    else{
        document.getElementById("text_opt").innerHTML = "No";
    }
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
//                                                      R E P A I R     F U N C T I O N S 
// * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                  A D D     F L A T     R E P A I R
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function add_flat_repair(){
    if((document.getElementById("geared_tu_btn").style.display) === 'block'){ 
        document.getElementById("geared_tu_btn").style.display = 'none'; 
        document.getElementById("90_day_btn").style.display = 'none'; 
        document.getElementById("sgl_spd_tu_btn").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("geared_tu_btn").style.display = 'block'; 
        document.getElementById("geared_tu_btn").style.display = 'block'; 
        document.getElementById("90_day_btn").style.display = 'block'; 
        toggle_parts_req();
    }
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                          T O G G L E    S E C O N D A R Y    B U T T O N S
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function toggle_secondary_button(parent_div, calling_button_id, service_list, primary_service_message){
    // Get the list of all buttons under the parent div
    var all_buttons =  Array.prototype.slice.call(parent_div.querySelectorAll('button'));
    // Get the sub div 
    var child_div = Array.prototype.slice.call(parent_div.querySelectorAll('div'));
    var contains_child_buttons = false;
    if(child_div.length > 0){
        contains_child_buttons = true;
    }
    if(contains_child_buttons){
        // Get the buttons of the sub div
        var child_buttons = Array.prototype.slice.call(child_div[0].querySelectorAll('button'));
        // Get the buttons of JUST the parent div
        var parent_buttons = all_buttons.filter(function(obj) { return child_buttons.indexOf(obj) == -1; });
    }

    // TURN ON
    if($('#'+calling_button_id).data('btn_selected') == false){
        if(contains_child_buttons){
            select_button(calling_button_id);
            console.log(calling_button_id + " set to SELECTED.");
            // Survey child buttons to check if they are enabled
            for (var j=0, len=child_buttons.length; j<len; j++) {
                if(check_enable_status(child_buttons[j].id)){
                    refresh_service_sked(primary_service_message, service_list, parent_div, parent_div.querySelectorAll('div')[0], child_buttons[j].id)
                }
                else{
                    enable_button(child_buttons[j].id); // Re-Enable each child
                    console.log(child_buttons[j].id + " enabled.");
                }
            }
        }
        else{
            for (var i=0, len=all_buttons.length; i<len; i++) {
                deselect_button(all_buttons[i].id);
                console.log(all_buttons[i].id + " deselected.");
            }
            select_button(calling_button_id);
            console.log(calling_button_id + " set to SELECTED.");
            build_service_message(primary_service_message, calling_button_id, service_list);
        }
    }

    //TURN OFF
    else{
        deselect_button(calling_button_id);
        console.log(calling_button_id + " set to DESELECTED.");
        if(contains_child_buttons){
            // At least one parent button is known to be false (not selected), so start with false.
            var parent_selected = false;
            // Survey each sibling (parent) button to check if any are selected, if so it will flip 'parent_selectd' to true.
            for (var i=0, len=parent_buttons.length; i<len; i++) {
                if($('#'+parent_buttons[i].id).data('btn_selected') == true){  // If sibling parent button was selected
                    parent_selected = true;
                    console.log("'parent_select' flipped to true.");
                }
            }
            if(parent_selected == false){
                for (var j=0, len=child_buttons.length; j<len; j++) {
                    disable_button(child_buttons[j].id, service_list); // Disable each child
                    console.log(child_buttons[j].id + " disabled.");
                }
            }
        }
    }
}


// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                          T O G G L E    T E R T I A R Y    B U T T O N S
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Flips the selected status of the button called on as well as its sibling buttons
function toggle_tertiary_button(primary_service_message, service_list, grand_parent_div, parent_div, calling_button_id){
    // If the button wasn not SELECTED, DESELECT all sibling buttons.
    // Set the button to SELECTED.
    if($('#'+calling_button_id).data('btn_selected') == false){
        // Get the list of all buttons under the button's div
        var sibling_buttons =  Array.prototype.slice.call(parent_div.querySelectorAll('button'));
        for (var i=0, len=sibling_buttons.length; i<len; i++) {
            deselect_button(sibling_buttons[i].id);
            console.log(sibling_buttons[i].id + " deselected.");
        }
        select_button(calling_button_id);
        console.log(calling_button_id + " selected.");

        refresh_service_sked(primary_service_message, service_list, grand_parent_div, parent_div, calling_button_id);
        /*
        // Get the list of all buttons under the grand_parent div
        var service_message = document.getElementById(calling_button_id).value;


        // Get the list of all buttons under the parent div
        var all_buttons =  Array.prototype.slice.call(grand_parent_div.querySelectorAll('button'));
        // Get the buttons of the sub div
        var sibling_buttons = Array.prototype.slice.call(parent_div.querySelectorAll('button'));
        // Get the buttons of JUST the parent div
        var parent_buttons = all_buttons.filter(function(obj) { return sibling_buttons.indexOf(obj) == -1; });
        
        // Clear all service from the specified list.
        clear_service_list(service_list);

        for (var i=0, len=parent_buttons.length; i<len; i++) {
            if($('#'+parent_buttons[i].id).data('btn_selected') == true){  // If sibling parent button was selected
                console.log("Adding line for " + parent_buttons[i].id);
                var service_message = primary_service_message + "-";
                service_message = service_message + document.getElementById(parent_buttons[i].id).value;
                service_message = service_message + " - " + document.getElementById(calling_button_id).value;
                add_to_service_sked(service_message, service_list);
                console.log("Sending Service Message: " + service_message);
            }
        }
        */
    }
    else{
        deselect_button(calling_button_id);
    }
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                          B U T T O N     H E L P E R     F U N C T I O N S
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Disables the button, deselects it, and resets it back to Grey/Black Scheme.
function disable_button(calling_button_id, service_list){
    document.getElementById(calling_button_id).disabled = true;
    deselect_button(calling_button_id);
    // Clear all service from the specified list.
    clear_service_list(service_list);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                      E N A B L E     B U T T O N
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Enables the button called on.
function enable_button(calling_button_id){
    document.getElementById(calling_button_id).disabled = false;
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                  C H E C K     B U T T O N     S T A T U S
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function check_enable_status(calling_button_id){
    if(document.getElementById(calling_button_id).disabled == false){
        return true;}
    else{
        return false;}
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                      S E L E C T     B U T T O N
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Set the button as SELECTED and change it to Green/White scheme.
function select_button(calling_button_id){
    $('#'+calling_button_id).data('btn_selected', true);
    document.getElementById(calling_button_id).style.background = '#365E27'; // Make BG Green
    document.getElementById(calling_button_id).style.color = '#FFFFFF';// Make text White
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                  D E S E L E C T     B U T T O N
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// Deslects the buttons and sets it back to Grey/Black scheme.
function deselect_button(calling_button_id){
    $('#'+calling_button_id).data('btn_selected', false);
    document.getElementById(calling_button_id).style.background = '#E6E6E6'; // Make BG Lt Grey
    document.getElementById(calling_button_id).style.color = '#2E2E2E'; // Make text Dark Grey
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                      A D D     S E R V I C E     TO     S E R V I C E     S K E D
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function add_to_service_sked(service_string, service_list){
    var ul = document.getElementById(service_list);
    var li = document.createElement('li');

    // Add new part to the list
    li.appendChild(document.createTextNode(service_string));
    //li.setAttribute("part_req_id", ("part_" + (services_count)));
    ul.appendChild(li);
    //document.getElementById("remove_last_part_btn").style.display = 'block';

    console.log("Adding - " + service_string);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                          R E F R E S H     S E R V I C E     S K E D
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function refresh_service_sked(primary_service_message, service_list, grand_parent_div, parent_div, calling_button_id){
    var service_message = document.getElementById(calling_button_id).value;
    // Get the list of all buttons under the parent div
    var all_buttons =  Array.prototype.slice.call(grand_parent_div.querySelectorAll('button'));
    // Get the buttons of the sub div
    var sibling_buttons = Array.prototype.slice.call(parent_div.querySelectorAll('button'));
    // Get the buttons of JUST the parent div
    var parent_buttons = all_buttons.filter(function(obj) { return sibling_buttons.indexOf(obj) == -1; });
        
    // Clear all service from the specified list.
    clear_service_list(service_list);

    for (var i=0, len=parent_buttons.length; i<len; i++) {
        if($('#'+parent_buttons[i].id).data('btn_selected') == true){  // If sibling parent button was selected
            console.log("Adding line for " + parent_buttons[i].id);
            var service_message = primary_service_message + "-";
            service_message = service_message + document.getElementById(parent_buttons[i].id).value;
            service_message = service_message + " - " + document.getElementById(calling_button_id).value;
            add_to_service_sked(service_message, service_list);
            console.log("Sending Service Message: " + service_message);
        }
    }
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                          B U I L D     S E R V I C E     M E S S A G E
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function build_service_message(primary_service_message, calling_button_id, service_list){
    clear_service_list(service_list);
    var service_message = primary_service_message + " - ";
    service_message = service_message + document.getElementById(calling_button_id).value;
    add_to_service_sked(service_message, service_list);
    console.log("Sending Service Message: " + service_message);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                          C L E A R     S E R V I C E     L I S T
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
function clear_service_list(service_list){
    var ul = document.getElementById(service_list);
    $(ul).empty();
    console.log("Clearing out "+service_list);
}

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                      H E L P E R     F U N C T I O N S
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

function name_entry_check(){
    if((document.getElementById("first_name_input").value.length>1) && (document.getElementById("last_name_input").value.length>1)){
        document.getElementById("bike_brand_input").disabled = false;
        document.getElementById("bike_model_input").disabled = false;
        document.getElementById("bike_color_input").disabled = false;
    }
}

function text_opt_in_format(){
    if(document.getElementById("text_opt_in").checked = true){
        document.getElementById("text_opt_in").value = 1;
    }
    else{
        document.getElementById("text_opt_in").value = 0;
    }
}

function get_weekday(day){
    var day_name = "";
    switch(day) {
        case 0:
            day_name = "Sunday";
            break;
        case 1:
            day_name = "Monday";
            break;
        case 2:
            day_name = "Tuesday";
            break;
        case 3:
            day_name = "Wednesday";
            break;
        case 4:
            day_name = "Thursday";
            break;
        case 5:
            day_name = "Friday";
            break;
        case 6:
            day_name = "Saturday";
            break;
    }
    return day_name;
}

function get_month(month){
    var month_name = "";
    switch(month) {
        case 0:
            month_name = "Jan";
            break;
        case 1:
            month_name = "Feb";
            break;
        case 2:
            month_name = "Mar";
            break;
        case 3:
            month_name = "Apr";
            break;
        case 4:
            month_name = "May";
            break;
        case 5:
            month_name = "Jun";
            break;
        case 6:
            month_name = "Jul";
            break;
        case 7:
            month_name = "Aug";
            break;
        case 8:
            month_name = "Sep";
            break;
        case 9:
            month_name = "Oct";
            break;
        case 10:
            month_name = "Nov";
            break;
        case 11:
            month_name = "Dec";
            break;
    }
    return month_name;
}