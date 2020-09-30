<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Ride Share</title>        
        <!-- Link to css file -->
        <link rel= "stylesheet" type="text/css" href="index.css?">
        <!-- Bootstrap css -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- Bootstrap jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <!-- Bootstrap icons -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <!-- Bootstrap javascript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script> 
    
        <link href="https://fonts.googleapis.com/css2?family=Coiny&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap" rel="stylesheet">

    
    </head>
    <body>
    <!-- Navitigation -->
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
	    <div class="container-fluid">
            <a class="navbar-brand" href="."><img src="img/logo.png" width="250px" height="70px"></a>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href=".">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.facebook.com/dialog/oauth?client_id=2766679033615065&redirect_uri=http://localhost/callback.php&scope=public_profile">Login with Facebook</a>
                    </li>
                </ul>
            </div>
	    </div>
    </nav>


    <!-- Image Slider -->
    <div id="slides" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#slides" data-slide-to="0" class="active"></li>
            <li data-target="#slides" data-slide-to="1" class="active"></li>
            <li data-target="#slides" data-slide-to="2" class="active"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100" src="img/background1.jpg" alt="First slide">
                <div class="carousel-caption">
                    <h6></br>Welcome to Ride Share!</h6>
                    <p>Find people near you who plan to make the same trip to organize a shared ride together.</p>
                    <!-- Facebook -->
                    <a href="https://www.facebook.com/dialog/oauth?client_id=2766679033615065&redirect_uri=http://localhost/callback.php&scope=public_profile" class="fb connect">Sign in with Facebook</a>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/background02.jpg" alt="Second slide">
                <div class="carousel-caption">
                    <h6></br></br>Ride Share </h6>
                    <h1>- Connecting people together -</h1>
                </div>
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="img/background3.jpg" alt="Third slide">
                <div class="carousel-caption d-block text-left">
                    <h2>Our website helps solve a number of transportation problems: </h2>
                    <ul>
                        <li>Road congestion from many single-user cars</li>
                        <li>Air pollution & climate change from many single-use cars</li>
                        <li>Expense of car ownership, maintenance & petrol</li>
                        <li>Lack of frequent and convenient public transportation</li> 
                    </ul></br>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#slides" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#slides" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container-fluid padding">
            <div class="row text-right">
                <div class="col-12">
                    <h5>Terms | Privacy | Security</h5>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>