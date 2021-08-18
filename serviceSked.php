<?php
class Customer{
    private $firstname;
    private $lastname;
    private $phone;
    private $email;
    private $text_opt_in;
    
        function __construct($input){
            $this->id = strtok($input, "|");
            $this->name = strtok("|");
            $this->get_id();
            $this->get_name();
        
        }
        function get_id() {
            echo "ID: " . $this->id . "<br>";
            return $this->id;
        }
        function get_name() {
            echo "Name: " . $this->name . "<br>";
            return $this->name;
        }
    
    }
}


?>

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


    <?php
        $firstname = $_POST["firstname_input"];
        $pri_color = new Parameter($pri_color_sel);  
        $pri_color_id = $pri_color->get_id();
    
        $lastname = $_POST["lastname_input"];
        $sec_color = new Parameter($sec_color_sel);  
        $sec_color_id = $sec_color->get_id();














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

    
    
    
    ?>















    <div class="form" id="repair_form" > 
        <div class="multi-button">
            <button id="flat_rep_btn" onclick="toggle_flat_checkboxes()" > Flat Repair</button>
            <button id="brake_adj_btn" onclick="toggle_brake_adj_FR_checkboxes()"> Brake Adjust </button>
            <button id="derailleur_adj_btn" onclick="toggle_derailleur_adj_FR_checkboxes()"> Deraileur Adjust</button>
            <button id="tune_up_btn" onclick="toggle_tune_up_dropdown()"> Tune Up</button>
        </div> 
        <!--<button id="btn2">Front</button>-->
        <input type="checkbox" id="front_flat_box" name="front_flat_box" value="front_flat">
        <label for="front_flat_box" id="front_flat_label"> Front Flat</label>
        <input type="checkbox" id="rear_flat_box" name="rear_flat_box" value="rear_flat">
        <label for="rear_flat_box" id="rear_flat_label"> Rear Flat</label>

        <input type="checkbox" id="front_brake_adj_box" name="front_brake_adj_box" value="front_brake_adj">
        <label for="front_brake_adj_box" id="front_brake_adj_label"> Front Brake Adj</label>
        <input type="checkbox" id="rear_brake_adj_box" name="rear_brake_adj_box" value="rear_brake_adj">
        <label for="rear_brake_adj_box" id="rear_brake_adj_label"> Rear Brake Adj</label>

        <input type="checkbox" id="front_derailleur_adj_box" name="front_derailleur_adj_box" value="front_derailleur_adj">
        <label for="front_derailleur_adj_box" id="front_derailleur_adj_label"> Front Derailleur Adj</label>
        <input type="checkbox" id="rear_derailleur_adj_box" name="rear_derailleur_adj_box" value="rear_derailleur_adj">
        <label for="rear_derailleur_adj_box" id="rear_derailleur_adj_label"> Rear Derailleur Adj</label>

        <label for="tune_up_dropdown" id="tune_up_dropdown_label"> Select Tune-Up Type:</label>
        <select type="dropdown" id="tune_up_dropdown" name="tune_up_dropdown" value="standard_tune_up">
            <option value="standard_tune_up">Standard</option>
            <option value="single_speed_tune_up">Single Speed</option>
            <option value="90_day_tune_up">90 Day</option>
        </select>

        <button id="parts_req_button" name="parts_req_button" value="parts_req" onclick="add_parts()">Parts Required </button>


        <ul id="parts_list" name="parts_list"></ul>

        <textarea id="part_input" name="part_input" rows="1" cols="60"></textarea>
        <button id="add_more_parts_btn" name="add_more_parts_btn" value="more_parts_req" onclick="add_to_parts_list()">Add</button>     
        <button id="remove_last_part_btn" name="remove_last_part_btn" onclick="remove_last_part()">Remove Last</button> 




        <script>
                hide_repair_detail_options();
        </script>
    </div>
</body>