<?php
 include 'core/init.php';
 $user_id = $_SESSION['user_id'];
 $user    = $getFromU->userData($user_id);
 if($getFromU->loggedIn() === false){
 	header('Location: index.php');
 }

 //$getFromU->delete('comments', array('commentID' => '1'));

 if(isset($_POST['post'])){
 	$status = $getFromU->checkInput($_POST['status']);
 	$tweetImage = '';

 	if(!empty($status) or !empty($_FILES['file'] ['name'] [0])){
 		if(!empty($_FILES['file']['name'] [0])){
 			$tweetImage = $getFromU->uploadImage($_FILES['file']);
 		}
 		if(strlen($status) > 140){
 			$error = "The text of your post is too long.";
 		}
 		$getFromU->create('tweets', array('status'=> $status, 'tweetBy' => $user_id, 'tweetImage'=> $tweetImage, 'postedOn' => date('Y-m-d H:i:s')));
 	}else{
 		$error = "Type or choose image to post.";
 	}
 }

?>
<!DOCTYPE HTML> 
 <html>
	<head>
		<title>Buzz</title>
		  <meta charset="UTF-8" />
		  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/> 
		  <script src="https://kit.fontawesome.com/5cefab2e22.js" crossorigin="anonymous"></script>
 	  	  <link rel="stylesheet" href="assets/css/style-complete.css"/> 
   		  <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>  	  
	</head>
	<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">

<div class="nav-container">
	<!-- Nav -->
	<div class="nav">
		
		<div class="nav-left">
			<ul>
				<li><a href="home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
				<!--<li><a href="i/notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notification</a></li> -->
				<li id= "messagePopup"><i class="fa fa-envelope" aria-hidden="true"></i>Messages</li>
				<li> <a href = "snakeGame.php"><i class="fas fa-chess"></i> Game Center</a> </li>
			</ul>
		</div><!-- nav left ends-->

		<div class="nav-right">
			<ul>
				<li>
					<input type="text" placeholder="Search" class="search"/>
					<i class="fa fa-search" aria-hidden="true"></i>
					<div class="search-result">			
					</div>
				</li>

				<li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo $user->profileImage;?>"/></label>
				<input type="checkbox" id="drop-wrap1">
				<div class="drop-wrap">
					<div class="drop-inner">
						<ul>
							<li><a href="<?php echo $user->username;?>"><?php echo $user->username;?></a></li>
							<li><a href="profileEdit.php">Settings</a></li>
							<li><a href="includes/logout.php">Log out</a></li>
						</ul>
					</div>
				</div>
				</li>
				<!-- Post button on top right -->
				<!--<li><label class="addPostBtn">Post</label></li>
			</ul> -->
		</div><!-- nav right ends-->

	</div><!-- nav ends -->

</div><!-- nav container ends -->

</div><!-- header wrapper end -->

<script type="text/javascript" src="assets/js/search.js"></script>

<!---Inner wrapper-->
<div class="inner-wrapper">
<div class="in-wrapper">
	<div class="in-full-wrap">
		<div class="in-left">
			
					

	

	</div><!-- in left wrap-->
		</div><!-- in left end-->
		<div class="in-center">
			<div class="in-center-wrap">
				<!--Post WRAPPER-->
				<div class="post-wrap">
					<div class="post-inner">
						 <div class="post-h-left">
						 	<div class="post-h-img">
						 	<!-- PROFILE-IMAGE -->
						 	</div> 
						 </div>  
						 <h1> SNAKE GAME </h1>
						 </div>
					</div>
				</div><!--Post WRAP END-->

			
				<!--Post SHOW WRAPPER-->
				 <div style = "position:relative; left:-10px; top:30px;" class="posts">
 				  	<div class = "" style = "text-align:center; width: 50%;" >
						<fieldset >
							<legend > Snake Game</legend>
							<div >
								<canvas id="gameCard" width="400" height="400"></canvas>
								<script src="assets/js/snakeGame.js"></script>
							</div>
						</fieldset>
					</div>
 				 </div>
 				<!--Post SHOW WRAPPER-->


				<!--Tweet END WRAPER-->

 			<script type="text/javascript" src="assets/js/popupposts.js"></script>

 			<script type="text/javascript" src="assets/js/messages.js"></script>

 			<script type="text/javascript" src="assets/js/comment.js"></script>
 			
 			<script type="text/javascript" src="assets/js/postMessage.js"></script>

			</div><!-- in left wrap-->
		</div><!-- in center end -->

		

		</div><!-- in right end -->
	<script type="text/javascript" src="assets/js/follow.js"></script>
	</div><!--in full wrap end-->

</div><!-- in wrappper ends-->
</div><!-- inner wrapper ends-->
</div><!-- ends wrapper -->
</body>

</html>