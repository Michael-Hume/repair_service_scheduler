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
            <div class="pri_service_button_div" id="pri_flat_btn_div">
                <!--<button class="pri_service_btn" id="flat_rep_btn" onclick="toggle_flat_buttons()" >Flat Repair</button>-->
                <button class="pri_service_btn" id="flat_rep_btn" data-btn_selected='false' data-mut_ex='false' data-btn_level='1' onclick="toggle_primary_button(pri_flat_btn_div, 'flat_rep_btn', 'flat_services_list', 'Flat Repair')" >Flat Repair</button>
                <div class="sec_repair_sel_box" id ='flat_sel_div'>
                    <button class="sec_service_btn" id="front_flat_btn" data-btn_selected='false' data-mut_ex='false' data-btn_level='2' value="FRONT" onclick='toggle_secondary_button(flat_sel_div, "front_flat_btn", "flat_services_list", "Flat Repair")'>Front</button>
                    <button class="sec_service_btn" id="rear_flat_btn" data-btn_selected='false' data-mut_ex='false' data-btn_level='2' value="REAR" onclick='toggle_secondary_button(flat_sel_div, "rear_flat_btn", "flat_services_list", "Flat Repair")'>Rear</button>
                    <div class="tert_repair_sel_box" id='tube_sel_div'>
                        <button class="sec_service_btn" id="std_tube_btn" data-btn_selected="false" data-mut_ex='true' data-btn_level='3' value="STD" onclick='toggle_tertiary_button("Flat Repair", "flat_services_list", flat_sel_div, tube_sel_div, "std_tube_btn")'>Standard</button>
                        <button class="sec_service_btn" id="hd_tube_btn" data-btn_selected="false" data-mut_ex='true' data-btn_level='3' value="HD" onclick='toggle_tertiary_button("Flat Repair", "flat_services_list", flat_sel_div, tube_sel_div, "hd_tube_btn")'>Heavy Duty</button>
                    </div>
                </div>
            </div>

            <div class="pri_service_button_div" id="pri_tu_btn_div">
                <!--<button class="pri_service_btn" id="tune_up_btn" data-btn_selected='false' onclick="toggle_tune_up_buttons()">Tune Up</button>-->
                <button class="pri_service_btn" id="tune_up_btn" data-btn_selected='false' onclick="toggle_primary_button(pri_tu_btn_div, 'tune_up_btn', 'tu_services_list', 'TUNE-UP')">Tune Up</button>
                <div class="sec_tu_sel_box" id ='tu_sel_div'>
                    <button class="sec_service_btn" id="90_day_btn" data-btn_selected='false' data-mut_ex='true' value="90 Day" onclick='toggle_secondary_button(tu_sel_div, "90_day_btn", "tu_services_list", "TUNE-UP")'>90 Day</button>
                    <button class="sec_service_btn" id="geared_tu_btn" data-btn_selected='false' data-mut_ex='true' value="Standard" onclick='toggle_secondary_button(tu_sel_div, "geared_tu_btn", "tu_services_list", "TUNE-UP")'>Geared</button>
                    <button class="sec_service_btn" id="sgl_spd_tu_btn" data-btn_selected='false' data-mut_ex='true' value="Single Speed" onclick='toggle_secondary_button(tu_sel_div, "sgl_spd_tu_btn", "tu_services_list", "TUNE-UP")'>Single Spd</button>
                </div>
            </div>

            <div class="pri_service_button_div" id="pri_brake_btn_div">
                <button class="pri_service_btn" id="brake_adj_btn" data-btn_selected='false' onclick="toggle_primary_button(pri_brake_btn_div, 'brake_adj_btn', 'brake_services_list', 'Brake Adjust')">Brake Adjust</button>
                <div class="sec_repair_sel_box" id="brake_sel_div">
                    <button class="sec_service_btn" id="front_brake_btn" data-btn_selected='false' data-mut_ex='false' value="FRONT" onclick='toggle_secondary_button(brake_sel_div, "front_brake_btn", "brake_services_list", "Brake Adj")'>Front</button>
                    <button class="sec_service_btn" id="rear_brake_btn" data-btn_selected='false' data-mut_ex='false' value="REAR" onclick='toggle_secondary_button(brake_sel_div, "rear_brake_btn", "brake_services_list", "Brake Adj")'>Rear</button>
                </div>
            </div>

            <div class="pri_service_button_div" id="pri_der_btn_div">
                <button class="pri_service_btn" id="derailleur_adj_btn" data-btn_selected='false' onclick="toggle_primary_button(pri_der_btn_div, 'derailleur_adj_btn', 'der_services_list', 'Derailleur Adjust')">Derailleur Adjust</button>
                <div class="sec_repair_sel_box" id="der_sel_div">
                    <button class="sec_service_btn" id="front_der_btn" data-btn_selected='false' data-mut_ex='false' value="FRONT" onclick='toggle_secondary_button(der_sel_div, "front_der_btn", "der_services_list", "Derailleur Adj")'>Front</button>
                    <button class="sec_service_btn" id="rear_der_btn" data-btn_selected='false' data-mut_ex='false' value="REAR" onclick='toggle_secondary_button(der_sel_div, "rear_der_btn", "der_services_list", "Derailleur Adj")'>Rear</button>
                </div>
            </div>
            
            <div class="pri_service_button_div" id="pri_new_tire_btn_div">
                <button class="pri_service_btn" id="new_tire_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_new_tire_btn_div, "new_tire_btn", "misc_services_list", "New Tire")'>New Tire</button>
                <div class="sec_repair_sel_box" id="tire_sel_div">
                    <button class="sec_service_btn" id="front_tire_btn" data-btn_selected='false' data-mut_ex='false' value="FRONT" onclick='toggle_secondary_button(tire_sel_div, "front_tire_btn", "tire_services_list", "New Tire")'>Front</button>
                    <button class="sec_service_btn" id="rear_tire_btn" data-btn_selected='false' data-mut_ex='false' value="REAR" onclick='toggle_secondary_button(tire_sel_div, "rear_tire_btn", "tire_services_list", "New Tire")'>Rear</button>
                </div>
            </div>

            <div class="pri_service_button_div" id="pri_tubeless_btn_div">
                <button class="pri_service_btn" id="tubeless_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_tubeless_btn_div, "tubeless_btn", "misc_services_list", "Tubeless")'>Tubeless</button>
                <div class="sec_repair_sel_box" id="tubeless_sel_div">
                    <button class="sec_service_btn" id="front_tubeless_btn" data-btn_selected='false' data-mut_ex='false' value="FRONT" onclick='toggle_secondary_button(tubeless_sel_div, "front_tubeless_btn", "tubeless_services_list", "Tubeless")'>Front</button>
                    <button class="sec_service_btn" id="rear_tubeless_btn" data-btn_selected='false' data-mut_ex='false' value="REAR" onclick='toggle_secondary_button(tubeless_sel_div, "rear_tubeless_btn", "tubeless_services_list", "Tubeless")'>Rear</button>
                </div>
            </div>

            <div class="pri_service_button_div" id="pri_new_wheel_btn_div">
                <button class="pri_service_btn" id="new_wheel_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_new_wheel_btn_div, "new_wheel_btn", "misc_services_list", "New Wheel")'>New Wheel</button>
                <div class="sec_repair_sel_box" id="wheel_sel_div">
                    <button class="sec_service_btn" id="front_wheel_btn" data-btn_selected='false' data-mut_ex='false' value="FRONT" onclick='toggle_secondary_button(wheel_sel_div, "front_wheel_btn", "wheel_services_list", "New Wheel")'>Front</button>
                    <button class="sec_service_btn" id="rear_wheel_btn" data-btn_selected='false' data-mut_ex='false' value="REAR" onclick='toggle_secondary_button(wheel_sel_div, "rear_wheel_btn", "wheel_services_list", "New Wheel")'>Rear</button>
                </div>
            </div>

            <div class="pri_service_button_div" id="pri_assemble_bike_btn_div">
                <button class="pri_service_btn" id="assemble_bike_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_assemble_bike_btn_div, "assemble_bike_btn", "misc_services_list", "Assemble Bike")'>Assemble Bike</button>
            </div>
            
            <div class="pri_service_button_div" id="pri_box_bike_btn_div">
                <button class="pri_service_btn" id="box_bike_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_box_bike_btn_div, "box_bike_btn", "misc_services_list", "Box Bike")'>Box Bike</button>
            </div>

            <div class="pri_service_button_div" id="pri_clean_bike_btn_div">
                <button class="pri_service_btn" id="clean_bike_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_clean_bike_btn_div, "clean_bike_btn", "misc_services_list", "Clean Bike")'>Clean Bike</button>
            </div>

            <div class="pri_service_button_div" id="pri_drive_train_btn_div">
                <button class="pri_service_btn" id="rep_drive_train_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_drive_train_btn_div, "rep_drive_train_btn", "misc_services_list", "Replace Drive Train")'>Replace Drive Train</button>
            </div>
            
            <div class="pri_service_button_div" id="pri_update_firmware_btn_div">
                <button class="pri_service_btn" id="update_firmware_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_update_firmware_btn_div, "update_firmware_btn", "misc_services_list", "Update Firmware")'>Update Firmware</button>
            </div>

            <div class="pri_service_button_div" id="pri_other_service_btn_div">
                <button class="pri_service_btn" id="other_service_btn" data-btn_selected='false' onclick='toggle_primary_button(pri_other_service_btn_div, "other_service_btn", "misc_services_list", "Other Service")'>Other Service</button>
            </div>
        </div>
        <div class="pri_repair_sel_box_notes">
            <h1>Scheduled Repairs</h1>
            <div class="sked_repairs_list">
                <ul class="no_bullet" id="tu_services_list"></ul>
                <ul class="no_bullet" id="der_services_list"></ul>
                <ul class="no_bullet" id="brake_services_list"></ul>
                <ul class="no_bullet" id="flat_services_list"></ul>
                <ul class="no_bullet" id="tire_services_list"></ul>
                <ul class="no_bullet" id="tubeless_services_list"></ul>
                <ul class="no_bullet" id="wheel_services_list"></ul>
                <ul class="no_bullet" id="misc_services_list"></ul>
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
            <textarea class="notes_ta" id="repair_notes_ta" placeholder=" Additional Notes..."></textarea>
        </div>
    </div>
    <script>
        hide_repair_detail_options();
    </script>










    </body>
</html>



