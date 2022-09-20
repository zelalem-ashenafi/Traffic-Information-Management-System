<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

/* .container2{
  
}
.container2 .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container2 .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
} */

#left.fas{
    color:grey;
}
.fas{
    color:black;
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
  height: 45px;
  width: 100%;
  outline: none;
  font-size: 16px;
  border-radius: 5px;
  padding-left: 15px;
  border: 1px solid #ccc;
  border-bottom-width: 2px;
  transition: all 0.3s ease;
}
.user-details .input-box input:focus,
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one
 #dot-2:checked ~ .category label .two
{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
   height: 100%;
   width: 100%;
   border-radius: 5px;
   border: none;
   color: #fff;
   font-size: 18px;
   font-weight: 500;
   letter-spacing: 1px;
   cursor: pointer;
   transition: all 0.3s ease;
   background: linear-gradient(135deg, #71b7e6, #9b59b6);
 }
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  width: 70%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
}

<style>
    #mainmain {
	margin: 50px auto;
	text-align: center;
	width: 980px;

}
#mainmain a {
	text-decoration: none;
	padding-top:15px;
	padding-bottom:5px;
	padding-left:15px;
	padding-right:15px;
	border-radius:10px;
	margin:10px;
	box-shadow:0 5px 5px 2px #484848;
	-moz-box-shadow:0 5px 5px 2px #484848;
	-webkit-box-shadow:0 5px 5px 2px #484848;
	border:1px solid #000;
	background: #fff;
	color: #222222;
	font-size:20px;
	display: inline-block;
	width: 265px;
	height: 85px;
	text-align: center;
	margin-bottom: 5px;
}
</style>
<?php
    session_start();
    $sessionId = $_SESSION['id'] ?? '';
    $sessionRole = $_SESSION['role'] ?? '';
    
    if ( !$sessionId && !$sessionRole ) {
        header( "location:login.php" );
        die();
    }

    ob_start();

    include "config.php";
    

    
    $id = $_REQUEST['id'] ?? 'DBTIMS';
    
    $action = $_REQUEST['action'] ?? '';
    $getrole = $_REQUEST['role'] ?? '';
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1024">

    
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel = "stylesheet" type = "text/css" href = "./css/bootstrap.css" />
		<link rel = "stylesheet" type = "text/css" href = "./css/style.css" />
		<link rel = "stylesheet" type = "text/css" href = "./css/jquery-ui.css" />
		<link rel = "stylesheet" type = "text/css" href = "./css/jquery.dataTables.css" />
    	<meta charset = "UTF-8" />

		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		
	
    <title><?php echo $_REQUEST['id'] ?? 'DBTIMS'; ?></title>
</head>

