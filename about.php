<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>About | eShop</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/pcard.css" rel="stylesheet">
	  <link href="css/main.css" rel="stylesheet">
	  <link href="css/responsive.css" rel="stylesheet">      
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
    <div class="header-middle"><!--header-middle-->
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="logo pull-left">
              <a href="index.php"><img src="images/home/logo.png" alt="" /></a>
            </div>
          </div>

          <div class="col-sm-8">
            <div class="shop-menu pull-right">
              <ul class="nav navbar-nav">

                <?php if (isset($_SESSION['current_user'])) { ?>
                <li><a href="editprofile.php"><i class="fa fa-user"></i> <?php echo $_SESSION['current_user_fname']; ?></a></li>
                <?php } ?>

                <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart</a></li>

                <?php if (isset($_SESSION['current_user'])) { ?>
                <li><form action="logout.php" method="get">
                <button action="logout.php" method="get" type="submit"><i class="fa fa-lock"></i> Logout</button>
                </form></li>
                <?php } else { ?>
                <li><a href="authentication.php"><i class="fa fa-lock"></i> Login</a></li>
                <?php } ?>

              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-middle-->
  
    <div class="header-bottom"><!--header-bottom-->
      <div class="container">
        <div class="row">
          <div class="col-sm-9">
            
            <div class="mainmenu pull-left">
              <ul class="nav navbar-nav collapse navbar-collapse">
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="about.php" class="active">About</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div><!--/header-bottom-->

    <!-- CONTENT START -->
	 
	 <div id="contact-page" class="container">
    	<div class="bg">
	    	<div class="row"> 			   			
					<h2 class="title text-center">The <strong>Team</strong></h2> 
					<div class="boxContainerContainer">
					<!-- TAK -->
						<aside class="profile-card boxContainer">
  						<header>
    						<!-- here’s the avatar -->
    						<a href="http://tutsplus.com">
      						<img src="images/about/tak.jpg">
    						</a>
    						<!-- the username -->
    						<h1>Tarek</h1>
    						<!-- and role or location -->
    						<h2>Front-end Developer</h2>
  						</header>
 							<!-- bit of a bio; who are you? -->
  							<div class="profile-bio">
    							<p>Terence is an avid reader of science fiction, especially anything to do with aliens and tweed jackets. Most weekends, he can be found cataloguing his collection of rodent skeletons.</p>
								</div>
							<!-- some social links to show off -->
  						<ul class="profile-social-links">
    						<!-- twitter  -->
    						<li>
    					  	<a href="https://twitter.com/Tarek_elsherif">
        						<img src="http://sisyphus-js.herokuapp.com/assets/twitter_icon-aa3c1f5542de27e4810b43c5af1c756f.png">
    					  	</a>
    						</li>
    						<!-- facebook -->
    						<li>
      						<a href="https://www.facebook.com/tarekmostafaelsherif">
        						<img src="https://daks2k3a4ib2z.cloudfront.net/53cda9eccbc8e0894bcf7766/53d1547065325541683a7600_Facebook_icon.png">
      						</a>
    						</li>
								<!-- github -->
    						<li>
      						<a href="https://github.com/TarekElsherif">
        						<img src="http://www.iconsdb.com/icons/preview/black/github-10-xxl.png">
      						</a>
    						</li>
  						</ul>

  						</aside>

  						<!-- 7AMBO2 -->
						<aside class="profile-card boxContainer">
  						<header>
    						<!-- here’s the avatar -->
    						<a href="http://tutsplus.com">
      						<img src="images/about/7amo.jpg">
    						</a>
    						<!-- the username -->
    						<h1>Mohammed</h1>
    						<!-- and role or location -->
    						<h2>Back-end Developer</h2>
  						</header>
 							<!-- bit of a bio; who are you? -->
  							<div class="profile-bio">
    							<p>Terence is an avid reader of science fiction, especially anything to do with aliens and tweed jackets. Most weekends, he can be found cataloguing his collection of rodent skeletons.</p>
								</div>
							<!-- some social links to show off -->
  						<ul class="profile-social-links">
    						<!-- twitter  -->
    						<li>
    					  	<a href="https://twitter.com/Tarek_elsherif">
        						<img src="http://sisyphus-js.herokuapp.com/assets/twitter_icon-aa3c1f5542de27e4810b43c5af1c756f.png">
    					  	</a>
    						</li>
    						<!-- facebook -->
    						<li>
      						<a href="https://www.facebook.com/tarekmostafaelsherif">
        						<img src="https://daks2k3a4ib2z.cloudfront.net/53cda9eccbc8e0894bcf7766/53d1547065325541683a7600_Facebook_icon.png">
      						</a>
    						</li>
								<!-- github -->
    						<li>
      						<a href="https://github.com/TarekElsherif">
        						<img src="http://www.iconsdb.com/icons/preview/black/github-10-xxl.png">
      						</a>
    						</li>
  						</ul>

  						</aside>

  						<!-- 3ABDO2 -->
  						<aside class="profile-card boxContainer">
  						<header>
    						<!-- here’s the avatar -->
    						<a href="http://tutsplus.com">
      						<img src="images/about/abdo.jpg">
    						</a>
    						<!-- the username -->
    						<h1>Abdel-Rahman</h1>
    						<!-- and role or location -->
    						<h2>Back-end Developer</h2>
  						</header>
 							<!-- bit of a bio; who are you? -->
  							<div class="profile-bio">
    							<p>Terence is an avid reader of science fiction, especially anything to do with aliens and tweed jackets. Most weekends, he can be found cataloguing his collection of rodent skeletons.</p>
								</div>
							<!-- some social links to show off -->
  						<ul class="profile-social-links">
    						<!-- twitter  -->
    						<li>
    					  	<a href="https://twitter.com/Tarek_elsherif">
        						<img src="http://sisyphus-js.herokuapp.com/assets/twitter_icon-aa3c1f5542de27e4810b43c5af1c756f.png">
    					  	</a>
    						</li>
    						<!-- facebook -->
    						<li>
      						<a href="https://www.facebook.com/tarekmostafaelsherif">
        						<img src="https://daks2k3a4ib2z.cloudfront.net/53cda9eccbc8e0894bcf7766/53d1547065325541683a7600_Facebook_icon.png">
      						</a>
    						</li>
								<!-- github -->
    						<li>
      						<a href="https://github.com/TarekElsherif">
        						<img src="http://www.iconsdb.com/icons/preview/black/github-10-xxl.png">
      						</a>
    						</li>
  						</ul>

  						</aside>
			 		
				</div>
				</div>    	  
    	</div>	
    </div><!--/#contact-page-->

    		<!-- CONTENT END -->

	<section>
	<br>
	</section>
	
	<footer id="footer"><!--Footer-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-envelope"></i> info@shop.com</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">Copyright © 2015 eShop Inc. All rights reserved.</p>
					<p class="pull-right">Advanced Media Lab Project</p>
				</div>
			</div>
		</div>
		
	</footer><!--/Footer-->

    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>