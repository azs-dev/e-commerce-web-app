<?php
  include 'includes/autoloader.inc.php';
  session_start();
  if (isset($_SESSION['m_id'])) {
    header("Location:pages/merchant/home.merchant.php?");
  }
  elseif (isset($_SESSION['c_id'])) {
    header("Location: pages/customer/home.customer.php?");
  }
?>

<!DOCTYPE html>
<html>
<head>
	<title>aziz's project.</title>
	<link rel="icon" type="image/png" href="images/logo.png"/> <!-- logo -->
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css"> <!-- bootstrap's css -->
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script> <!-- bootstrap's js -->
	<link rel="stylesheet" type="text/css" href="css/style.css"> <!-- my own css -->

</head>
<body style = "background-color: #f8f9fc">
	<div class="leftnav" id="leftnav">
		<div class="main-text" id="main-text">
            <h2>DOST Project.</h2>
            <p>Practical Examination of Abdulaziz Somandar.</p>
    </div>

    <form action="includes/signup.inc.php" method="post">
    <div class="container aziz-container" id="signupcontainer">
      <h3 style="color:white;">SIGN UP</h3>
    <div class="form-group signup-form">
      <div class="form-group">
        <input type="text" class="form-control col-md" name="name" placeholder="Name" required>
      </div>
      <div class="form-group">
        <input type="email" class="form-control col-md" name="email" placeholder="Email" required>
      </div>
      </div>
      <div class="form-row mt-3">
        <div class="col">
        <input type="text" class="form-control col-md" name="username" placeholder="Username" required>
      </div>
        <div class="col">
        <input type="password" class="form-control col-md" name="password" placeholder="Password" required>
      </div>
      </div>
      <div class="form-group mt-3">
        <select class="form-control" name='role' required>
          <option value="" selected>I am a...</option>
          <option value='1'>Merchant</option>
          <option value='0'>Customer</option>
        </select>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" class="btn btn-outline-light" style="transition: 0.5s;">Submit</button>
      </div>
    </div>
  </form>
  </div>

</div>
  	<div class="rightnav" id="rightnav">
  		<form action="includes/login.inc.php" method="POST">
  			<div class="form-group">
    			<label>USERNAME</label>
    			<input type="text" class="form-control col-sm-5" name="username" id="username" placeholder="Username" required="required">
  			</div>
  			<div class="form-group">
    			<label>PASSWORD</label>
    			<input type="Password" class="form-control col-sm-5" name="password" id="password" placeholder="Password" required="required">
 			</div>
 			<button type="submit" class="btn btn-outline-dark">LOG IN</button>
 			<button type="button" onclick= "onClick()" class="btn btn-outline-warning ml-3">REGISTER</button>
  		</form>
      <?php
      $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

      if (strpos($fullUrl, "noaccess") == true) {
        echo "<p class='failed'>You have no access to this page!</p>";
      } elseif (strpos($fullUrl, "invalidpwd") == true) {
        echo "<p class='failed'>Invalid Password!</p>";
      } elseif (strpos($fullUrl, "notregistered") == true) {
        echo "<p class='failed'>Not Registered!</p>";
      } elseif (strpos($fullUrl, "usernameexists") == true) {
        echo "<p class='failed'>Username already exists!</p>";
      } elseif (strpos($fullUrl, "success") == true) {
        echo "<p class='success'>Registration Success!</p>";
      }

      ?>
  	</div>

</body>

<script>

function onClick() {
  document.getElementById("rightnav").style.width = "40%";
  document.getElementById("leftnav").style.width = "60%";
  document.getElementById("main-text").style.marginTop = "10%";

  document.getElementById("signupcontainer").style.maxWidth = "600px";
  document.getElementById("signupcontainer").style.marginLeft = "13%";

}
</script>

</html>
