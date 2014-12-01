<?php
session_start();

if (!isset($_COOKIE['loggedinjgdqt']))
{
    header("Location: login.php");
}

print <<<DASHBOARD
<!DOCTYPE html>
<html lang=en>
    <head>
        <title>Dingle</title>   
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <!-- For displaying on mobile devices correctly -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Fonts -->
        <script src="http://use.edgefonts.net/economica:n4,i4,n7,i7;lato:n1,i1,n3,i3,n4,i4,n7,i7,n9,i9.js"></script>
        
        <!-- Bootstrap CSS file -->
        <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css"> 
        <!-- Custom CSS file -->
        <link rel="stylesheet" href="./css/main.css">
        <!-- for buttons -->
        <link href="css/font-awesome-4.1.0/css/font-awesome.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Dingl <img id="logo" src = "./images/logo.png" width = "40" alt = "Image of Logo" /></a>
        </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav menu">
        <li><a href="index.php">Home</a></li>
        <li><a href="featured.html">Featured</a></li>
        <li><a href="reviews.html">Reviews</a></li>
        <li><a href="news.html">News</a></li>
        <li><a href="findstall.html">Find Stall</a></li>
        <li><a href="contactus.html">About Us</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
      <div class="col-lg-3 col-md-3">
          <h1>Welcome to Dingl</h1>
          <p>Two things in life are certain: death and the anguish that one experiences when choosing a public restroom only to find there is no more toilet paper on the roll. At the office, on campus or in a local coffee shop, the ability to find a clean, spacious stall is integral to an enjoyable restroom experience. Everyday men and women alike struggle to find a suitable public restroom in foreign areas. The average human spends 92 days on the toilet in his or her lifetime. Our mission is to make this time spent emptying our bowels an enjoyable one. </p>
      </div>        
<div id="myCarousel" class="carousel slide col-lg-9 col-md-9" data-ride="carousel">
    <!-- Carousel indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>   
    <!-- Carousel items -->
    <div class="carousel-inner">
        <div class="item active">
            <img src="http://placehold.it/1500x500" alt="" />
            <div class="carousel-caption">
              <h3>Texas Union Stalls</h3>
              <p>Lorem ipsum dolor sit amet consectetur…</p>
            </div>
        </div>
        <div class="item">
            <img src="http://placehold.it/1500x500" alt="" />
            <div class="carousel-caption">
              <h3>Gates Dell Complex Restrooms</h3>
              <p>Aliquam sit amet gravida nibh, facilisis gravida…</p>
            </div>
        </div>
        <div class="item">
            <img src="http://placehold.it/1500x500" alt="" />
            <div class="carousel-caption">
              <h3>Student Activity Center</h3>
              <p>Praesent commodo cursus magna vel…</p>
            </div>
        </div>
    </div>
    <!-- Carousel nav -->
    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="carousel-control right" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
        
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="./bootstrap/js/bootstrap.min.js"></script>
        <script src="./js/_main.js"></script>
    
    </body>
</html>
DASHBOARD;

?>
