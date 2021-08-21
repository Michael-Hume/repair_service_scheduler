<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wheel Away</title>
        <!--LINK JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="jquery-3.6.0.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <!--<link rel="stylesheet" href="style.css">-->
        <script type="text/javascript" src="repairSked.js"></script>
    </head>
    <body>
    <?php
        $cust_id= 0;
        $fname = "";  
        $lname = "";  
        $phone = 0;  
        $text_opt = 0;  

        // Get the customer id passed from the previous page
        if($_GET){
            $cust_id = $_GET['cust_id'];
            //echo $_GET['cust_id']; // print_r($_GET);       
        }
        else{
            echo "Url has no user";
        }

        // Connect to db
        $servername = "localhost";
        $username = "mike";
        $password = "Bascmilacomah1!";
        $dbname = "wacc";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        // Look up the customer's info based on cust_id received.
        $sql = "SELECT firstname, lastname, phone, text_opt FROM customers WHERE cust_id = '" . $cust_id . "'";
        $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $fname = $row["firstname"];
                    $lname = $row["lastname"];
                    $phone = $row["phone"];
                    $text_opt = $row["text_opt"];
                }
                } else {
                    echo "no_cust_found";
                }
        $conn->close();
        //echo $cust_id;
        //echo $fname;
        //echo $lname;
        //echo $phone;
        //echo $text_opt;
    ?>
    <div class="cust_info_display">
        <p>Date: </p>
        <p id="date"></P>
        <p>Time: </p>
        <p id="time"></P>
        <p>First Name: </p>
        <p id="fname"></P>
        <p>Last Name: </p>
        <p id="lname"></P>
        <p>Phone: </p>
        <p id="phone"></P>
        <p>Text Notifications: </p>
        <p id="text_opt"></P>
    </div>
    <script>
        var fname = "<?php echo $fname; ?>";
        var lname = "<?php echo $lname; ?>";
        var phone = "<?php echo $phone; ?>";
        var text_opt = "<?php echo $text_opt; ?>"; 
        fill_customer_info(fname, lname, phone, text_opt);
    </script>

    <div class="pri_repair_sel_box">
        <div class="pri_repair_sel_box_buttons">
            <button class="pri_service_btn" id="flat_rep_btn" onclick="toggle_flat_buttons()" >Flat Repair</button>
            <div class="sec_repair_sel_box">
                <button class="sec_service_btn" id="front_flat_btn" data-btn_selected='false' onclick='enable_tube_type_buttons()'>Front</button>
                <button class="sec_service_btn" id="rear_flat_btn" data-btn_selected="false">Rear</button>
                <button class="sec_service_btn" id="std_tube_btn" data-btn_selected="false">Standard</button>
                <button class="sec_service_btn" id="hd_tube_btn" data-btn_selected="false">Heavy Duty</button>
            </div>




            <button class="pri_service_btn" id="tune_up_btn" onclick="toggle_tune_up_buttons()">Tune Up</button>
            <div class="sec_tu_sel_box">
                <button class="sec_service_btn" id="90_day_btn">90 Day</button>
                <button class="sec_service_btn" id="geared_tu_btn">Geared</button>
                <button class="sec_service_btn" id="sgl_spd_tu_btn">Single Spd</button>
            </div>


            <button class="pri_service_btn" id="brake_adj_btn" onclick="toggle_brake_adj_buttons()">Brake Adjust </button>
            <div class="sec_repair_sel_box">
                <button class="sec_service_btn" id="front_brake_btn">Front</button>
                <button class="sec_service_btn" id="rear_brake_btn">Rear</button>
            </div>
            <button class="pri_service_btn" id="derailleur_adj_btn" onclick="toggle_der_adj_buttons()">Deraileur Adjust</button>
            <div class="sec_repair_sel_box">
                <button class="sec_service_btn" id="front_der_btn">Front</button>
                <button class="sec_service_btn" id="rear_der_btn">Rear</button>
            </div>
            

            <button class="pri_service_btn" id="new_tire_btn" onclick="toggle_new_tire_buttons()">New Tire</button>
            <div class="sec_repair_sel_box">
                <button class="sec_service_btn" id="front_tire_btn">Front</button>
                <button class="sec_service_btn" id="rear_tire_btn">Rear</button>
            </div>
            <button class="pri_service_btn" id="tubeless_btn" onclick="toggle_tubeless_buttons()">Tubeless</button>
            <div class="sec_repair_sel_box">
                <button class="sec_service_btn" id="front_tubeless_btn">Front</button>
                <button class="sec_service_btn" id="rear_tubeless_btn">Rear</button>
            </div>
            <button class="pri_service_btn" id="new_wheel_btn" onclick="toggle_new_wheel_buttons()">New Wheel</button>
            <div class="sec_repair_sel_box">
                <button class="sec_service_btn" id="front_wheel_btn">Front</button>
                <button class="sec_service_btn" id="rear_wheel_btn">Rear</button>
            </div>

            <button class="pri_service_btn" id="assemble_bike_btn" >Assemble Bike</button>            
            <button class="pri_service_btn" id="box_bike_btn" >Box Bike</button>
            <button class="pri_service_btn" id="clean_bike_btn" >Clean Bike</button>
            <button class="pri_service_btn" id="rep_drive_train_btn" >Replace Drive Train</button>
            
            <button class="pri_service_btn" id="update_firmware_btn" >Update Firmware</button>
            <button class="pri_service_btn" id="other_service_btn" >Other Service</button>
        </div>
        <div class="pri_repair_sel_box_notes">
            <h1>Scheduled Repairs</h1>
            <div class="sked_repairs_list">
                <ul id="services_list">

                </ul>

            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2>Notes</h2>
            <textarea class="notes_ta" id="repair_notes_ta">  Additional Notes...</textarea>
        </div>
    </div>
    <script>
        hide_repair_detail_options();
    </script>










    </body>
</html>



