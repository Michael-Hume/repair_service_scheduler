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
        $cust_id= 0;
        $fname = "";  
        $lname = "";  
        $phone = 0;  
        $text_opt = 0;  

        // Get the customer id passed from the previous page
        if($_GET){
            $cust_id = $_GET['cust_id'];
            echo $_GET['cust_id']; // print_r($_GET);       
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
    <div>
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
        <p>Receive Text Notifications: </p>
        <p id="text_opt"></P>
    </div>
    <script>
        
        var fname = "<?php echo $fname; ?>";
        var lname = "<?php echo $lname; ?>";
        var phone = "<?php echo $phone; ?>";
        var text_opt = "<?php echo $text_opt; ?>"; 
        fill_customer_info(fname, lname, phone, text_opt);
    </script>










    </body>
</html>



