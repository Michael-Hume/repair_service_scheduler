<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wheel Away</title>
        <!--LINK JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="resStyle.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <!--<link rel="stylesheet" href="style.css">-->
        <script type="text/javascript" src="repairSked.js"></script>
    </head>
    <body>

        <form method="POST" action="reg_customer.php">
            <div class="banner">
                <h1>Service Scheduler</h1>
            </div>

            <div class="contact-item">
                <div class="item">
                    <p>Phone</p>
                    <input id="phone_input" type="phone" name="phone_input" placeholder="(###) ###-####" required autocomplete="on" onchange='populate_customer_info()'/>
                    <input type="checkbox" id="text_opt_in" name ="text_opt_in" value=0 onchange='text_opt_in_format()'>
                    <label for="text_opt_in">Receive text message notifications?</label><br>
                </div>
            </div>


            <div class="item">
                <p>Name</p>
                <div class="name-item">
                    <input id="first_name_input" type="text" name="first_name_input" placeholder="First" disabled="true" required onchange='name_entry_check()'/>
                    <input id="last_name_input" type="text" name="last_name_input" placeholder="Last" disabled="true" required onchange='name_entry_check()'/>
                </div>
            </div>


            <div class="contact-item">
                <div class="item">
                    <p>Email</p>
                    <input id="email_input" type="email" name="email_input" disabled="true"/>
                </div>
            </div>
            <div class="item">
                <p>Bike Brand</p>
                <input id="bike_brand_input" type="text" name="bike_brand_input" disabled="true"/>
                </div>
            <div class="item">
                <p>Model</p>
                <input id="bike_model_input" type="text" name="bike_model_input" disabled="true"/>
            </div>
            <div class="item">
                <p>Color</p>
                <input id="bike_color_input" type="text" name="bike_color_input" disabled="true"/>
            </div>
            <br><br>
            <div class="btn-block">
                <button type="submit">New Customer</button>
            </div>
        </form>






            <!--
            <script>
                var time_slots = time_unit_builder();
            </script>
            <div class="day-col" id="sunday_col">
                <label for="sunday_col">Sunday</label>
                <script>
                    proto_sked_builder("sunday_col", document.getElementById("res_modal"));
                    //time_slots.forEach((slot, index) =>
                        //populate_unit_button(slot, "sunday_col", document.getElementById("res_modal")));
                </script>
            </div>      
            <div class="day-col" id="monday_col">
                <label for="monday_col">Monday</label>
                <script>
                    proto_sked_builder("monday_col", document.getElementById("res_modal"));
                    //time_slots.forEach((slot, index) =>
                        //populate_unit_button(slot, "monday_col", document.getElementById("res_modal")));
                </script>
            </div> 
            <div class="day-col" id="tuesday_col">
                <label for="tuesday_col">Tuesday</label>
                <script>
                    proto_sked_builder("tuesday_col", document.getElementById("res_modal"));
                    //time_slots.forEach((slot, index) =>
                        //populate_unit_button(slot, "tuesday_col", document.getElementById("res_modal")));
                </script>
            </div> 
            <div class="day-col" id="wednesday_col">
                <label for="wednesday_col">Wednesday</label>
                <script>
                    proto_sked_builder("wednesday_col", document.getElementById("res_modal"));
                    //time_slots.forEach((slot, index) =>
                        //populate_unit_button(slot, "wednesday_col", document.getElementById("res_modal")));
                </script>
            </div> 
            <div class="day-col" id="thursday_col">
                <label for="thursday_col">Thursday</label>
                <script>
                    proto_sked_builder("thursday_col", document.getElementById("res_modal"));
                    //time_slots.forEach((slot, index) =>
                        //populate_unit_button(slot, "thursday_col", document.getElementById("res_modal")));
                </script>
            </div> 
            <div class="day-col" id="friday_col">
                <label for="friday_col">Friday</label>
                <script>
                    proto_sked_builder("friday_col", document.getElementById("res_modal"));
                    //time_slots.forEach((slot, index) =>
                        //populate_unit_button(slot, "friday_col", document.getElementById("res_modal")));
                </script>
            </div> 
            <div class="day-col" id="saturday_col">
                <label for="saturday_col">Saturday</label>
                <script>
                    proto_sked_builder("saturday_col", document.getElementById("res_modal"));
                    //time_slots.forEach((slot, index) =>
                        //populate_unit_button(slot, "saturday_col", document.getElementById("res_modal")));
                </script>
            </div> 

            -->
            
            <script>
                // Get the modal
                var modal = document.getElementById("res_modal");

                // Get the <span> element that closes the modal
                var span = document.getElementsByClassName("close")[0];

                // When the user clicks on <span> (x), close the modal
                span.onclick = function() {
                    modal.style.display = "none";
                }

                // When the user clicks anywhere outside of the modal, close it
                window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                    }
                }
            </script>
            
        </div>
    </body>
</html>