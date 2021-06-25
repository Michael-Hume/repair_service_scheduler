<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wheel Away</title>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="style.css">
        <!--LINK JQUERY-->
        <script type="text/javascript" src="jquery-3.3.1.js"></script>
        <script src="https://ajaz.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--<script src="js/reg.js"></script>-->
        <script src="js/addBike.js"></script>
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



        <form action="sendBike.php" method="post">
            <div class="form-body">
                <!--<div class="row">-->
                    <div class="form-holder">
                        <div class="form-content">
                            <div class="form-items">
                                <h3>Add New Bicycle</h3>
                                <form class="requires-validation" novalidate>
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

                                        // Select Secondary Color
                                        $sql = "SELECT * FROM colors";
                                        $sec_color_result = $conn->query($sql);

                                        // Select Categories
                                        $sql = "SELECT * FROM categories";
                                        $category_result = $conn->query($sql);

                                        // Select Model
                                        $sql = "SELECT * FROM model";
                                        $model_result = $conn->query($sql);

                                        // Select Level
                                        $sql = "SELECT * FROM levels";
                                        $level_result = $conn->query($sql);

                                        // Select Size
                                        $sql = "SELECT * FROM size";
                                        $size_result = $conn->query($sql);

                                        // Select Wheel Size
                                        $sql = "SELECT * FROM wheel_sizes";
                                        $wheel_size_result = $conn->query($sql);

                                        ?>

                                        <select class="form-select mt-3" name="pri_color_sel" required>
                                            <!--<option selected disabled id="pri_color_sel" name="pri_color_sel" value="pri_color_sel">Primary Color</option>-->
                                            <?php
                                                echo '<option value="">Primary Color</option>';
                                                while ($row = mysqli_fetch_array($pri_color_result)) {
                                                    echo '<option value="' . $row['color_id'] . '|' . $row['color'] . '">' . $row['color'] . '</option>';
                                                }   
                                            ?>
                                        </select>

                                        <select class="form-select mt-3" name="sec_color_sel" required>
                                            <option value="">Secondary Color</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($sec_color_result)) {
                                                    echo '<option value="' . $row['color_id'] . '|' . $row['color'] . '">' . $row['color'] . '</option>';
                                                }
                                            ?>
                                        </select>

                                        <select class="form-select mt-3" name="category_sel" required>
                                            <option value="">Category</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($category_result)) {
                                                    echo '<option value="' . $row['cat_id'] . '|' . $row['category'] . '">' . $row['category'] . '</option>';
                                                    //echo "<option value='" . $row['cat_id'] . "'>" . $row['category'] . "</option>";
                                                }
                                            ?>
                                        </select>

                                        <select class="form-select mt-3" name="model_sel"required>
                                            <option value="">Model</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($model_result)) {
                                                    echo '<option value="' . $row['model_id'] . '|' . $row['name'] . '">' . $row['name'] . '</option>';
                                                    //echo "<option value='" . $row['model_id'] . "'>" . $row['name'] . "</option>";
                                                }
                                            ?>
                                        </select>

                                        <select class="form-select mt-3" name="level_sel" required>
                                            <option value="">Level</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($level_result)) {
                                                    echo '<option value="' . $row['level_id'] . '|' . $row['level'] . '">' . $row['level'] . '</option>';
                                                    //echo "<option value='" . $row['level_id'] . "'>" . $row['level'] . "</option>";
                                                }
                                            ?>
                                        </select>

                                        <select class="form-select mt-3" name="size_sel" required>
                                            <option value="">Size</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($size_result)) {
                                                    echo '<option value="' . $row['size_id'] . '|' . $row['size'] . '">' . $row['size'] . '</option>';
                                                    //echo "<option value='" . $row['size_id'] . "'>" . $row['size'] . "</option>";
                                                }
                                            ?>
                                        </select>

                                        <select class="form-select mt-3" name="wheel_size_sel" required>
                                            <option value="">Wheel Size</option>
                                            <?php
                                                while ($row = mysqli_fetch_array($wheel_size_result)) {
                                                    echo '<option value="' . $row['wheel_size_id'] . '|' . $row['wheel_size'] . '">' . $row['wheel_size'] . '</option>';
                                                    //echo "<option value='" . $row['wheel_size_id'] . "'>" . $row['wheel_size'] . "</option>";
                                                }
                                            ?>
                                        </select>

                                        <select class="form-select mt-3" name="model_year" required>
                                            <option value="">Model Year</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                        </select>

                                        <!--<div class="form-select mt-3" required>-->
                                            <!--<label for="part_num">Part Number</label>-->
                                            <input type="text" class="form-select mt-3" id="sku" name="sku" placeholder="SKU">
                                        <!--</div>-->

                                        <div class="form-select mt-3" required>
                                            <!--<label for="part_num">Part Number</label>-->
                                            <input type="text" class="form-control" id="part_num" name="part_num" placeholder="Part Number">
                                        </div>

                                        <div class="form-select mt-3" required>
                                            <!--<label for="price">Price</label>-->
                                            <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                                        </div>

        

                                        



            
                                    <div class="form-button mt-3">
                                        <button id="add_bike" type="submit" class="btn btn-primary" onclick="return foo();">Add Bike</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                <!--</div>-->
            </div>
        </form>
    </body>
</html>