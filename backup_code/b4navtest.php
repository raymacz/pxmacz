<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap NavBar</title>

        <!-- Bootstrap -->
        <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="css/bootstrap-4-navbar.css" rel="stylesheet">


        <!--Demo purpose css-->
        <style>
            body {
                padding-top: 50px;
            }
            .navbar {
                margin:  40px 0;
            }
        </style>
    </head>
    <body>



        <div class="container">

            <!-- Static navbar -->
            <nav class="navbar navbar-expand-md navbar-light bg-light">
                <a class="navbar-brand" href="#">Navbar</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- dynamic wp menu starts here -->

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="https://bootstrapthemes.co" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown link
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item dropdown-toggle" href="#">Submenu</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Submenu action</a></li>
                                        <li><a class="dropdown-item" href="#">Another submenu action</a></li>


                                        <li><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Subsubmenu action aa</a></li>
                                                <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Subsubmenu action bb</a></li>
                                                <li><a class="dropdown-item" href="#">Another subsubmenu action</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item dropdown-toggle" href="#">Submenu 2</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Submenu action 2</a></li>
                                        <li><a class="dropdown-item" href="#">Another submenu action 2</a></li>


                                        <li><a class="dropdown-item dropdown-toggle" href="#">Subsubmenu</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Subsubmenu action 1 3</a></li>
                                                <li><a class="dropdown-item" href="#">Another subsubmenu action 2 3</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item dropdown-toggle" href="#">Second subsubmenu 3</a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#">Subsubmenu action 3 </a></li>
                                                <li><a class="dropdown-item" href="#">Another subsubmenu action 3</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>

                <!-- dynamic wp menu ends here -->
            </nav>

            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron">
                <h1>Bootstrap 4 multi dropdown navbar</h1>
                <p>This example of bootstrap 4 navigation with multi dropdown menu.</p>
                <p>
                    <a class="btn btn-lg btn-danger" href="https://bootstrapthemes.co/demo/resource/bootstrap-4-multi-dropdown-navbar/" target="_blank" role="button">Live Demo</a>
                    <a class="btn btn-lg btn-primary" href="https://github.com/bootstrapthemesco/bootstrap-4-multi-dropdown-navbar"  target="_blank" role="button">Download from Github</a>
                    <a class="btn btn-lg btn-info" href="https://bootstrapthemes.co/demo/resource/bootstrap-4-multi-dropdown-hover-navbar/"  target="_blank" role="button">hover version</a>
                </p>
            </div>

        </div> <!-- /container -->






        <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
        <!-- <script  src="http://code.jquery.com/jquery-3.2.1.min.js"  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="  crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js" ></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script> -->

        <!-- <script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js" ></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script> -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->



        <script src="https://code.jquery.com/jquery-3.3.1.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="js/bootstrap-4-navbar.js"></script>
    </body>
</html>
