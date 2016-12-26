<html>
	<head>
		<title>
			<?php echo $title ;?>
		</title>
		<link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">

	</head>
	<body>
		<div class="login-page">
		  <div class="form">
		    <!-- <form class="register-form">
		      <input type="text" placeholder="name"/>
		      <input type="password" placeholder="password"/>
		      <input type="text" placeholder="email address"/>
		      <button>create</button>
		      <p class="message">Already registered? <a href="#">Sign In</a></p>
		    </form> -->
		    <form class="login-form" role="form" action="<?php echo base_url();?>Login/validate_credentials" method="post">
		      <input type="text" placeholder="username" name="username"/>
		      <input type="password" placeholder="password" name="password"/>
		      <?php
		      	if(!empty($message))
		      	{
		      ?>
		      	<p class="message"><?php echo $message;?></p><br/>
		      <?php 
		      	}
		      ?>
		      <button type="submit">login</button>
		    </form>
		  </div>
		</div>
		<script src="<?php echo base_url();?>assets/js/login.js"></script>
	</body>
</html>