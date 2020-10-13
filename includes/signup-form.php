<?php 
 if(isset($_POST['signup'])){
	$screenName = $_POST['screenName'];
	$password   = $_POST['password'];
	$email      = $_POST['email'];
	$error      = '';

	if(empty($screenName) or empty($password) or empty($email)){
		$error = 'Please enter all of the fields';
	}else{
		$email      = $getFromU->checkInput($email);
		$screenName = $getFromU->checkInput($screenName);
		$password   = $getFromU->checkInput($password);
		
		if(!filter_var($email)){
			$error = 'Email is invalid, enter a valid email';
		}else if(strlen($screenName) > 20){
			$error = 'Name must be in between 6-20 characters';
		}else if (strlen($password) < 5){
			$error = 'Password should be more than 5 characters';
		}else {
			if($getFromU->checkEmail($email) ===true){
				$error = 'Email is already in use';
			}else{
				$user_id = $getFromU->create('users', array('email' => $email, 'password' => $password, 'screenName'=> $screenName, 'profileImage' => 'assets/images/defaultprofileimage.png', 'profileCover' => 'assets/images/defaultCoverImage.png'));
				$_SESSION['user_id'] = $user_id;
				header('Location: includes/signup.php?step=1');
			}
		}
	}
}
?>
<link rel="stylesheet" href="assets/css/myeffects/login.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>

<div class = "" >
	<form method="post" class = "login-form">
	<div style = "text-align: center" class="signup-div" > 
		<h3>Sign up </h3>
		<ul>
			<div class = "floating-label">
				<li>
				    <input type="text" name="screenName" placeholder="Full Name"/>
				</li>
			</div>
			<div class = "floating-label">
				<li>
				    <input type="email" name="email" placeholder="Email"/>
				</li>
			</div>
			<div class = "floating-label">
				<li>
					<input type="password" name="password" placeholder="Password"/>
				</li>
			</div>
			<li>
				<input type="submit" name="signup" Value="Register" class = register-btn>
			</li>
		</ul>
		<?php
			if(isset($error)){
				echo ' <li class="error-li">
		  <div class="span-fp-error">'.$error.'</div>
		 </li> ';
			}
		?>
		
	</div>
	</form>
</div>