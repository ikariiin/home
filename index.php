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
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Project</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">News</a></li>
                    <li><a href="#">Weather</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
    <!-- Nav Bar Ending










    -->
        <div class="col-sm-4" style="margin-left: 65%; margin-top: 2.5%;">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Cnn News
                </div>
                <div class="panel-body">
                        <div class="list-group">
                            <?php
                            $items = $feed->channel->item;
                            for($i = 0; $i <= 2+1; $i++)
                            {
                                echo "<a href='". $items[$i]->guid ."' class='list-group-item'>
            <h4 class='list-group-item-heading'>" . $items[$i]->title . "</h4>
                    <p class='list-group-item-text'>" . $items[$i]->description . "</p>
                </a>";
                            }
                            ?>
                        </div>
                </div>
            </div>
        </div>
    <!-- Cnn News Ended





    -->

    </body>
</html>
