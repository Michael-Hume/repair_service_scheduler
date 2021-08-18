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

<!--- - - - - - - - - - - - - - - - - - - - FETCH BIKE INFO FROM DATABASE - - - - - - - - - - - - - - - - - - - --->

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

            // Select Primary Color
            $sql = "SELECT * FROM colors";
            $pri_color_result = $conn->query($sql);
            $json_pri_color_array = json_encode($pri_color_result);

            // Select Secondary Color
            $sql = "SELECT * FROM colors";
            $sec_color_result = $conn->query($sql);
            $json_sec_color_array = json_encode($sec_color_result);
        ?>

<!--- - - - - - - - - - - - - - - - - - - - LOAD PHP ARRAYS INTO JAVASCRIPT ARRAYS - - - - - - - - - - - - - - - - - - - --->
        <script>
            /*- - - - - - - CATEGORIES - - - - - - - */
            var category_obj_array = [];
            <?php
                while ($row = mysqli_fetch_array($category_result)) {
                    echo 'temp_category = new Bike_Category (' . $row['cat_id'] . ', "' . $row['name'] . '");';
                    echo 'category_obj_array.push(temp_category);';
                }
            ?>
            console.log(category_obj_array);

            /*- - - - - - - MODELS - - - - - - - */
            var model_obj_array = [];
            <?php
                while ($row = mysqli_fetch_array($model_result)) {
                    echo 'temp_model = new Bike_Model(' . $row['model_id'] . ', "' . $row['name'] . '", ' . $row['cat_id'] . ', ' . $row['level_sys'] . ', ' . $row['size_sys'] . ', ' . $row['wheel_size_sys'] . ');';
                    echo 'model_obj_array.push(temp_model);';
                }
            ?>
            console.log(model_obj_array);

            /*- - - - - - - LEVELS - - - - - - - */
            var level_obj_array = [];
            <?php
                while ($row = mysqli_fetch_array($level_result)) {
                    echo 'temp_level = new Bike_Level (' . $row['level_id'] . ', "' . $row['name'] . '", ' . $row['level_sys'] . ');';
                    echo 'level_obj_array.push(temp_level);';
                }
            ?>
            console.log(level_obj_array);

            /*- - - - - - - SIZES - - - - - - - */
            var size_obj_array = [];
            <?php
                while ($row = mysqli_fetch_array($size_result)) {
                    echo 'temp_size = new Bike_Size (' . $row['size_id'] . ', "' . $row['size'] . '", ' . $row['size_sys'] . ');';
                    echo 'size_obj_array.push(temp_size);';
                }
            ?>
            console.log(size_obj_array);

            /*- - - - - - - WHEEL SIZES - - - - - - - */
            var wheel_size_obj_array = [];
            <?php
                while ($row = mysqli_fetch_array($wheel_size_result)) {
                    echo 'temp_wheel_size = new Bike_Wheel_Size (' . $row['wheel_size_id'] . ', "' . $row['wheel_size'] . '", ' . $row['wheel_size_sys'] . ');';
                    echo 'wheel_size_obj_array.push(temp_wheel_size);';
                }
            ?>
            console.log(wheel_size_obj_array);

            /*- - - - - - - COLORS - - - - - - - */
            var color_obj_array = [];
            <?php
                while ($row = mysqli_fetch_array($pri_color_result)) {
                    echo 'temp_color = new Bike_Color (' . $row['color_id'] . ', "' . $row['color'] . '");';
                    echo 'color_obj_array.push(temp_color);';
                }
            ?>
            console.log(color_obj_array);
        </script>


        <!--
        <script>
            var category_obj = <?php echo $json_category_array; ?>;
            var model_obj = <?php echo $json_model_array; ?>;
            var level_obj = <?php echo $json_level_array; ?>;
            var size_obj = <?php echo $json_size_array; ?>;
            var wheel_size_obj = <?php echo $json_wheel_size_array; ?>;
            var pri_color_obj = <?php echo $json_pri_color_array; ?>;
            var sec_color_obj = <?php echo $json_sec_color_array; ?>;
        </script>
        -->
        <script> 
            var bike_fields = create_bike_fields();
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
                                            
                                            <option value="" selected disabled>Model Year</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>

                                        <!-- - - - - - - - - - LOAD DATA FROM JS ARRAYS TO SELECT DROPDOWNS - - - - - - - - - -->

                                        <!-- - - - - - - - - - CATEGORIES - - - - - - - - - -->
                                        <select class="form-select mt-3" id="category_sel" name="category_sel" required onchange="populate_next_field(0)">
                                            <option value="" selected >Category</option>
                                            <script> 
                                                populate_select_options("category_sel", category_obj_array);
                                                bike_fields = add_bike_field(bike_fields, "category_sel");
                                            </script>
                                            <script>
                                                console.log("SELECTED: " + document.getElementById("category_sel").value)
                                            </script>
                                        </select>

                                        <!-- - - - - - - - - - MODELS - - - - - - - - - -->
                                        <select class="form-select mt-3" id="model_sel" name="model_sel" required onchange=populate_next_field(1)>
                                            <option value="" selected >Model</option>
                                            <script> 
                                                //populate_model_select_options("model_sel", model_obj_array);
                                                bike_fields = add_bike_field(bike_fields, "model_sel");
                                            </script>
                                        </select>

                                        <!-- - - - - - - - - - LEVELS - - - - - - - - - -->
                                        <select class="form-select mt-3" id="level_sel" name="level_sel" required onchange=populate_next_field(2)>
                                            <option value="" selected >Level</option>
                                            <script> 
                                                populate_select_options("level_sel", level_obj_array);
                                                bike_fields = add_bike_field(bike_fields, "level_sel");
                                            </script>
                                        </select>

                                        <!-- - - - - - - - - - SIZES - - - - - - - - - -->
                                        <select class="form-select mt-3" id="size_sel" name="size_sel" required onchange=populate_next_field(3)>
                                            <option value="" selected >Size</option>
                                            <script> 
                                                populate_select_options("size_sel", size_obj_array);
                                                bike_fields = add_bike_field(bike_fields, "size_sel");
                                            </script>
                                        </select>

                                        <!-- - - - - - - - - - WHEEL SIZES - - - - - - - - - -->
                                        <select class="form-select mt-3" id="wheel_size_sel" name="wheel_size_sel" required onchange=populate_next_field(4)>
                                            <option value="" selected >Wheel Size</option>
                                            <script> 
                                                populate_select_options("wheel_size_sel", wheel_size_obj_array);
                                                bike_fields = add_bike_field(bike_fields, "wheel_size_sel");
                                            </script>
                                        </select>

                                        <!-- - - - - - - - - - PRIMARY COLOR - - - - - - - - - -->
                                        <select class="form-select mt-3" id="pri_color_sel" name="pri_color_sel" required onchange=enableFields(temp_fields)>
                                            <option value="" selected >Primary Color</option>
                                            <script> 
                                                populate_select_options("pri_color_sel", color_obj_array);
                                                bike_fields = add_bike_field(bike_fields, "pri_color_sel");
                                            </script>
                                        </select>

                                        <!-- - - - - - - - - - SECONDARY COLOR - - - - - - - - - -->
                                        <select class="form-select mt-3" name="sec_color_sel" id="sec_color_sel" required onchange=enableFields(temp_fields)>
                                            <option value="" selected disabled>Secondary Color</option>
                                            <script> 
                                                populate_select_options("sec_color_sel", color_obj_array);
                                                bike_fields = add_bike_field(bike_fields, "sec_color_sel");
                                            </script>
                                        </select>

                                        <input type="text" class="form-select mt-3" id="sku" name="sku" placeholder="SKU" oninput=enableFields(temp_fields)>
                                        <script>bike_fields = add_bike_field(bike_fields, "sku");</script>

                                        <input type="text" class="form-select mt-3" id="part_num" name="part_num" placeholder="Part Number" oninput=enableFields(temp_fields)>
                                        <script>bike_fields = add_bike_field(bike_fields, "part_num");</script>

                                        <input type="text" class="form-select mt-3" id="price" name="price" placeholder="Price">
                                        <script>bike_fileds = add_bike_field(bike_fields, "price");
                                                //disableFields(bike_fields);
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