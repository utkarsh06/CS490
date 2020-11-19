<?php
  include '../init.php';
  if(isset($_POST['search']) && !empty($_POST['search'])){
  	$user_id = $_SESSION['user_id'];
  	$search  = $getFromU->checkInput($_POST['search']);
  	$result  = $getFromU->search($search);
  	
  	echo'<h4 style= "color:white;">People</h4><div class="message-recent">';
  	foreach ($result as $user) {
  		if($user->user_id != $user_id){
  			echo '<div style= "color:white" class="people-message" data-user="'.$user->user_id.'">
	<div class="people-inner">
		<div class="people-img">
			<img src="'.BASE_URL.$user->profileImage.'"/>
		</div>
		<div class="name-right">
			<span><a style= "color:white">'.$user->screenName.'</a></span><span style= "color:white">@'.$user->username.'</span>
		</div>
	</div>
 </div>';
  		}
  	}
  	echo'</div>';
  }
?>