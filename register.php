<?php
   include 'core/init.php';
   if(isset($_SESSION['user_id'])){
   	 header('Location: home.php');
   }
?>

<html>
	<head>
		<title>Buzz</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
		<link rel="stylesheet" href="assets/css/style-complete.css"/>
	</head>
	<!--Helvetica Neue-->
<body>
<div class="front-img">
	<img src="assets/images/defaultCoverImage.png"></img>
</div>	

<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">
	
	<div class="nav-container">
		<!-- Nav -->
		<div class="nav">
			
			<div class="nav-left">
				<ul>
					<li><i class="fa fa-home" aria-hidden="true"></i><a href="https://calm-ocean-67152.herokuapp.com/">Home</a></li>
				   <!-- <li><i class="fa fa-question" aria-hidden="true"></i><a href="#">About</a></li> -->
				</ul>
			</div><!-- nav left ends-->

	<!--<div class="nav-right">
				<ul>
					<li><i class="fa fa-language" aria-hidden="true"></i><a href="#">Language</a></li>
				</ul>
			</div> nav right ends-->
  
		</div><!-- nav ends -->

	</div><!-- nav container ends -->

</div><!-- header wrapper end -->
	
<!---Inner wrapper-->
<div class="inner-wrapper">
	<!-- main container -->
	<div class="main-container">

		<!-- content right ends -->
		<div class="content-center">


			<!-- SignUp Section -->
			<div class="signup-wrapper">
			  <?php include 'includes/signup-form.php'; ?> <!--SignUp Form here -->
			</div>
			<!-- SIGN UP wrapper end -->

		</div><!-- content right ends -->

	</div><!-- main container end -->

</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->
</body>
</html>