<body>
    <!--------------------------------- Secondary Navber -------------------------------->
    <section class="topber">
    <div class="topber__logo"><img style="height:40px;" src="./assets/img/logo.png"></img></div>  
        <div class="topber__title">
            <span class="topber__title--text">
                <?php
                    if ( 'homepage' == $id ) {
                        echo "DBTIMS";
                    } elseif ( 'employee' == $id ) {
                        echo "Employee";
                    } elseif ( 'driver' == $id ) {
                        echo "Drivers";
                    }elseif ( 'tpa' == $id ) {
                        echo "TPA";
                    }elseif ( 'admin' == $id ) {
                        echo "Admin";
                    }elseif ( 'traffic_police' == $id ) {
                        echo "Traffic Police";
                    }elseif ( 'accident' == $id ) {
                        echo "Accidents";
                    }elseif ( 'punishment' == $id ) {
                        echo "Punishments";
                    }
                     
                    
                ?>

            </span>
        </div>

        <div class="topber__profile">
            <?php
                $query = "SELECT fname,lname,role,avatar FROM {$sessionRole}s WHERE {$sessionRole}_id='$sessionId'";
                
                $result = mysqli_query( $connection, $query );

                if ( $data = mysqli_fetch_assoc( $result ) ) {
                    $fname = $data['fname'];
                    $lname = $data['lname'];
                    $role = $data['role'];
                    $avatar = $data['avatar'];
                ?>
                
                <div class="dropdown">
                    <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php
                        echo "$fname $lname (" . ucwords( $role ) . " )";
                        }
                    ?>
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="dbtims.php?id=homepage">homepage</a>
                        <a class="dropdown-item" href="dbtims.php?id=userProfile">Profile</a>
                        <a class="dropdown-item" href="logout.php">Log Out</a>
                    </div>
                </div>
        </div>
    </section>
    <!--------------------------------- Secondary Navber -------------------------------->


    <!--------------------------------- Sideber -------------------------------->
    <section id="sideber" class="sideber">
        <ul class="sideber__ber">
            
        
            
            <?php if($sessionRole!='driver'){?>
            <a href="dbtims.php?id=homepage"><li id="left" class="sideber__item<?php if ( 'homepage' == $id ) {
                                                  echo " active";
                                              }?>">
                <i id="left" class="fas fa-tachometer-alt"></i>Home Page
            </li></a>
            <?php } ?>
            <?php if ( 'admin' == $sessionRole ) {?>

                
                <a href="dbtims.php?id=employee"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'employee' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-user-plus"></i></i>Employees
                </li></a>
                <a href="dbtims.php?id=traffic_police"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'traffic_police' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-user-plus"></i></i>Traffic Police
                </li></a>
                <a href="dbtims.php?id=tpa"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'tpa' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-user-plus"></i></i>TPA
                </li></a>
                <a href="dbtims.php?id=driver"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'driver' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-user-plus"></i></i>Drivers
                </li></a>
                <a href="dbtims.php?id=generate_report"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'generate_report' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-sticky-note"></i></i>Generate Report
                </li></a>
                
                
                
                <?php }?>
            <?php if ( 'employee' == $sessionRole ) {?>
               
                <a href="dbtims.php?id=driver"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'driver' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-user-plus"></i></i>Drivers
                </li></a>
                
                <a href="dbtims.php?id=vehicle"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'vehicle' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-user-plus"></i></i>Vehicles
                </li></a>
                
                <?php }?>
            <?php if ( 'tpa' == $sessionRole ) {?>
                                
                
                <a href="dbtims.php?id=traffic_police"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'traffic_police' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-user-plus"></i></i>Traffic Police
                </li></a>
                <a href="dbtims.php?id=accident"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'accident' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-car-crash"></i></i>Accident
                </li></a>
                <a href="dbtims.php?id=punishment"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'punishment' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-file"></i></i>Punishment
                </li></a>
                <a href="dbtims.php?id=generate_report"><li id="left" class="sideber__item sideber__item--modify<?php if ( 'generate_report' == $id ) {
                                                                            echo " active";
                                                                        }?>">
                    <i id="left" class="fas fa-user-sticky-note"></i></i>Generate Report
                </li></a>
                
                
                
                
                <?php }?>
            
            
    </section>
    <!--------------------------------- #Sideber -------------------------------->


    <!--------------------------------- Main section -------------------------------->
    <section class="main">
        <div class="container" style="width:100%">

            <!-- ---------------------- homepage ------------------------ -->
            
            <?php
            
            if($id=='homepage')
            {
                include 'homepage.php';
            }
            if ($id=='employee')
            {
                include 'accounts.php';
                user('employee');
            }
            else if($id=='tpa')
            {
                include 'accounts.php';
                user('tpa');
            }
            else if($id=='traffic_police')
            {
                include 'accounts.php';
                user('traffic_police');
            }
            else if($id=='driver')
            {
                include 'accounts.php';
                allDriver();
            }
            else if($id=='vehicle')
            {
                include 'accounts.php';
                user('vehicle');
            }
            else if($id=='accident')
            {
                include 'accounts.php';
                user('accident');
            }
            else if($id=='punishment')
            {
                include 'accounts.php';
                user('punishment');
            }
            else if($id=='generate_report')
            {
                include 'generate_report.php';
                
            }
            else if($action=='edit')
            {

                include 'accounts.php';
                edit($getrole);
            }
            else if($action=='delete')
            {

                include 'accounts.php';
                delete($getrole);
            }
            else if($action=='register')
            {

                include 'accounts.php';
                register($getrole);
            }
            else if($action=='onoff')
            {

                include 'accounts.php';
                onoff($getrole);
            }
            
            
            
            ?>
                
                

            <!-- ---------------------- User Profile ------------------------ -->
            <?php if ( 'userProfile' == $id ) {
                    $query = "SELECT * FROM {$sessionRole}s WHERE {$sessionRole}_id='$sessionId'";
                    $result = mysqli_query( $connection, $query );
                    $data = mysqli_fetch_assoc( $result )
                ?>
                <div class="userProfile">
                    <div class="main__form myProfile">
                        <form onSubmit= "return validateform()" action="dbtims.php?id=homepage">
                            <div class="main__form--title myProfile__title text-center">My Profile</div>
                            <div class="form-row text-center">
                                <div class="col col-12 text-center pb-3">
                                    <img src="assets/img/<?php echo $data['avatar']; ?>" class="img-fluid rounded-circle" alt="">
                                </div>
                                <div class="col col-12">
                                    <h4><b>Full Name : </b><?php printf( "%s %s", $data['fname'], $data['lname'] );?></h4>
                                </div>
                                <div class="col col-12">
                                    <h4><b>Email : </b><?php printf( "%s", $data['email'] );?></h4>
                                </div>
                                <div class="col col-12">
                                    <h4><b>Phone : </b><?php printf( "%s", $data['phone'] );?></h4>
                                </div>
                                <input type="hidden" name="id" value="userProfileEdit">
                                <div class="col col-12">
                                    <input class="updateMyProfile" type="submit" value="Update Profile">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>

            <?php if ( 'userProfileEdit' == $id ) {
                    $query = "SELECT * FROM {$sessionRole}s WHERE {$sessionRole}_id='$sessionId'";
                    $result = mysqli_query( $connection, $query );
                    $data = mysqli_fetch_assoc( $result )
                ?>


                <div class="userProfileEdit">
                    <div class="main__form">
                        <div class="main__form--title text-center">Update My Profile</div>
                        <form onSubmit= "return validateform()"  enctype="multipart/form-data" action="add.php?action=updateprofile&role=<?php echo $_SESSION['role']; ?>" method="POST">
                            <div class="form-row">
                                <div class="col col-12 text-center pb-3">
                                    <img id="pimg" src="assets/img/<?php echo $data['avatar']; ?>" class="img-fluid rounded-circle" alt="">
                                    <i class="fas fa-pen pimgedit"></i>
                                    <input onchange="document.getElementById('pimg').src = window.URL.createObjectURL(this.files[0])" id="pimgi" style="display: none;" type="file" name="avatar">
                                </div>
                                <div class="col col-12">
                                <?php if ( isset( $_REQUEST['avatarError'] ) ) {
                                            echo "<p style='color:red;' class='text-center'>Please make sure this file is jpg, png or jpeg</p>";
                                    }?>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-user-circle"></i>
                                        <input type="text" name="fname" placeholder="First name" value="<?php echo $data['fname']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-user-circle"></i>
                                        <input type="text" name="lname" placeholder="Last Name" value="<?php echo $data['lname']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-envelope"></i>
                                        <input type="email" name="email" placeholder="Email" value="<?php echo $data['email']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-phone-alt"></i>
                                        <input type="number" name="phone" placeholder="Phone" value="<?php echo $data['phone']; ?>" required>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-key"></i>
                                        <input id="pwdinput" type="password" name="oldPassword" placeholder="Old Password" required>
                                        <i id="pwd" class="fas fa-eye right"></i>
                                    </label>
                                </div>
                                <div class="col col-12">
                                    <label class="input">
                                        <i id="left" class="fas fa-key"></i>
                                        <input id="pwdinput" type="password" name="newPassword" placeholder="New Password" required>
                                        <?php $error= $_GET['error']??" ";
                                        if($error=='password'){?>
                                        
                                        <p>Wrong Old Password!!!</p>
                                        <?php } else{?>
                                         <p>Type Old Password if you don't want to change</p>
                                         <?php }?>
                                        <i id="pwd" class="fas fa-eye right"></i>
                                    </label>
                                </div>
                                <input type="hidden" name="action" value="updateProfile">
                                <div class="col col-12">
                                    <input type="submit" value="Update">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php }?>
            <!-- ---------------------- User Profile ------------------------ -->

        </div>

    </section>

    <!--------------------------------- #Main section -------------------------------->



    <!-- Optional JavaScript -->
    <script src = "./js/jquery-3.1.1.js"></script>
<script src = "./js/sidebar.js"></script>
<script src = "./js/bootstrap.js"></script>
<script src = "./js/jquery.dataTables.min.js"></script>
<script src = "./js/script.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#table').DataTable();
	});
</script>
</body>

</html>