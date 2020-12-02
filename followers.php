<?php
	if(isset($_GET['username'])=== true && empty($_GET['username']) === false){
		include 'core/init.php';
		$username    = $getFromU->checkInput($_GET['username']);
		$profileId   = $getFromU->userIdByUsername($username);
		$profileData = $getFromU->userData($profileId);
		$user_id     = $_SESSION['user_id'];
		$user        = $getFromU->userData($user_id);

		if(!$profileData){
			header('Location: index.php');
		}
	}
?>
<!doctype html>
<html>
	<head>
		<title>Buzz</title>
		<meta charset="UTF-8" />
 		<link rel="stylesheet" href="<?php echo BASE_URL;?>assets/css/style-complete.css"/>
   		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>  
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>  	  

    </head>
<!--Helvetica Neue-->
<body>
<div class="wrapper">
<!-- header wrapper -->
<div class="header-wrapper">	
	<div class="nav-container">
    	<div class="nav">
		<div class="nav-left">
			<ul>
				<li><a href="<?php echo BASE_URL;?>home.php"><i class="fa fa-home" aria-hidden="true"></i>Home</a></li>
				<!--<li><a href="<?php echo BASE_URL;?>i/notifications"><i class="fa fa-bell" aria-hidden="true"></i>Notification</a></li>
				<li><i class="fa fa-envelope" aria-hidden="true"></i>Messages</li> -->
				 
			</ul>
		</div><!-- nav left ends-->
		<div class="nav-right">
			<ul>
				<li><input type="text" placeholder="Search" class="search"/><i class="fa fa-search" aria-hidden="true"></i>
					<div class="search-result"> 			
					</div>
				</li>

				<li class="hover"><label class="drop-label" for="drop-wrap1"><img src="<?php echo BASE_URL.$profileData->profileImage;?>"/></label>
				<input type="checkbox" id="drop-wrap1">
				<div class="drop-wrap">
					<div class="drop-inner">
						<ul>
							<li><a href="<?php echo BASE_URL.$user->username;?>"><?php echo $user->username;?></a></li>
							<li><a href="<?php echo BASE_URL;?>/profileEdit.php">Settings</a></li>
							<li><a href="<?php echo BASE_URL;?>includes/logout.php">Log out</a></li>
						</ul>
					</div>
				</div>
		
				</li>
			<!--	<li><label for="pop-up-tweet" class="addTweetBtn">Post</label></li> -->
			</ul>
		</div><!-- nav right ends-->

	</div><!-- nav ends -->
	</div><!-- nav container ends -->
</div><!-- header wrapper end -->
<!--Profile cover-->
<div class="profile-cover-wrap"> 
<div class="profile-cover-inner">
	<div class="profile-cover-img">
		<!-- PROFILE-COVER -->
		<img src="<?php echo BASE_URL.$profileData->profileCover;?>"/>
	</div>
</div>
<div class="profile-nav">
 <div class="profile-navigation">
	<ul>
		<li>
		<div class="n-head">
			<!--POSTS -->
		</div>
		<div class="n-bottom">
		  <!-- 0 -->
		</div>
		</li>
		<li>
			<a href="<?php echo BASE_URL.$profileData->username;?>/following">
				<div class="n-head">
					<a href="<?php echo BASE_URL.$profileData->username;?>/following">FOLLOWING</a>
				</div>
				<div class="n-bottom">
					<span class="count-following"><?php echo $profileData->following;?> </span>
				</div>
			</a>
		</li>
		<li>
		 <a href="<?php echo BASE_URL.$profileData->username;?>/followers">
				<div class="n-head">
					 FOLLOWERS 
				</div>
				<div class="n-bottom">
					<span class="count-followers"><?php echo $profileData->followers;?> </span>
				</div>
			</a>
		</li>
		<li>
			<a href="#">
				<div class="n-head">
					<!--LIKES-->
				</div>
				<div class="n-bottom">
					<!-- 0 -->
				</div>
			</a>
		</li>
	</ul>
	<div class="edit-button">
		<span>
			<?php echo $getFromF->followBtn($profileId, $user_id, $profileData->user_id); ?>
			
		</span>
	</div>
    </div>
