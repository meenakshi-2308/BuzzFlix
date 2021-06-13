<?php 
    session_start();
    require_once "bootstrap.php";
    require_once "pdo.php";
    if(!isset($_SESSION['name'])){
        die('Not Logged In!');
    }
    if(isset($_POST['search'])){
        $_SESSION['search']=$_POST['search'];
        header("Location: search.php");
        return;
    }
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="bootstrap.min.css">
        <link rel="stylesheet" href="submission_style.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Netflix Buzz</title>
    </head>
    <body>
        <section id="home_pg">
            <header>
                <div class="row">
                    <div class="navbar container-fluid navbar-dark">
                        <div class="links_ container-fluid">
                        <?php echo('<a class="navitem" href="#" color="palevioletred"><i class="fa fa-fw fa-user"></i>Welcome!<br>'.htmlentities($_SESSION['name']));?>
                        <?php echo('<a class="navitem" href="#" color="palevioletred"><i class="fa fa-fw fa-user"></i>Top 10<br>');?>
                        <a class="active navitem" href="home.php"><i class="fa fa-fw fa-home"></i> Home</a> 
                        <form method="POST">
                        <i class="fa fa-fw fa-search navitem"></i><input type="text" class="navitem" placeholder="search"  name="search" >
                        </form>
                        <a class="navitem" href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a> 
                        <a class="navitem" href="logout.php"><i class="fa fa-fw fa-user"></i>Logout</a>
                        </div>
                    </div>
                </div>
            </header>
        
            <div class="explain">
            <div>
                <p class="intro">Netflix, Prime Video, Disney + and hte list goes on... The streaming platforms have become an integral part of our lives, especially in 
                the recent few decades. With TV Shows transcending linguistic boundaries, finding way into our daily lives, and characters winning over our hearts, here is 
                a small attempt to bring to you an easy access to find out the top most rated show all over the world.
                </p></div>
                <div>
                <p class="intro">
                Seek for your favorite show among the list of the international trend setters. Learn more about your favorite show. Take a tour of the imdb page dedicated
                to the show that throws you off your foot. Rate the ones you like. Enter the musing world of entertainment!    
                </p></div>
                <div>
                <p class="intro">Top 10. Find the shows that have received international acclaim. Get interesting recommendations. Build on your watchlist. 
                Lets not waste another minute trying to figure out which show to watch. Pick out a random show from the best!</p></div>
            </div>
            <div class="top10">
                <a href="top10.php"><img class="t10" src="top10.jpg" alt="TOP 10"></a>
            </div>
            <div class="recommend">
                <a href="recommend.php"><img class="rec" src="recommend.jpg" alt="Recommend"></a>
            </div>
        </section>
    </body>
</html>