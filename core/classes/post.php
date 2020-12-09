<?php
 class Post extends User{
 
   function __construct($pdo){
   	$this->pdo = $pdo;
   }
   public function posts(){
   	$stmt = $this->pdo->prepare("SELECT * FROM `tweets`, `users` WHERE `tweetBy` = `user_id`");
   	$stmt->execute();
   	$posts = $stmt->fetchAll(PDO::FETCH_OBJ);

   	foreach($posts as $post){
   		echo '<div style="background-color: #b3b3b3;" class="all-tweet">

<div style="background-color: #b3b3b3;" class="t-show-wrap">	
 <div class="t-show-inner">
	<!-- this div is for retweet icon 
	<div class="t-show-banner">
		<div class="t-show-banner-inner">
			<span><i class="fa fa-retweet" aria-hidden="true"></i></span><span>Screen-Name Retweeted</span>
		</div>
	</div>
	-->
	<div class="t-show-popup" data-post= "'.$post->tweetID.'" >
		<div class="t-show-head">
			<div class="t-show-img">
				<img src="'.$post->profileImage.'"/>
			</div>
			<div class="t-s-head-content">
				<div class="t-h-c-name">
					<span><a style = "color: white;" href="'.$post->username.'">'.$post->screenName.'</a></span>
					<span style = "color: white;">@'.$post->username.'</span>
					<span style = "color: white;">'.$this->timeAgo($post->postedOn).'</span>
				</div>
				<div style = "color: white;" class="t-h-c-dis">
					'.$this->getPostLinks($post->status).'
				</div>
			</div>
		</div>';
		if(!empty($post->tweetImage)){
		echo'<!--tweet show head end-->
		 <div class="t-show-body">
		   <div class="t-s-b-inner">
		    <div class="t-s-b-inner-in">
		     <img src="'.$post->tweetImage.'" class="imagePopup"/>
		   </div>
		  </div>
		</div>
		<!--tweet show body end-->';
	}
	echo '</div>
	<div class="t-show-footer">
		<div class="t-s-f-right">
			<ul> 
				<li><button><a href="#"><i class="<!--fa fa-reply-->" aria-hidden="true"></i></a></button></li>	
				<li><button><a href="#"><i class="" aria-hidden="true"></i></a></button></li>
				<li><button><a href="#"><i class="" aria-hidden="true"></i></a></button></li>
					<li>
					<a href="#" class="more"><i class="<!--fa fa-trash-->" aria-hidden="true"></i></a>
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
 
  public function getMessageFrom($messageFrom){
  	$stmt = $this->pdo->prepare("SELECT `username` FROM `users` WHERE `user_id` = :messageFrom "); 
  	$stmt->bindParam(":messageFrom", $messageFrom, PDO::PARAM_INT);
  	$stmt->execute();
  	return $stmt->fetchAll(PDO::FETCH_OBJ);
  }


   public function getUserPosts($user_id){
   	$stmt = $this->pdo->prepare("SELECT * FROM `tweets` LEFT JOIN `users` ON `tweetBy` = `user_id` WHERE `tweetBy` = :user_id ");
   	$stmt->bindParam(":user_id", $user_id, PDO::PARAM_INT);
   	$stmt->execute(); 
    return $stmt->fetchAll(PDO::FETCH_OBJ);
   }

   public function comments($tweet_id){
  	$stmt = $this->pdo->prepare("SELECT * FROM `comments` LEFT JOIN `users` ON `commentBy` = `user_id` WHERE `commentOn` = :tweet_id");
   	$stmt->bindParam(":tweet_id", $tweet_id, PDO::PARAM_INT);
   	$stmt->execute();
   	return $stmt->fetchAll(PDO::FETCH_OBJ);
   }

   public function getPopupPost($tweet_id){
   		$stmt = $this->pdo->prepare("SELECT * FROM `tweets` , `users` WHERE `tweetID` = :tweet_id AND `tweetBy` = `user_id`");
   		$stmt->bindParam(":tweet_id", $tweet_id, PDO::PARAM_INT);
   		$stmt->execute();
   		return $stmt->fetchAll(PDO::FETCH_OBJ);
   }

   public function getPostLinks($post){
   	$post = preg_replace("/(https?:\/\/)([\w]+.)([\w\.]+)/", "<a href='$0' target = '_blink'>$0</a>", $post);
   	$post = preg_replace("/#([\w]+)/", "<a href='".BASE_URL."hashtag/$1'>$0</a> ", $post);
   	$post = preg_replace("/@([\w]+)/", "<a href='".BASE_URL."hashtag/$1'>$0</a> ", $post);
   	return $post;
   }

 }
?>