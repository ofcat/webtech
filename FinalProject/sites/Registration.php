<?php include 'includes/head.php'?>
<body>
<?php include 'includes/navbar.php'?>
<?php
    require('../config/db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes
        $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
        $username = mysqli_real_escape_string($con, $username);
        $useremail    = stripslashes($_REQUEST['useremail']);
        $useremail    = mysqli_real_escape_string($con, $useremail);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        $firstName = stripslashes($_REQUEST['firstName']);
        $firstName = mysqli_real_escape_string($con, $firstName);
        $lastName = stripslashes($_REQUEST['lastName']);
        $lastName = mysqli_real_escape_string($con, $lastName);
        $salutation = stripslashes($_REQUEST['salutation']);
        $salutation = mysqli_real_escape_string($con, $salutation);
        

       
        $query    = "INSERT into `users` (firstName, lastName, salutation, username, password, useremail)
                     VALUES ('$firstName', '$lastName', '$salutation', '$username', '" . md5($password) . "', '$useremail' )";
        $result   = mysqli_query($con, $query);
        if ($result) {
            echo "<div class='form'>
                  <h3>You are registered successfully.</h3><br/>
                  <p class='link'>Click here to <a href='Login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h3>Required fields are missing.</h3><br/>
                  <p class='link'>Click here to <a href='Registration.php'>registration</a> again.</p>
                  </div>";
        }
    } else {
?>
    <form class="form" action="" method="post" >
        <h4 class="login-title">Registration</h4>
        <input type="text"class="login-input" name="firstName" placeholder="First Name" required />
        <input type="text" class="login-input" name="lastName" placeholder="Last Name" required />
        <input type="radio" class="login-input" name="salutation" value="Mr"required id="mr"/>
        <label for="mr">Mr</label>
        <input type="radio" class="login-input" name="salutation" value="Ms"required id="ms"/>
        <label for="mr">Ms</label><br>
        <input type="text" class="login-input" name="username" placeholder="Username" required />
        <input type="email" class="login-input" name="useremail" placeholder="Email Adress" required>
        <input type="password" class="login-input" name="password" placeholder="Password" required> <br>
        <input type="submit" name="submit" value="Register" class="login-button">
        <input type="reset" value ="Reset">
        <p class="link"><a href="Login.php">Click to Login</a></p>
    </form>




    <!-- <div class="signup-form">
    <form action="" method="post">
		<h2>Register</h2>
        <div class="form-group">
			<div class="row">
				<div class="col-xs-6"><input type="text" class="form-control" name="firstName" placeholder="First Name" required="required"></div>
				<div class="col-xs-6"><input type="text" class="form-control" name="lastName" placeholder="Last Name" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="salutation" placeholder="Mr/Ms" required="required">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="useremail" placeholder="Email" required="required">
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>        
      
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="Login.php">Sign in</a></div>
</div> -->
<?php
    }
?>
<?php include 'includes/footer.php'?>
</body>
</html>