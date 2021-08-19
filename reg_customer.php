<?php


$fname = val($_POST["first_name_input"]);  
$lname = val($_POST["last_name_input"]);  
$email = val($_POST["email_input"]);  
$phone = val($_POST["phone_input"]);  
$text_opt = val($_POST["text_opt_in"]);  
$cust_id = 0;

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
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

$sql = "INSERT INTO customers (firstname, lastname, email, phone, text_opt)
VALUES ('$fname', '$lname', '$email', '$phone', '$text_opt')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully. Record ID is: " . "<br>";

	echo "First Name: " . $fname . "<br>";
	echo "Last Name: " . $lname . "<br>";
	echo "Phone: " . $phone . "<br>";
	echo "Email: " . $email . "<br>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}






$sql = "SELECT cust_id FROM customers WHERE phone = '" . $phone . "'";
$result = $conn->query($sql);

    if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$cust_id = $row["cust_id"];
			echo $row["cust_id"];
		}
		} else {
			echo "no_cust_id_found";
		}
$conn->close();

header('Location: service_req_builder.php?cust_id='.$cust_id);


?>