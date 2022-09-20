<?php
    session_start();
    $sessionId = $_SESSION['id'] ?? '';
    $sessionRole = $_SESSION['role'] ?? '';
    if ( $sessionId && $sessionRole ) {
        header( "location:dbtims.php" );
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
    <title>Contact</title>
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
						
						<li class="active"><a href="contact.php">contact</a></li>
						<li><a href="about_us.html">About</a></li>
						<li ><a class="active" href="./dbtims.php">Login</a></li>
						
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
            
            <div class="main__form" style="background-color:#b3b7b7;margin-top:5%"><div style="width:100%;"><h1 style="text-align:center;font-size:30px;font-family:Verdana ">Contact us</h1>&nbsp<h1>leave your email and message below...<h1></div>
                <div class="main__form--title text-center">Log In</div>
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="col col-12">
                            <label class="input" style="display:inline-block">
                              
                                <input type="text" style="width:160%" name="email" placeholder="Email" required>
                            </label>
                        </div>
                        <div class="col col-12">
                            <label class="input" style="display:inline-block">
                              
                                <textarea style="width:120%" name = "message" style="margin-top:25px" placeholder="Your comment goes here..." class="input" cols="40" rows="10"  required></textarea>
                            </label>
                        </div>
                        
                        <div class="col col-12">
                        <input type="submit" name="submit" value="Send">
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
      <p text-align="center">2021 | DBTIMS</p>
    </footer>

    <!-- Optional JavaScript -->
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Custom Js -->
    <script src="./assets/js/app.js"></script>
</body>

</html>
  
<?php
       if(isset($_POST["submit"]))
       {

        include_once "config.php";
    
        $message = $_REQUEST['message'] ?? '';
       
       $sessionEmail = $_REQUEST['email'] ?? '';
               
               $now=date('d-m-y h:i:s');
               $query = "INSERT INTO messages(sender,message,date) VALUES ('{$sessionEmail}','{$message}','{$now}')";
               
                   mysqli_query( $connection, $query ) or die(mysqli_error($connection));
                   echo "<script type=\"text/javascript\">
                   alert(\"Thank you for your feedback\"); 
                   window.location = \"index.html\";
         </script>";
       }
       
       ?>