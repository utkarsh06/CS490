<?php
 class Post extends User{
 
   function __construct($pdo){
   	$this->pdo = $pdo;
   }
   public function posts(){
   	$stmt = $this->pdo->prepare("SELECT * FROM `posts`, `users` WHERE `postBy` = `user_id`");
   	$stmt->execute();
   	$posts = $stmt->fetchAll(PDO::FETCH_OBJ);

   	foreach($posts as $post){
   		echo '<div class="all-tweet">
<div class="t-show-wrap">	
 <div class="t-show-inner">
	<!-- this div is for retweet icon 
	<div class="t-show-banner">
		<div class="t-show-banner-inner">
			<span><i class="fa fa-retweet" aria-hidden="true"></i></span><span>Screen-Name Retweeted</span>
		</div>
	</div>
	-->
	<div class="t-show-popup">
		<div class="t-show-head">
			<div class="t-show-img">
				<img src="'.$post->profileImage.'"/>
			</div>
			<div class="t-s-head-content">
				<div class="t-h-c-name">
					<span><a href="'.$post->username.'">'.$post->screenName.'</a></span>
					<span>@'.$post->username.'</span>
					<span>'.$post->postedOn.'</span>
				</div>
				<div class="t-h-c-dis">
					'.$post->status.'
				</div>
			</div>
		</div>';
		if(!empty($post->postImage)){
		echo'<!--tweet show head end-->
		 <div class="t-show-body">
		   <div class="t-s-b-inner">
		    <div class="t-s-b-inner-in">
		     <img src="'.$post->postImage.'" class="imagePopup"/>
		   </div>
		  </div>
		</div>
		<!--tweet show body end-->';
	}
	echo '</div>
	<div class="t-show-footer">
		<div class="t-s-f-right">
			<ul> 
				<li><button><a href="#"><i class="fa fa-reply" aria-hidden="true"></i></a></button></li>	
				<li><button><a href="#"><i class="" aria-hidden="true"></i></a></button></li>
				<li><button><a href="#"><i class="" aria-hidden="true"></i></a></button></li>
					<li>
					<a href="#" class="more"><i class="fa fa-trash" aria-hidden="true"></i></a>
					<ul> 
					  <li><label class="deletePost">Delete Post</label></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>
</div>
</div>';
   	}
   }

 }
?>