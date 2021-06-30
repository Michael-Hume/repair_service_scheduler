<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wheel Away</title>
        <!--LINK JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <script type="text/javascript" src="addBike.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container">
                <div class="navbar-header">
    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#nav1">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Wheel Away Cycle Center</a>
                </div>
    
                <div class="collapse navbar-collapse" id="nav1">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="https://www.wheelaway.com">Home</a></li>
                        <!--
                        <li><a href="#">Link 2</a></li>
                        <li><a href="#">Link 3</a></li>
                        <li><a href="#">Link 4</a></li>
                        -->
                    </ul>
    
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://www.wheelaway.com"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-search"></span> Search</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <?php

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

            // Select Primary Color
            $sql = "SELECT * FROM colors";
            $pri_color_result = $conn->query($sql);
            $json_pri_color_array = json_encode($pri_color_result);

            // Select Secondary Color
            $sql = "SELECT * FROM colors";
            $sec_color_result = $conn->query($sql);
            $json_sec_color_array = json_encode($sec_color_result);

            // Select Categories
            $sql = "SELECT * FROM categories";
            $category_result = $conn->query($sql);
            $json_category_array = json_encode($category_result);

            // Select Model
            $sql = "SELECT * FROM model";
            $model_result = $conn->query($sql);
            $json_model_array = json_encode($model_result);

            // Select Level
            $sql = "SELECT * FROM levels";
            $level_result = $conn->query($sql);
            $json_level_array = json_encode($level_result);

            // Select Size
            $sql = "SELECT * FROM size";
            $size_result = $conn->query($sql);
            $json_size_array = json_encode($size_result);

            // Select Wheel Size
            $sql = "SELECT * FROM wheel_sizes";
            $wheel_size_result = $conn->query($sql);
            $json_wheel_size_array = json_encode($json_size_array);
        ?>

        <script>
            var model_obj_array = [];
            <?php
                while ($row = mysqli_fetch_array($model_result)) {
                    echo 'temp_model = new Bike_Model(' . $row['model_id'] . ', "' . $row['name'] . '", ' . $row['cat_id'] . ', );';
                    echo ' model_obj_array.push(temp_model);';
                }
            ?>
            console.log(model_obj_array);
        </script>



        <script>
            var category_obj = <?php echo $json_category_array; ?>;
            var model_obj = <?php echo $json_model_array; ?>;
            var level_obj = <?php echo $json_level_array; ?>;
            var size_obj = <?php echo $json_size_array; ?>;
            var wheel_size_obj = <?php echo $json_wheel_size_array; ?>;
            var pri_color_obj = <?php echo $json_pri_color_array; ?>;
            var sec_color_obj = <?php echo $json_sec_color_array; ?>;
        </script>

        <form action="sendBike.php" method="post">
            <div class="form-body">
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items">
                                <h3>Add New Bicycle</h3>
                                <script>
                                    //test_func();
                                </script>
                                <form class="requires-validation" novalidate>
                                        
                                        <select class="form-select mt-3" name="model_year" id="model_year" required onchange=enableFields(temp_fields)>
                                            <script> var bike_fields = create_bike_fields();
                                                //alert("ALERT TEST");
                                            </script>
                                            <option value="" selected disabled>Model Year</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>

                                        <select class="form-select mt-3" id="category_sel" name="category_sel" required onchange=enableFields(temp_fields)>
                                        
                                            <option value="" selected >Category</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($category_result)) {
                                                    echo '<option value="' . $row['cat_id'] . '|' . $row['category'] . '">' . $row['category'] . '</option>';
                                                    //echo "<option value='" . $row['cat_id'] . "'>" . $row['category'] . "</option>";
                                                }
                                            ?>
                                            <script>bike_fields = add_bike_field(bike_fields, "category_sel"); </script>


                                        </select>
                                        

                                        <select class="form-select mt-3" name="model_sel" id="model_sel" required onchange=enableFields(temp_fields)>
                                            <option value="" selected disabled>Model</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($model_result)) {
                                                    echo '<option value="' . $row['model_id'] . '|' . $row['name'] . '">' . $row['name'] . '</option>';
                                                    //echo "<option value='" . $row['model_id'] . "'>" . $row['name'] . "</option>";
                                                }
                                            ?>
                                            <script>bike_fields = add_bike_field(bike_fields, "model_sel");</script>
                                        </select>

                                        <select class="form-select mt-3" name="level_sel" id="level_sel" required onchange=enableFields(temp_fields)>
                                            <option value="" selected disabled>Level</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($level_result)) {
                                                    echo '<option value="' . $row['level_id'] . '|' . $row['level'] . '">' . $row['level'] . '</option>';
                                                    //echo "<option value='" . $row['level_id'] . "'>" . $row['level'] . "</option>";
                                                }
                                            ?>
                                            <script>bike_fields = add_bike_field(bike_fields, "level_sel");</script>
                                        </select>

                                        <select class="form-select mt-3" name="size_sel" id="size_sel" required onchange=enableFields(temp_fields)>
                                            <option value="" selected disabled>Size</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($size_result)) {
                                                    echo '<option value="' . $row['size_id'] . '|' . $row['size'] . '">' . $row['size'] . '</option>';
                                                    //echo "<option value='" . $row['size_id'] . "'>" . $row['size'] . "</option>";
                                                }
                                            ?>
                                            <script>bike_fields = add_bike_field(bike_fields, "size_sel");</script>
                                        </select>

                                        <select class="form-select mt-3" name="wheel_size_sel" id="wheel_size_sel" required onchange=enableFields(temp_fields)>
                                            <option value="" selected disabled>Wheel Size</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($wheel_size_result)) {
                                                    echo '<option value="' . $row['wheel_size_id'] . '|' . $row['wheel_size'] . '">' . $row['wheel_size'] . '</option>';
                                                    //echo "<option value='" . $row['wheel_size_id'] . "'>" . $row['wheel_size'] . "</option>";
                                                }
                                            ?>
                                            <script>bike_fields = add_bike_field(bike_fields, "wheel_size_sel")</script>
                                        </select>

                                        <select class="form-select mt-3" name="pri_color_sel" id="pri_color_sel" required onchange=enableFields(temp_fields)>
                                            <!--<option selected disabled id="pri_color_sel" name="pri_color_sel" value="pri_color_sel">Primary Color</option>-->
                                            <option value="" selected disabled>Primary Color</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($pri_color_result)) {
                                                    echo '<option value="' . $row['color_id'] . '|' . $row['color'] . '">' . $row['color'] . '</option>';
                                                }   
                                            ?>
                                            <script>bike_fields = add_bike_field(bike_fields, "pri_color_sel")</script>
                                        </select>

                                        <select class="form-select mt-3" name="sec_color_sel" id="sec_color_sel" required onchange=enableFields(temp_fields)>
                                            <option value="" selected disabled>Secondary Color</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($sec_color_result)) {
                                                    echo '<option value="' . $row['color_id'] . '|' . $row['color'] . '">' . $row['color'] . '</option>';
                                                }
                                            ?>
                                            <script>bike_fields = add_bike_field(bike_fields, "sec_color_sel")</script>
                                        </select>

                                        <input type="text" class="form-select mt-3" id="sku" name="sku" placeholder="SKU" oninput=enableFields(temp_fields)>
                                        <script>bike_fields = add_bike_field(bike_fields, "sku");</script>

                                        <input type="text" class="form-select mt-3" id="part_num" name="part_num" placeholder="Part Number" oninput=enableFields(temp_fields)>
                                        <script>bike_fields = add_bike_field(bike_fields, "part_num");</script>

                                        <input type="text" class="form-select mt-3" id="price" name="price" placeholder="Price">
                                        <script>bike_fileds = add_bike_field(bike_fields, "price");
                                                disableFields(bike_fields);
                                                var temp_fields = bike_fields;
                                        </script>
                                       

                                    <div class="form-button mt-3">
                                        <button id="add_bike" type="submit" class="btn btn-primary" onclick="return foo();">Add Bike</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
        </form>
    </body>
</html>