<?php
    //$q = intval($_GET['q']);

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

    $phone_rcvd = $_POST["phone_data"];


    //$sql = "SELECT firstname FROM customers WHERE phone = '3093102690'";
    $sql = "SELECT firstname, lastname, email FROM customers WHERE phone = '" . $phone_rcvd . "'";
    $result = $conn->query($sql);

    


    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row["firstname"] . "," . $row["lastname"] . "," . $row["email"];
    }
    } else {
        echo "no_cust_found";
    }
    $conn->close("");
?>