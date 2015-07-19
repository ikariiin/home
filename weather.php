<html>
    <head>
        <?php
        include "resources/resources.php";
        echo $bootstrap;
        echo $jquery_ui;
        ?>
        <link href='resources/weatherStyle.css' rel='stylesheet' type='text/css' />
        <script src="resources/dragable.js"></script>
    </head>
    <body>
    <?php
    echo $navbar_for_weather;
    ?>
    <div class="panel panel-primary" id="todayWeather">
        <div class="panel-heading">
            Today's Weather
        </div>
        <div class="panel-body">
            Today's
        </div>
    </div>
    </body>
</html>