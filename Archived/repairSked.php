<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Wheel Away Repair Schedule</title>

        <!--LINK JQUERY-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
        <script src="fullcalendar/main.js"></script>

        <!--<link rel="stylesheet" href="style.css">-->
        <link rel="stylesheet" href="fullcalendar/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">

        <script type="text/javascript" src="repairSked.js"></script>
    </head>
    <body>
        <div class="ui container">

            <div class="ui menu">
                <div class="header item">Brand</div>
                    <a class="active item">Link</a>
                    <a class="item">Link</a>
                    <div class="ui dropdown item">
                        Dropdown
                        <i class="dropdown icon"></i>
                        <div class="menu">
                        <div class="item">Action</div>
                        <div class="item">Another Action</div>
                        <div class="item">Something else here</div>
                        <div class="divider"></div>
                        <div class="item">Separated Link</div>
                        <div class="divider"></div>
                        <div class="item">One more separated link</div>
                    </div>
                </div>
                <div class="right menu">
                    <div class="item">
                        <div class="ui action left icon input">
                            <i class="search icon"></i>
                            <input type="text" placeholder="Search">
                            <button class="ui button">Submit</button>
                        </div>
                    </div>
                    <a class="item">Link</a>
                </div>
            </div>
        </div>
            <br/>
        <div class="ui container">
            <div class="ui grid">
                <div class="ui sixteen column">
                    <div id="calendar"></div>
                </div>
            </div>
        </div>

        </div>
    </body>
</html>