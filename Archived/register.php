<?php

$fname = val($_POST["fname"]);  
$lname = val($_POST["lname"]);  
$email = val($_POST["email"]);  
$phone = val($_POST["phone"]);  
$notify_pref = val($_POST["notify_pref"]);  
$email_opt = 0;
$text_opt = 0;

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}


if($notify_pref == "email_notify"){
	$email_opt = 1;
	$text_opt = 0;
}
elseif($notify_pref == "text_notify"){
	$text_opt = 1;
	$email_opt = 0;
}
else{
	$email_opt = 1;
	$text_opt = 1;
}

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

$sql = "INSERT INTO customers (firstname, lastname, email, phone, email_opt, text_opt)
VALUES ('$fname', '$lname', '$email', '$phone', '$email_opt', '$text_opt')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. Record ID is: " . "<br>";

	echo "First Name: " . $fname . "<br>";
	echo "Last Name: " . $lname . "<br>";
	echo "Phone: " . $phone . "<br>";
	echo "Email: " . $email . "<br>";
	echo "Notification: " . $notify_pref . "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>