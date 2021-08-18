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

        <form method="POST" action="serviceSked.php">
            <div class="banner">
                <h1>Service Scheduler</h1>
            </div>

            <div class="contact-item">
                <div class="item">
                    <p>Phone</p>
                    <input id="phone_input" type="phone" name="phone" placeholder="(###) ###-####" required autocomplete="on" onchange='populate_customer_info()'/>
                </div>
            </div>


            <div class="item">
                <p>Name</p>
                <div class="name-item">
                    <input id="first_name_input" type="text" name="name" placeholder="First" disabled="true" required/>
                    <input id="last_name_input" type="text" name="name" placeholder="Last" disabled="true" required/>
                </div>
            </div>


            <div class="contact-item">
                <div class="item">
                    <p>Email</p>
                    <input id="email_input" type="email" name="email" disabled="true"/>
                </div>
            </div>
            <div class="item">
                <p>Bike Brand</p>
                <input type="text" name="brand" disabled="true"/>
                </div>
            <div class="item">
                <p>Model</p>
                <input type="text" name="model" disabled="true"/>
            </div>
            <div class="item">
                <p>Color</p>
                <input type="text" name="color" disabled="true"/>
            </div>
            <br><br>
            <div class="btn-block">
                <button type="submit">continue</button>
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