<?php
    session_start();
    $sessionId = $_SESSION['id'] ?? '';
    $sessionRole = $_SESSION['role'] ?? '';
    if ( $sessionId && $sessionRole ) {
        header( "location:dbtims.php?id=homepage" );
        die();
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="assets/css/style2.css" rel="stylesheet" type="text/css"  media="all" />
    <title>Login</title>
</head>

<body>
<div style="background-color:#181D29" class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.html" ><img style="height: 50px;" src="assets/img/logo.png"></img></a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li ><a href="index.html">Home</a></li>
						
						<li><a href="contact.php">contact</a></li>
						<li><a href="about_us.html">About</a></li>
						<li class="active" ><a class="active" href="./dbtims.php?id=homepage">Login</a></li>
						
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
    <!--------------------------------- Main section -------------------------------->
    
    <section class="main">
        <div class="container">
        <div class="both">
            <div class="login_image">
                <img src="assets/img/logo.png"></img>
            </div>
            <div class="main__form">
                <div class="main__form--title text-center">Log In</div>
                <form action="login_core.php" method="GET">
                    <div class="form-row">
                        <div class="col col-12">
                            <label class="input">
                                
                                <input type="text" name="email" placeholder="Email" required>
                            </label>
                        </div>
                        <div class="col col-12">
                            <label class="input">
                                
                                <input id="pwdinput" type="password" name="password" placeholder="Password" required>
                                <i id="pwd" class="fas fa-eye right"></i>
                            </label>
                        </div>
                        <div class="col col-12">
                            <label class="input">
                                
                                <select name="role" id="Role">
                                    <option value="admins">Admin</option>
                                    <option value="employees">employee</option>
                                    <option value="tpas">tpa</option>
                                    
                                    
                                </select>
                            </label>
                        </div>
                            <input type="hidden" name="action" value="login">
                            <?php if ( isset( $_REQUEST['error'] ) ) {
                                    echo "<h5 class='text-center' style='color:red;'>Email, Password & Role Doesn't match Or Your account is deactivated</h5>";
                            }?>
                        <div class="col col-12">
                        <input type="submit" value="LOG IN">
                        </div>
                    </div>
                </form>
            </div>
                        </div>
        </div>
    </section>

    <!--------------------------------- #Main section -------------------------------->
    <footer>
      <div class="footer">
        <div class="wrap">
       <div class="footer-left">
           <ul>
          <li><a href="index.html">Home</a></li>
          <li><a href="contact.php">contact</a></li>
          <li><a href="about_us.html">About</a></li>
          <li><a href="Login.html">Login</a></li>
        </ul>
       </div>
<br/>
      <p>2021 | DBTIMS</p>
    </footer>


    <!-- Optional JavaScript -->
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom Js -->
    <script src="./assets/js/app.js"></script>
</body>

</html>
