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

function toggle_flat_checkboxes() { 
    if((document.getElementById("front_flat_label").style.display) === 'block'){ 
        document.getElementById("front_flat_label").style.display = 'none'; 
        document.getElementById("front_flat_box").style.display = 'none'; 
        document.getElementById("rear_flat_label").style.display = 'none'; 
        document.getElementById("rear_flat_box").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("front_flat_label").style.display = 'block'; 
        document.getElementById("front_flat_box").style.display = 'block'; 
        document.getElementById("rear_flat_label").style.display = 'block'; 
        document.getElementById("rear_flat_box").style.display = 'block'; 
        toggle_parts_req();
    }
} 


function toggle_brake_adj_FR_checkboxes() { 
    if((document.getElementById("front_brake_adj_box").style.display) === 'block'){ 
        document.getElementById("front_brake_adj_box").style.display = 'none'; 
        document.getElementById("front_brake_adj_label").style.display = 'none'; 
        document.getElementById("rear_brake_adj_box").style.display = 'none'; 
        document.getElementById("rear_brake_adj_label").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("front_brake_adj_box").style.display = 'block'; 
        document.getElementById("front_brake_adj_label").style.display = 'block'; 
        document.getElementById("rear_brake_adj_box").style.display = 'block'; 
        document.getElementById("rear_brake_adj_label").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_derailleur_adj_FR_checkboxes() { 
    if((document.getElementById("front_derailleur_adj_box").style.display) === 'block'){ 
        document.getElementById("front_derailleur_adj_box").style.display = 'none'; 
        document.getElementById("front_derailleur_adj_label").style.display = 'none'; 
        document.getElementById("rear_derailleur_adj_box").style.display = 'none'; 
        document.getElementById("rear_derailleur_adj_label").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("front_derailleur_adj_box").style.display = 'block'; 
        document.getElementById("front_derailleur_adj_label").style.display = 'block'; 
        document.getElementById("rear_derailleur_adj_box").style.display = 'block'; 
        document.getElementById("rear_derailleur_adj_label").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_tune_up_dropdown() { 
    if((document.getElementById("tune_up_dropdown").style.display) === 'block'){ 
        document.getElementById("tune_up_dropdown_label").style.display = 'none'; 
        document.getElementById("tune_up_dropdown").style.display = 'none'; 
        toggle_parts_req();
    }
    else{
        document.getElementById("tune_up_dropdown_label").style.display = 'block'; 
        document.getElementById("tune_up_dropdown").style.display = 'block'; 
        toggle_parts_req();
    }
} 

function toggle_parts_req(){
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
    document.getElementById("front_flat_label").style.display = "none";
    document.getElementById("front_flat_box").style.display = "none";
    document.getElementById("rear_flat_label").style.display = "none";
    document.getElementById("rear_flat_box").style.display = "none";

    document.getElementById("front_brake_adj_box").style.display = "none";
    document.getElementById("front_brake_adj_label").style.display = "none";
    document.getElementById("rear_brake_adj_box").style.display = "none";
    document.getElementById("rear_brake_adj_label").style.display = "none";

    document.getElementById("front_derailleur_adj_box").style.display = "none";
    document.getElementById("front_derailleur_adj_label").style.display = "none";
    document.getElementById("rear_derailleur_adj_box").style.display = "none";
    document.getElementById("rear_derailleur_adj_label").style.display = "none";

    document.getElementById("tune_up_dropdown").style.display = "none";
    document.getElementById("tune_up_dropdown_label").style.display = "none";

    document.getElementById("parts_req_button").style.display = "none";

    hide_parts_list();
    
}

function hide_parts_list(){
    document.getElementById("part_input").style.display = 'none';
    document.getElementById("part_input").value = ''; 
    document.getElementById("add_more_parts_btn").style.display = 'none'; 
    document.getElementById("remove_last_part_btn").style.display = 'none';
}

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


function clear_parts_list(){
    document.getElementById("part_input").value = ''; 

}

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











// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
//                                                      M I N O R     F U N C T I O N S
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