</div>
</div><!--Profile Cover End-->

<!---Inner wrapper-->
<div class="in-wrapper">
 <div class="in-full-wrap">
   <div class="in-left">
     <div class="in-left-wrap">
	<!--PROFILE INFO WRAPPER END-->
	<div class="profile-info-wrap">
	 <div class="profile-info-inner">
	 <!-- PROFILE-IMAGE -->
		<div class="profile-img">
			<img src="<?php echo BASE_URL.$profileData->profileImage;?>"/>
		</div>	

		<div class="profile-name-wrap">
			<div class="profile-name">
				<a href="<?php echo BASE_URL.$profileData->profileCover;?>"><?php echo $profileData->screenName;?></a>
			</div>
			<div class="profile-tname">
				@<span class="username"><?php echo $profileData->username;?></span>
			</div>
		</div>

		<div class="profile-bio-wrap">
		 <div class="profile-bio-inner">
		    <?php echo $profileData->bio;?>
		 </div>
		</div>

<div class="profile-extra-info">
	<div class="profile-extra-inner">
		<ul>
		<?php if(!empty($profileData->country)){?>
			<li>
				<div class="profile-ex-location-i">
					<i class="fa fa-map-marker" aria-hidden="true"></i>
				</div>
				<div class="profile-ex-location">
					<?php echo $profileData->country;?>
				</div>
			</li>
		<?php }?>

		<?php if(!empty($profileData->website)){?>
			<li>
				<div class="profile-ex-location-i">
					<i class="fa fa-link" aria-hidden="true"></i>
				</div>
				<div class="profile-ex-location">
					<a href="<?php echo $profileData->website;?>" target="_blink"><?php echo $profileData->website;?></a>
				</div>
			</li>
		<?php }?>

			<li>
				<div class="profile-ex-location-i">
					<!-- <i class="fa fa-calendar-o" aria-hidden="true"></i> -->
				</div>
				<div class="profile-ex-location">
 				</div>
			</li>
			<li>
				<div class="profile-ex-location-i">
					<!-- <i class="fa fa-tint" aria-hidden="true"></i> -->
				</div>
				<div class="profile-ex-location">
				</div>
			</li>
		</ul>						
	</div>
</div>

<div class="profile-extra-footer">
	<div class="profile-extra-footer-head">
		<div class="profile-extra-info">
			<ul>
				<li>
					<div class="profile-ex-location-i">
						<i class="" aria-hidden="true"></i>
					</div>
					<div class="profile-ex-location">
						<a href="profileEdit.php"> Edit My Profile </a>
					</div>
				</li>
			</ul>
		</div>
	</div>
	<div class="profile-extra-footer-body">
		<ul>
			 <!-- <li><img src="#"/></li> -->
		</ul>		
	</div>
	<!-- whoToFollow -->

	<!--trends-->
</div>

	 </div>
	<!--PROFILE INFO INNER END-->

	</div>
	<!--PROFILE INFO WRAPPER END-->

	<div class="popupTweet"></div>
	</div>
	<!-- in left wrap-->
</div>
<!-- in left end-->
		<!--FOLLOWING OR FOLLOWER FULL WRAPPER-->
		<div class="wrapper-following">
			<div class="wrap-follow-inner">
               <?php $getFromF->followersList($profileId, $user_id);  ?>
			</div>
		<!-- wrap follo inner end-->
		</div>
		<script type="text/javascript" src="<?php echo BASE_URL;?>/assets/js/follow.js"></script>
		<!--FOLLOWING OR FOLLOWER FULL WRAPPER END-->	
	</div><!--in full wrap end-->
</div>
<!-- in wrappper ends-->
</div><!-- ends wrapper -->
</body>

</html>
