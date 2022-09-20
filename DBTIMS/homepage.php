
 
 <div class="col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="fa fas note"></span> Dashboard</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-6">
                          Welcome to DBTIMS 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
        <div id="mainmain">


<?php if($_SESSION['role']=='admin')
{?>
<a href="dbtims.php?id=homepage"><i class="fas fa-home icon-2x"></i><br> Home</a>               
<a href="dbtims.php?id=employee"><i class="fas fa-users icon-2x"></i><br> Employees</a>               
<a href="dbtims.php?id=traffic_police"><i class="fas fa-users icon-2x"></i><br> Traffic police</a>               
<a href="dbtims.php?id=tpa"><i class="fas fa-users icon-2x"></i><br> Traffic Police Admin</a>               
<a href="dbtims.php?id=drivers"><i class="fas fa-users icon-2x"></i><br> Drivers</a>               
<a href="dbtims.php?id=generate_report"><i class="fas fa-sticky-note icon-2x"></i><br> Reports</a>               
<a style="color:red;" href="logout.php"><font-color="red"><i style="color:red" class="fas fa-lock icon-2x"></i></font><br> Logout</a> 

<?php }
else if($_SESSION['role']=='employee')
{
    ?>
<a href="dbtims.php?id=homepage"><i class="fas fa-home icon-2x"></i><br> Home</a>                         
<a href="dbtims.php?id=drivers"><i class="fas fa-users icon-2x"></i><br> Drivers</a>               
<a href="dbtims.php?id=userProfile"><i class="fas fa-user icon-2x"></i><br> Profile</a>               
<a style="color:red;" href="logout.php"><font-color="red"><i style="color:red" class="fas fa-lock icon-2x"></i></font><br> Logout</a> 

<?php
} 
else if($_SESSION['role']=='tpa')
{?>
<a href="dbtims.php?id=homepage"><i class="fas fa-home icon-2x"></i><br> Home</a>                         
<a href="dbtims.php?id=traffic_police"><i class="fas fa-users icon-2x"></i><br> Traffic police</a>              
<a href="dbtims.php?id=accident"><i class="fas fa-car-crash icon-2x"></i><br> Accident</a>              
<a href="dbtims.php?id=punishment"><i class="fas fa-sticky-note icon-2x"></i><br> Punishment</a>              
<a href="dbtims.php?id=userProfile"><i class="fas fa-user icon-2x"></i><br> Profile</a>               
<a style="color:red;" href="logout.php"><font-color="red"><i style="color:red" class="fas fa-lock icon-2x"></i></font><br> Logout</a> 

<?php } ?>

</div>