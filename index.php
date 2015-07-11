<html>
    <head>
        <?php
            include "resources/resources.php";
            echo $bootstrap;
            echo $weather_icons;
            include "NewsFeed/CnnNewsFeed.php";
            $cnn = new CnnNewsFeed("world");
            $feed = $cnn->getRss();
        ?>
        <script src="weatherModule/weatherFetcher.js"></script>
    </head>
    <body>
    <?php
    //navbar
    echo $navbar;
    $items = $feed->channel->item;
    ?>
    <div id="temp" style="width: 30%; height: 7%; margin-top: 6.5%;">

    </div>
    <?php
    echo $cnnNewsHeader;
    for($i = 0; $i <= 2+1; $i++)
    {
        echo "<a href='". $items[$i]->guid ."' class='list-group-item'>
            <h4 class='list-group-item-heading'>" . $items[$i]->title . "</h4>
                    <p class='list-group-item-text'>" . $items[$i]->description . "</p>
                </a>";
    }
    echo $cnnNewsFooter;
    ?>
    </body>
</html>
