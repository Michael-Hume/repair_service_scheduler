<?php


class Parameter{
	private $id;
	private $name;

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

function name_builder($model_year, $model, $level, $pri_color, $sec_color, $size){
	$bike_name = $model_year . " " . $model->get_name() . " " . $level->get_name() . " - " . $pri_color->get_name() . "/" . $sec_color->get_name() . " - " . $size->get_name();
	return $bike_name;
}



$pri_color_sel = $_POST["pri_color_sel"];
$pri_color = new Parameter($pri_color_sel);  
$pri_color_id = $pri_color->get_id();

$sec_color_sel = $_POST["sec_color_sel"];
$sec_color = new Parameter($sec_color_sel);  
$sec_color_id = $sec_color->get_id();

$category_sel = $_POST["category_sel"];  
$category = new Parameter($category_sel);  
$category_id = $category->get_id();

$model_sel = $_POST["model_sel"];
$model = new Parameter($model_sel); 
$model_id = $model->get_id();

$level_sel = $_POST["level_sel"];  
$level = new Parameter($level_sel);  
$level_id = $level->get_id();

$size_sel = $_POST["size_sel"];  
$size = new Parameter($size_sel);  
$size_id = $size->get_id();

$wheel_size_sel = $_POST["wheel_size_sel"];
$wheel_size = new Parameter($wheel_size_sel); 
$wheel_size_id = $wheel_size->get_id(); 

$part_num = $_POST["part_num"];  
$price = $_POST["price"];
$model_year = $_POST["model_year"];
$sku = $_POST["sku"];

$bike_name = name_builder($model, $level, $pri_color, $sec_color, $size); 


/*
echo "Bike Name: " . $bike_name . "<br>";
echo "Category: " . $category_sel . "<br>";
echo "Model: " . $model_sel . "<br>";
echo "Level: " . $level_sel . "<br>";
echo "Size: " . $size_sel . "<br>";
echo "Wheel Size: " . $wheel_size_sel . "<br>";
echo "Primary Color: " . $pri_color_sel . "<br>";
echo "Secondary Color: " . $sec_color_sel . "<br>";
echo "Part Number: " . $part_num . "<br>";
echo "Price: " . $price . "<br>";
*/


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

$sql = "INSERT INTO bikes (part_num, name, level_id, pri_color_id, sec_color_id, size_id, cat_id, wheel_size_id, price, year)
VALUES ('$part_num', '$bike_name', '$level_id', '$pri_color_id', '$sec_color_id', '$size_id', '$category_id', '$wheel_size_id', '$price', $model_year)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>