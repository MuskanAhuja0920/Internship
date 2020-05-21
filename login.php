<?php require_once 'controllers/authController.php';?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <style>
    .field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}
h4 {
    position: relative;
    font-size: 30px;
    z-index: 1;
    overflow: hidden;
    text-align: center;
    color:gray;
}
h4:before, h4:after {
    position: absolute;
    top: 51%;
    overflow: hidden;
    width: 50%;
    height: 1px;
    content: '\a0';
    background-color:lightgray;
}
h4:before {
    margin-left: -50%;
    text-align: right;
}



    </style>
    <title>LOGIN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" ></script>
    <link rel="stylesheet"  href ="style(1).css">
</head>
<body style="background-image: url('background.jpg');background-repeat: ;background-size: 100%,100%">
<section id="nav-bar">
   <nav class="navbar navbar-expand-lg navbar-light navbar-fixed-top">
   <div class="container-fluid">
    <a class="navbar-brand" href="login.php"><img src="logo.jpg" style="height:40px" ></a>
    <ul class=" navbar-nav navbar-right" >
    <li class="nav-item"><a class="nav-link" href="help.php" style="color:gray"><strong>Request for Code</strong></a></li>
      <li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color:gray">
		<strong>Login/Signup</strong></a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="signup.php" ><strong>Sign Up</strong></a>
                <a class="dropdown-item" href="login.php" ><strong>Sign In</strong></a>
			</div>
	  </li>
      
    </ul>
    </div>
</nav>
</section>
<div class="login">
    <div class="container">
    	<div class="row">
            <div class="col-md-6 offset-md-3 form-div login">
                <form action="login.php" method="post">
                <h2 class="text-center">Login</h2><hr>
                <?php if(count($errors)>0): ?>
                    <div class="aler alert-danger">
                        <?php foreach($errors as $error):?>
                        <li><?php echo $error;?></li>
                        <?php endforeach;?>
                    </div>
                <?php endif; ?>

            <div class="form-group">
                <label for="username">Username Or Email:</label>
                <input type="text" name="username" value="<?php echo  $username; ?>" class="form-control form-control-lg" placeholder="Enter Username/Email">
            </div>

            <div class="form-group">
            
                <label for="password">Password:</label>
                <input type="password" name="password"   class="form-control form-control-lg pwd" placeholder="********">
                <input type="checkbox" onclick="myFunction()">Show Password

            </div>

            <div class="form-group">
                <button type="submit" name="login-btn" class="btn btn-primary btn-lg" style="margin:auto;display:block">Login</button>

            </div>
            <?php
            if(isset($_GET["newpwd"]))
            {
                if($_GET["newpwd"]==="passwordupdated")
                {
                    echo '<p class="signupsuccess">Your password has been reset!</p>';
                }
            }
            ?>
            <p align="center"><a href="fpass.php" >Forgot Password</a></p>
            <h4>OR</h4>
            <p class="Content" style="font-size:16px; text-align:center">Not yet registered?<a href="signup.php"> Sign Up</a></p>
            </form>
            </div>
        </div>
    </div>
</div>
<script>
function myFunction() {
    var $pwd = $(".pwd");
    if ($pwd.attr('type') === 'password') {
        $pwd.attr('type', 'text');
    } else {
        $pwd.attr('type', 'password');
    }
}
</script>
</body>
</html>