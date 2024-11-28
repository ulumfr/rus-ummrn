<?php
	ob_start();
    error_reporting(E_ALL^(E_NOTICE | E_WARNING));
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- SEO Meta Tags -->
    <meta name="description" content="Aria is a business focused HTML landing page template built with Bootstrap to help you create lead generation websites for companies and their services.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
	<meta property="og:site_name" content="" /> <!-- website name -->
	<meta property="og:site" content="" /> <!-- website link -->
	<meta property="og:title" content=""/> <!-- title shown in the actual shared post -->
	<meta property="og:description" content="" /> <!-- description shown in the actual shared post -->
	<meta property="og:image" content="" /> <!-- image link, make sure it's jpg -->
	<meta property="og:url" content="" /> <!-- where do you want your post to link to -->
	<meta property="og:type" content="article" />

    <!-- Website Title -->
    <title>UMMRN - UMM Research Networks</title>
    
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:500,700&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600&display=swap&subset=latin-ext" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
	<link href="css/magnific-popup.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
</head>
<body data-spy="scroll" data-target=".fixed-top">
    
    <!-- Preloader -->
	<div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->
    <?php
        $navi=$_GET['page'];
        if(!empty($navi)){
            $navigate="'height:100px; background-color:#113448'";
        }else{
            $navigate="";
        }
    ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-md navbar-dark navbar-custom fixed-top" style=<?php echo"$navigate";?>>
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Aria</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="index.php"><img src="images/logo.png" alt="alternative" style="height:70px;"/></a>
        
        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php">HOME <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php?page=researchers">RESEARCHERS</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php?page=cops">COMMUNITIES OF PRACTICE</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php?page=projects">PROJECTS</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link page-scroll" href="index.php?page=cfps">CALL FOR PROJECTS</a>
                </li>
                <?php
                    if($_SESSION['user']){
                        echo"
                            <li class='nav-item dropdown'>
                                <span class='nav-link dropdown-toggle page-scroll' id='navbarDropdown' role='button' aria-haspopup='true' aria-expanded='false'>MY ACCOUNT</span>
                                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                                    <a class='dropdown-item' href='index.php?page=user-profile'><span class='item-text'>PROFILE</span></a>
                                    <div class='dropdown-items-divide-hr'></div>
                                    <a class='dropdown-item' href='index.php?page=notifications'><span class='item-text'>NOTIFICATIONS</span></a>
                                    <div class='dropdown-items-divide-hr'></div>
                                    <a class='dropdown-item' href='logout.php'><span class='item-text'>LOGOUT</span></a>
                                </div>
                            </li>         
                        ";
                    }else{
                        echo"
                        <li class='nav-item'>
                            <a class='nav-link page-scroll' href='index.php?page=login'>LOGIN</a>
                        </li>
                        ";
                    }
                ?>           
               
            </ul>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navbar -->
    <?php
        $page=$_GET['page'];
        if(!empty($page)){
            echo"<div style='padding-top:100px;'></div>";
        
            if(file_exists("page/$page.php")){
                include"page/$page.php";	
            }else{
                include"page/error404.php";
            }									
        }else{
            include"page/home.php";
        }
    ?>
    
    <!-- Footer -->
    <div class="footer">
    </div>
    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2020 <b>UMM RESEARCH NETWORKS</b> <a href="https://inovatik.com">Designed by Inovatik</a></p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright --> 
    <!-- end of copyright -->
    
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/morphext.min.js"></script> <!-- Morphtext rotating text in the header -->
    <script src="js/isotope.pkgd.min.js"></script> <!-- Isotope for filter -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
</body>
</html>