<?php
 if(isset($_POST['login']) && !empty($_POST['login'])){
	$email    = $_POST['email'];
	$password = $_POST['password'];

	if(!empty($email) or !empty($password)){
		$email    = $getFromU->checkInput($email);
		$password = $getFromU->checkInput($password);

		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Invalid format";
		}else{
			if($getFromU-> login($email, $password) === false){
				$error = "The email or password is incorrect!";

			}
		}


	}else{
		$error = "Please enter username and password!";
	}
}
?>
<!-- <link rel="stylesheet" href="assets/css/myeffects/login.css"/> -->
<link rel="stylesheet" href="assets/css/myeffects/mypersonal.css"/>
<div class="login-div">
<form method="post" class = "center-form" > 
	<ul>
		<h1> Log in </h1>
		<li>
		  <div class = "floating-label">
		  	<input type="text" name="email" placeholder="Please enter your Email here"/>
		  </div>
		</li>
		<li>
			<div class = "floating-label">
		  		<input type="password" name="password" placeholder="password"/>
		  	</div>
		</li>
		<li>
		  <input type= "submit" name="login" value="Log in"/>
		</li>
	
		<?php
		  if(isset($error)){
		     echo ' <li class="error-li">
	 			   <div class="span-fp-error">'.$error.'</div>
			     </li> ';
	 	  }
		?>
	</ul>
	</form>
</div>