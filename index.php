<html>
    <head>
        <?php
            include "NewsFeed/CnnNewsFeed.php";
            $cnn = new CnnNewsFeed("world");
            $feed = $cnn->getRss();
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    </head>
    <body>
    <?php
    $items = $feed->channel->item;
    foreach($items as $item)
    {
        echo "<a href='#' class='list-group-item active'>
            <h4 class='list-group-item-heading'>Heading</h4>
                    <p class='list-group-item-text'>Group Text</p>
                </a>";
    }
    ?>
        <div class="col-sm-4">
            <div class="list-group">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading">Heading</h4>
                    <p class="list-group-item-text">Group Text</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Heading</h4>
                    <p class="list-group-item-text">Group Text</p>
                </a>
                <a href="#" class="list-group-item">
                    <h4 class="list-group-item-heading">Heading</h4>
                    <p class="list-group-item-text">Group Text</p>
                </a>
            </div>
        </div>
    </body>
</html>
