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
		<link rel="stylesheet" href="assets/css/myeffects/mypersonal.css"/>

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
			</div>nav right ends-->
  
		</div><!-- nav ends -->

	</div><!-- nav container ends -->

</div><!-- header wrapper end -->
	
<!---Inner wrapper-->
<div class="inner-wrapper">
	<!-- main container -->
	<div class="main-container">
		<!-- content left-->
		<div class="content-left">
			<h1>Welcome to Buzz!</h1>
			<br/>
			<p>A place to connect with your friends and to get updates from the people who are close.
			See what the Buzz is about!</p>
		</div><!-- content left ends -->	

		<!-- content right ends -->
		<div class="content-right">
			<!-- Log In Section -->
			<div class="login-wrapper" id= "center-form">
			  <?php include 'includes/login.php'; ?><!--Login Form here-->
			</div><!-- log in wrapper end -->

			<!-- SignUp Section -->
			
			<!--<div class="signup-wrapper"> -->
			<!--  <?php include 'includes/signup-form.php'; ?> SignUp Form here -->
			<!--</div>-->
			<!-- SIGN UP wrapper end -->
			<div>

			<!-- Registeration link -->
			<div>
					<button onclick="redirect()" class = register-btn>Register Now</button>
					<script type="text/javascript">
				    function redirect()
				    {
				    //change this location when deploying
				    location.href = "https://calm-ocean-67152.herokuapp.com/register.php";
				    
				    }
				 </script>
			</div>



		</div><!-- content right ends -->

	</div><!-- main container end -->

</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->
</body>
</html>