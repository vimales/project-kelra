<!DOCTYPE html>
<html>
<head> 
  <title>Sign-Up/Login Form</title>
  <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet"   href = "<?php echo base_url(); ?>css/style.css">
		  
</head>

<body>

	<img id="image"  src = "<?php echo base_url();  ?>logo.png" alt="KELRA-CEG's Quora"/>
	<!-- img id="kellogg-debates" src="kellogg-debates.jpg"/-->
	
	<span style="color: red;"><?php
					if($this->session->flashdata('val')){
						echo $this->session->flashdata('val');
						
					}
					?>
	</span>
	
	<div class="form">
      
		<ul class="tab-group">
			<li class="tab active"><a href="#signup">Sign Up</a></li>
			<li class="tab"><a id="login-tab" href="#login">Log In</a></li>
		</ul>
		
	  
		<div class="tab-content">
			<div id="signup">   
				<h1>Sign Up for Free</h1>
				
		
	   
				<form action="<?php echo base_url('index.php/Login_controller/signup'); ?>" method="post">
          
				<div class="top-row">
					<div class="field-wrap">
						<label>
						First Name<span class="req">*</span>
						</label>
						<input name="first_name" type="text"   autocomplete="off" />
					</div>
        
					<div class="field-wrap">
						<label>
						Last Name<span class="req">*</span>
						</label>
						<input name="last_name" type="text"  autocomplete="off"/>
					</div>
				</div>
				<div class="field-wrap">
					<label>
					Profile Name<span class="req">*</span>
					</label>
					<input name="profile_name" type="text" autocomplete="off"/>
				</div>
			
				<div class="field-wrap">
					<label>
					Email Address<span class="req">*</span>
					</label>
					<input name="email" type="text" autocomplete="off"/>
				</div>
          
				<div class="field-wrap">
					<label>
					Set A Password<span class="req">*</span>
					</label>
					<input name="password" type="password" autocomplete="off"/>
				</div>
		  
				<div class="field-wrap">
					<label>
					Confirm Password<span class="req">*</span>
					</label>
					<input name="confirm_password" type="password" autocomplete="off"/>
				</div>
          
				<input name="getStartedButton" type="submit" class="button button-block" value="Get Started" style="cursor: pointer"/>
            
          
			</form>

        </div>
        
        <div id="login">   
			<h1>Welcome Back!</h1>
			
			<form action="<?php echo base_url('index.php/Login_controller/login'); ?>" method="post">
          
		  
            <div class="field-wrap">
				<label>
				Email Address<span class="req">*</span>
				</label>
				<input name="login_email" type="text" autocomplete="off"/>
				
			</div>
			
			<div class="field-wrap">
				<label>
				Password<span class="req">*</span>
				</label>
				<input name="login_password" type="password" autocomplete="off"/>
				
			</div>
          
			<p class="forgot"><a href="#">Forgot Password?</a></p>
			
			<input type="submit" name="loginButton" class="button button-block" value="Log In" style="cursor: pointer"/>
          
			</form>
	
        </div>
        
      </div><!-- tab-content -->
      
</div> <!-- /form -->
	<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src = "<?php echo base_url();  ?>js/index.js"></script>

</body>
</html>
