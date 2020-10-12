<?php
	include '../core/init.php';
	$user_id = $_SESSION['user_id'];
	$user    = $getFromU->userData($user_id);
	

	if(isset($_GET['step']) === true && empty($_GET['step'])=== false){

		if(isset($_POST['next'])){
			$username = $getFromU -> checkInput($_POST['username']);
			if(!empty($username)){
				if(strlen($username) > 20){
					$error = " Username must be between in 6 to 20 characters";
				}else if($getFromU->checkUsername($username) === true){
					$error = "Username is already taken!";
				}else{
					//update Username
					$getFromU->update('users', $user_id, array('username' => $username));
					header('Location: signup.php?step=2');
				}
			}else{
				$error = "Please enter username to choose";
			}
		}
	?>
	 <!doctype html>
<html>
	<head>
		<title>buzz</title>
		<meta charset="UTF-8" />
 		<link rel="stylesheet" href="assets/css/font/css/font-awesome.css"/>
		<link rel="stylesheet" href="../assets/css/style-complete.css"/>
	</head>
	<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- nav wrapper -->
<div class="nav-wrapper">
	
	<div class="nav-container">	
		<div class="nav-second">
			<ul>
				<li><a href="#"<i class="fa fa-twitter" aria-hidden="true"></i></a></li>							
			</ul>
		</div><!-- nav second ends-->
	</div><!-- nav container ends -->

</div><!-- nav wrapper end -->

<!---Inner wrapper-->
<div class="inner-wrapper">
	<!-- main container -->
	<div class="main-container">
		<!-- step wrapper-->
<?php if($_GET['step'] == '1'){ ?>
 		<div class="step-wrapper">
		    <div class="step-container">
				<form method="post">
					<h2>Choose a Username</h2>
					<h4> </h4>
					<div>
						<input type="text" name="username" placeholder="Username"/>
					</div>
					<div>
						<ul>
						  <li><?php if(isset($error)){echo $error;}?></li>
						</ul>
					</div>
					<div>
						<input type="submit" name="next" value="Next"/>
					</div>
				 </form>
			</div>
		</div>
  		<?php } ?>
  		<?php if($_GET['step'] == '2'){?>	
	<div class='lets-wrapper'>
		<div class='step-letsgo'>
			<h2>Welcome, <?php echo $user->screenName;?> </h2>
			<p>Buzz allows you to connect with others and share unique moments in your life! </p>
			<br/>
			<p>
				
			</p>
			<span>
				<a href='../home.php' class='backButton'>Let's go!</a>
			</span>
		</div>
	</div>
  	<?php }?>
		
	</div><!-- main container end -->

</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->

</body>
</html>
		<?php
	}
?>