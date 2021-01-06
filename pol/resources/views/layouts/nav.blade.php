
<!DOCTYPE html>
    <html dir="ltr" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- ==== Document Title ==== -->
       <!--  <title> Peal To Police </title> -->
        <!-- ==== Document Meta ==== -->
        <meta name="author" content="ThemeLooks">
        <meta name="description" content="Multipurpose Social Network HTML5 Template">
        <meta name="keywords" content="social media, social network, forum, shop, bootstrap, html5, css3, template, responsive, retina ready">

        <!-- slider -->
        <link rel="stylesheet" href="/slider/style.css">
        <link rel="stylesheet" href="/slider/bootstrap.min.css">
        <!-- slider -->

        <!-- ==== Favicon ==== -->
        <!-- <link rel="icon" href="../html/favicon.png" type="image/png"> -->
        <!-- ==== Google Font ==== -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:400,500,600,700%7CRoboto:300,400,400i,500,700">
        <!-- ==== Plugins Bundle ==== -->
        <link rel="stylesheet" href="/css/plugins.min.css">
        <!-- ==== Main Stylesheet ==== -->
        <link rel="stylesheet" href="/style.css">
        <!-- ==== Responsive Stylesheet ==== -->
        <link rel="stylesheet" href="/css/responsive-style.css">
        <!-- ==== Color Scheme Stylesheet ==== -->
        <link rel="stylesheet" href="/css/colors/color-1.css" id="changeColorScheme">
        <!-- ==== Custom Stylesheet ==== -->
        <!-- <link rel="stylesheet" href="/css/custom.css"> -->

        <script src="/lib/jquery-3.2.0.min.js"></script>
        <script src="/lib/bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="/lib/bootstrap-switch/css/bootstrap-switch.min.css">
       
    </head>
    <body>
        <!-- Preloader Start -->
        <!-- <div id="preloader">
            <div class="preloader--inner"></div>
        </div> -->
        <!-- Preloader End -->
        <!-- Wrapper Start -->
        <div class="wrapper">
            <!--Header Section Start-->
            <header class="header--section style--1">

                <!-- Header Navbar Start -->
                <div class="header--navbar navbar bg-black" data-trigger="sticky">
                <div class="container">
                    <div id="headerNav" class="navbar-collapse collapse float--right">

                        <div class="navbar-header">

                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#headerNav">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <div class="header--navbar-logo navbar-brand" style="">
                                <h2><span style="color: #C7C7C9">Peal To</span>
                                    <span style="color: #1DA1F2">Police</span></h2>
                            </div>

                        </div>



                        <!-- Header Nav Links Start -->
                        <ul class="header--nav-links style--1 nav ff--primary homenavfloat">
                            @if(Auth::check() && Auth::user()->role==2)
                            
                            <li class="dropdown">
                                <a href="/admin">
                                    <span>Admin</span>
                                    <i class="fa fa-user"></i>
                                </a>
                                
                            </li>
                            
                            @endif

                            <li class="dropdown">
                                <a href="/">
                                    <span>Home</span>
                                    <!-- <i class="fa fa-caret-down"></i> -->
                                </a>
                                
                            </li>
                            <li class="dropdown">
                                <a href="/wall">
                                    <span> Wall </span>
                                    <!-- <i class="fa fa-caret-down"></i> -->
                                </a>
                                
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>Find People</span>
                                    <!-- <i class="fa fa-caret-down"></i> -->
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="/missings"><span>Missing Person</span></a></li>
                                    <li><a href="/wanteds"><span>Wanted Person</span></a></li>
                                    <li><a href="/criminal-records"><span>Criminal Record</span></a></li>
                                    <li><a href="/gd"><span>GD</span></a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="/notices">
                                    <span>Notices</span>
                                    <!-- <i class="fa fa-caret-down"></i> -->
                                </a>
                                
                            </li>
                            
                            <!-- <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span>Contact</span>
                                </a>
                                
                            </li> -->

                            
                            
                            @if(!Auth::check())
                            
                            <li><a href="/login"><span>Login</span></a></li>
                            @else
                            <li><a href="/contact"><span>Contact with Journalist</span></a></li>
                            <li><a href="/profile"><span>Profile</span></a></li>
                            <li>
                                <form action="/logout" method = "post">
                                @csrf
                                    <button type="submit" style="background:transparent;border:0;margin-top:26px;">Logout</button>
                                </form>
                            </li>
                            @endif
                        </ul>
                        <!-- Header Nav Links End -->
                    </div>
                </div>
            </div>
                <!-- Header Navbar End -->
            </header>
            <!-- Header Section End -->

            @yield('content')
   
    <!-- Footer Section Start -->
    <footer class="footer--section">           
        <!-- Footer Copyright Start -->
        <div class="footer--copyright pt--30 pb--30 bg-darkest">
            <div class="container">
                <div class="text fw--500 fs--14 text-center">
                    <p>Copyright &copy; Peal To<span>Police</span>. All Rights Reserved.</p>
                </div>
            </div>
        </div>
        <!-- Footer Copyright End -->
    </footer>
    <!-- Footer Section End -->
    </div>
    <!-- Wrapper End -->
    <!-- Back To Top Button Start -->
    <div id="backToTop">
        <a href="#" class="btn"><i class="fa fa-caret-up"></i></a>
    </div>
    <!-- Back To Top Button End -->
    <!-- ==== Plugins Bundle ==== -->
    <script src="/slider/jquery-2.2.4.min.js"></script>

    <script src="/slider/popper.min.js"></script>

    <script src="/slider/bootstrap.min.js"></script>
    
    <script src="/js/plugins.min.js"></script> 

    <!-- ==== Main Script ==== -->
    <script src="/js/main.js"></script>

    </body>
    </html>