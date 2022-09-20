<?php include 'config.php'; ?>
<?php function allDriver(){ 
    $id='driver';
    
    include "config.php";
    ?>
<a class = "newButton" href= "dbtims.php?action=register&role=driver">
                <i class= "fa fa plus"> New <?php echo $id; ?></i>
                </a> 
               
<div class="driver">
                
                    <div class="allDriver">
                    <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                    
                                        
                                        <th scope="col">License number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">F.Name</th>
                                        
                                        <th scope="col">Sex</th>
                                        <th scope="col">Birth Date</th>
                                        
                                        <th scope="col">Plate number</th>
                                        <th scope="col">Registration_dat</th>
                                        <th scope="col">License Exp. date</th>
                                        <th scope="col">Address</th>
                                        
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        
                                        
                                        
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                        $getDriver = "SELECT * FROM drivers";
                                            $result = mysqli_query( $connection, $getDriver );

                                        while ( $driver = mysqli_fetch_assoc( $result ) ) {
                                            $user=$driver['license_no'];
                                            $stat=$driver['status'];
                                            $bool=$stat?'class="fas fa-check-circle" ':'class="fas fa-minus-circle" style="color:red"';
                                            ?>
                                        <tr>
                                            
                                            
                                            <td><?php printf( "%s", $driver['license_no'] );?></td>
                                            <td><?php printf( "%s", $driver['fname'] );?></td>
                                            <td><?php printf( "%s", $driver['lname'] );?></td>
                                           
                                            <td><?php printf( "%s", $driver['sex'] );?></td>
                                            <td><?php printf( "%s", $driver['birth_date'] );?></td>
                                            
                                            
                                            <td><?php printf( "%s", $driver['plateNumber'] );?></td>
                                            <td><?php printf( "%s", $driver['registration_date'] );?></td>
                                            <td><?php printf( "%s", $driver['license_ex_date'] );?></td>
                                            
                                            <td><?php printf( "%s", $driver['address'] );?></td>
                                            <td><?php printf( "%s", $driver['email'] );?></td>
                                            <td><?php printf( "%s", $driver['phone'] );?></td>
                                           <?php $sessionRole = $_SESSION['role'] ?? '';
                                           if($sessionRole=='admin')
                                        {?>
                                            <td><?php printf( "<a href='dbtims.php?action=edit&role={$id}&license_no=%s'><i class='fas fa-edit'></i></a>", $user )?></td>
                                            <td><?php printf( "<a class='delete' href='dbtims.php?action=delete&role={$id}&license_no=%s'><i class='fas fa-trash'></i></a>", $user )?></td>
                                            <td><?php printf( "<a class='onoff' href='dbtims.php?action=onoff&role={$id}&license_no=%s'><i $bool'></i></a>", $user )?></td>                                      
                                              <?php }?>                            
                                                                                       
                                            
                                            
                                        </tr>

                                   <?php } ?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }?>
<?php function user($id) {
    
    if($id=='vehicle'){     
    ?>
           
    <div class="<?php echo $id; ?>">
                
                
                <a class = "newButton" href= "dbtims.php?action=register&role=<?php echo $id; ?>">
                <i class= "fa fa plus"> New <?php echo $id; ?></i>
                </a>  
                    <div class="all<?php echo $id; ?>">
                        <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        
                                        <th scope="col">Vehicle Plate NO</th>
                                        <th scope="col">Made in</th>
                                        <th scope="col">Model number</th>                                        
                                        <th scope="col">Owner Name</th>                                                                                  
                                        <th scope="col">Name</th>
                                        <th scope="col">Chanse No</th>

                                        <th scope="col">Manufacured Date</th>                                                                                  
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include 'config.php';
                                        $get = "SELECT * FROM {$id}s";
                                            $result = mysqli_query( $connection, $get);

                                        while ( $user = mysqli_fetch_assoc( $result ) ) {
                                            
                                            ?>

                                        <tr>
                                            
                                            <td><?php printf( "%s", $user['plateNumber'] );?></td>
                                            
                                            <td><?php printf( "%s", $user['made_in'] );?></td>
                                            <td><?php printf( "%s", $user['model'] );?></td>                                            
                                            <td><?php printf( "%s", $user['owner_name'] );?></td>
                                            <td><?php printf( "%s", $user['name'] );?></td>
                                            <td><?php printf( "%s", $user['shanse_no'] );?></td>
                                            <td><?php printf( "%s", $user['manufacture_date'] );?></td>
                                                                                
                                                <td><?php printf( "<a href='dbtims.php?action=edit&role={$id}&plateNumber=%s'><i class='fas fa-edit'></i></a>", $user['plateNumber'] )?></td>
                                                <td><?php printf( "<a class='delete' href='dbtims.php?action=delete&role={$id}&plateNumber=%s'><i class='fas fa-trash'></i></a>", $user['plateNumber'] )?></td>
                                            
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                                    
                    <?php }
    else if($id=='accident'){     
    ?>
           
    <div class="<?php echo $id; ?>">          
                
 
                    <div class="all<?php echo $id; ?>">
                        <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        
                                        <th scope="col">Accident_ID</th>
                                        <th scope="col">License_no</th>
                                        <th scope="col">PlateNumber</th>                                        
                                        <th scope="col">Account Date</th>                                                                                  
                                        <th scope="col">Street_no</th>
                                        <th scope="col">Accident type</th>

                                        <th scope="col">Cause</th>                                                                                  
                                        <th scope="col">Traffic_police_id</th>                                                                                  
                                      
                                            
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include 'config.php';
                                        $get = "SELECT * FROM accident";
                                            $result = mysqli_query( $connection, $get);

                                        while ( $user = mysqli_fetch_assoc( $result ) ) {
                                            
                                            ?>

                                        <tr>
                                            
                                            <td><?php printf( "%s", $user['Accident_ID'] );?></td>
                                            
                                            <td><?php printf( "%s", $user['license_no'] );?></td>
                                            <td><?php printf( "%s", $user['plateNumber'] );?></td>                                            
                                            <td><?php printf( "%s", $user['acc_date'] );?></td>
                                            <td><?php printf( "%s", $user['street_no'] );?></td>
                                            <td><?php printf( "%s", $user['acc_type'] );?></td>
                                            <td><?php printf( "%s", $user['cause'] );?></td>
                                            <td><?php printf( "%s", $user['tp_id'] );?></td>
                                                                                
                                                
                                            
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                                    
                    <?php }
    else if($id=='punishment'){     
    ?>
           
    <div class="<?php echo $id; ?>">          
                
 
                    <div class="all<?php echo $id; ?>">
                        <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        
                                        <th scope="col">Punish_ID</th>
                                        <th scope="col">License_no</th>
                                        <th scope="col">PlateNumber</th>                                        
                                                                                                                          
                                        <th scope="col">Street_no</th>
                                        

                                        <th scope="col">Reason</th>                                                                                  
                                        <th scope="col">punish_date</th>                                                                                  
                                        <th scope="col">Traffic_police_id</th>                                                                                  
                                        <th scope="col">Amount</th>                                                                                  
                                        <th scope="col">Payment status</th>                                                                                  
                                      
                                            
                                        
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include 'config.php';
                                        $get = "SELECT * FROM punishment";
                                            $result = mysqli_query( $connection, $get);

                                        while ( $user = mysqli_fetch_assoc( $result ) ) {
                                            
                                            ?>

                                        <tr>
                                            
                                            <td><?php printf( "%s", $user['punish_id'] );?></td>
                                            
                                            <td><?php printf( "%s", $user['license_no'] );?></td>
                                            <td><?php printf( "%s", $user['plate_no'] );?></td>                                            
                                            <td><?php printf( "%s", $user['street_no'] );?></td>
                                            <td><?php printf( "%s", $user['Reason'] );?></td>
                                            <td><?php printf( "%s", $user['punish_date'] );?></td>
                                            <td><?php printf( "%s", $user['tp_id'] );?></td>
                                            <td><?php printf( "%s", $user['amount'] );?></td>
                                          
                                            <td><?php echo $user["paid"]?"Paid":"Unpaid";?></td>                                    
                                                
                                            
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                                    
                    <?php }
                    
                    
                    else{ ?>
                <div class="<?php echo $id; ?>">
                <?php
                if(($id=="driver"&&$_SESSION['role']=="employee")||($id=="traffic_police"&&$_SESSION['role']=="tpa")||($id=="tpa"&&$_SESSION['role']=="admin")||($id=="employee"&&$_SESSION['role']=="admin")){?>
                <a class = "newButton" href= "dbtims.php?action=register&role=<?php echo $id; ?>">
                <i class= "fa fa plus"> New <?php echo $id; ?></i>
                </a>  <?php } ?>
                    <div class="all<?php echo $id; ?>">
                        <div class="main__table">
                        <table id = "table" class = "table table-bordered">
                                <thead>
                                    <tr>
                                        
                                        <th scope="col"><?php echo $id; ?> ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <?php
                                        if($id=='traffic_police')
                                        {?>
                                        <th scope="col">Appelation</th>
                                        
                                        <?php
                                        }
                                        ?>
                                        <?php
                                        if($id=='traffic_police')
                                        {?>
                                        <th scope="col">Allocation</th>
                                        
                                        <?php
                                        }
                                        ?>
                                        <th scope="col">Address</th>
                                        <?php 
                                        $sessionRole = $_SESSION['role'] ?? '';
                                        if($sessionRole=='admin') {?>                           
                                            <th scope="col">Edit</th>
                                            <th scope="col">Delete</th>
                                            <th scope="col">Status</th>
                                        <?php }?>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    include 'config.php';
                                        $get = "SELECT * FROM {$id}s";
                                            $result = mysqli_query( $connection, $get);

                                        while ( $user = mysqli_fetch_assoc( $result ) ) {
                                            $stat=$user['status'];
                                            $bool=$stat?'class="fas fa-check-circle" ':'class="fas fa-minus-circle" style="color:red"';
                                            ?>

                                        <tr>
                                            
                                            <td><?php printf( "%s", $user[$id.'_id'] );?></td>
                                            <td><?php printf( "%s %s", $user['fname'], $user['lname'] );?></td>
                                            <td><?php printf( "%s", $user['email'] );?></td>
                                            <td><?php printf( "%s", $user['phone'] );?></td>
                                            <?php if($id=='traffic_police')
                                        {?>
                                            <td><?php printf( "%s", $user['appelation'] );?></td>
                                            
                                        <?php
                                        }
                                        ?>
                                            <?php if($id=='traffic_police')
                                        {?>
                                            <td><?php printf( "%s", $user['allocation'] );?><?php if($_SESSION['role']=='tpa')printf( "<a href='dbtims.php?alloc=1&action=edit&role={$id}&{$id}_id=%s'><i style='margin-left:15px;' class='fas fa-map-marker'></i></a>", $user[$id.'_id'] );?></td>
                                            
                                        <?php
                                        }
                                        ?>
                                        <td><?php printf( "%s", $user['address'] );?></td>
                                        <?php 
                                        $sessionRole = $_SESSION['role'] ?? '';
                                        if($sessionRole=='admin') {?>
                                                <td><?php printf( "<a href='dbtims.php?action=edit&role={$id}&{$id}_id=%s'><i class='fas fa-edit'></i></a>", $user[$id.'_id'] )?></td>
                                                <td><?php printf( "<a class='delete' href='dbtims.php?action=delete&role={$id}&{$id}_id=%s'><i color=\"red\"class='fas fa-trash'></i></a>", $user[$id.'_id'] )?></td>
                                                <td><?php printf( "<a class='onoff' href='dbtims.php?action=onoff&role={$id}&{$id}_id=%s'><i $bool></i></a>", $user[$id.'_id'] )?></td>
                                        <?php } ?>
                                        </tr>

                                    <?php }?>

                                </tbody>
                            </table>


                        </div>
                    </div>
                <?php }
            }?>

                <?php function register($id) {
                    if($id=='vehicle'){
                    ?>
                    <div class="add<?php echo $id; ?>">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New <?php echo $id; ?></div>
                            <form onSubmit= "return validateform()"  action="add.php?action=add&role=<?php echo $id; ?>" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            Plate Number
                                            <input type="text" name="plate_no" placeholder="Plate Number" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Made In
                                            <input type="text" name="made_in" placeholder="Made in" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Model
                                            <input type="text" name="model" placeholder="Model" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Owner Name
                                            <input type="text" name="owner_name" placeholder="Owner Name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            manufacture_date
                                            <input type="date" name="man_dt" value="" required> 
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Chanse Number
                                            <input type="text" name="shanse_no" placeholder="Chanse_no" value="" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Name
                                            <input type="text" name="name" placeholder="Car Name" value="" required>
                                        </label>
                                    </div>
                                                                       
                                    <input type="hidden" name="action" value="add<?php echo $id; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <?php }else if($id=='driver'){
                    ?>
                    <div class="add<?php echo $id; ?>">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New <?php echo $id; ?></div>
                            <form onSubmit= "return validateform()"  action="add.php?action=add&role=<?php echo $id; ?>" method="POST">
                                <div class="form-row">
                                <div class="col col-12">
                                        <label class="input">
                                            License number
                                            <input type="text" name="license_no" placeholder="license_no"  required>
                                        </label>
                                    </div>    
                                <div class="col col-12">
                                        <label class="input">
                                            First name:
                                            <input type="text" name="fname" placeholder="First name"  required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Last name
                                            <input type="text" name="lname" placeholder="Last Name"  required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Email
                                            <input type="email" name="email" placeholder="Email"  required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Phone
                                            <input type="number" name="phone" placeholder="Phone"  required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Sex
                                            <div class="gender-details">
                   
                   <select name="gender" placeholder="" required>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    
                </select>
                                        </label>
                                    </div>
                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Plate Number
                                            <input type="text" name="plateNumber" placeholder="Plate"  required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Level
                                            <div class="gender-details">
                   
                   <select name="level" placeholder="" required>
                    <option value="1(auto)">Auto</option>
                    <option value="2(people 1)">People 1</option>
                    <option value="3(people 2)">People 2</option>
                    <option value="3(Dry 1)">Dry 1</option>
                    <option value="4(Dry 2)">Dry 2</option>
                    
                </select>
                                        </label>
                                    </div>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Address
                                            <input type="text" name="address" placeholder="address"  required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Registration date
                                            <input type="datetime-local" name="r_dt" >
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Birth Date
                                            <input type="date" name="birth_dt" >
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Password
                                            <input id="pwdinput" type="password" name="password" placeholder="Password" required>
                                            <i id="pwd" class="fas fa-eye right"></i>
                                        </label>
                                    
                                                                       
                                    <input type="hidden" name="action" value="add<?php echo $id; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <?php }else{ ?>
                    <div class="add<?php echo $id; ?>">
                        <div class="main__form">
                            <div class="main__form--title text-center">Add New <?php echo $id; ?></div>
                            <form onSubmit= "return validateform()"  action="add.php?action=add&role=<?php echo $id; ?>" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            ID
                                            <input type="text" name="<?php echo $id; ?>_id" placeholder="<?php echo $id; ?> ID" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            First Name
                                            <input type="text" name="fname" placeholder="First name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Last Name
                                            <input type="text" name="lname" placeholder="Last Name" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Sex
                                            <div class="gender-details">
                   
                   <select name="gender" placeholder="" required>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    
                </select>
                                        </label>
                                    </div>
                    </div>
                    <div class="col col-12">
                                        <label class="input">
                                            Birth Date
                                            <input type="date" name="birth_dt" value="">
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Address
                                            <input type="address" name="address" placeholder="Address" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Email
                                            <input type="email" name="email" placeholder="Email" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Phone no
                                            <input type="number" name="phone" placeholder="Phone" required>
                                        </label>
                                    </div>
                                    <?php if($id=='traffic_police'){?>
                                    <div class="col col-12">
                                        <label class="input">
                                            Appelation
                                            <input type="text" name="appelation" placeholder="Appelation" required>
                                        </label>
                                    </div>
                                    <?php }?>
                                    <?php if($id=='traffic_police'){?>
                                    <div class="col col-12">
                                        <label class="input">
                                            Allocation
                                            <input type="text" name="allocation" placeholder="Allocation" required>
                                        </label>
                                    </div>
                                    <?php }?>

                                    <div class="col col-12">
                                        <label class="input">
                                            Password
                                            <input id="pwdinput" type="password" name="password" placeholder="Password" required>
                                            <i id="pwd" class="fas fa-eye right"></i>
                                        </label>
                                    </div>
                                    
                                    <input type="hidden" name="action" value="add<?php echo $id; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    
                <?php }}?>

                <?php function edit($id) {
                    include "config.php";
                    if($id=='vehicle')
                    {
                        $userId = $_REQUEST['plateNumber'];
                        $select = "SELECT * FROM vehicles WHERE plateNumber='{$userId}'";
                        $result = mysqli_query( $connection, $select );

                    $user = mysqli_fetch_assoc( $result );?>
                    <div class="add<?php echo $id; ?>">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update <?php echo $id; ?></div>
                            <form onSubmit= "return validateform()"  action="add.php?action=edit&role=<?php echo $id; ?>" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                    <div class="col col-12">
                                        <label class="input">
                                            Plate Number
                                            <input type="text" name="plate_no" placeholder="Plate Number" value="<?php echo $user['plateNumber']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Made In
                                            <input type="text" name="made_in" placeholder="Made in" value="<?php echo $user['made_in']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Model
                                            <input type="text" name="model" placeholder="Model" value="<?php echo $user['model']; ?>"required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Owner Name
                                            <input type="text" name="owner_name" placeholder="Owner Name" value="<?php echo $user['owner_name']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Name
                                            <input type="text" name="name" placeholder="Name" value="<?php echo $user['name']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            manufacture_date
                                            <input type="date" name="man_dt" value="<?php echo $user['manufacture_date']; ?>" required> 
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Chanse Number
                                            <input type="text" name="shanse_no" placeholder="Chanse_no" value="<?php echo $user['shanse_no']; ?>" required>
                                        </label>
                                    </div>
                                    
                                     
                                    <input type="hidden" name="action" value="edit<?php echo $id; ?>">
                                    <input type="hidden" name="<?php echo $id; ?>_id" value="<?php echo $userId; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   <?php }
                    else if($id=='driver'){
                        $userId = $_REQUEST['license_no'];
                        $select = "SELECT * FROM drivers WHERE license_no='{$userId}'";
                        $result = mysqli_query( $connection, $select );

                    $user = mysqli_fetch_assoc( $result );
                    ?>
                    <div class="add<?php echo $id; ?>">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update <?php echo $id; ?></div>
                            <form onSubmit= "return validateform()"  action="add.php?action=edit&role=<?php echo $id; ?>" method="POST">
                                <div class="form-row">
                                <div class="col col-12">
                                        <label class="input">
                                            License number
                                            <input type="text" name="license_no" placeholder="license_no" value="<?php echo $user['license_no']; ?>" required>
                                        </label>
                                    </div>    
                                <div class="col col-12">
                                        <label class="input">
                                            First name:
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $user['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Last name
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $user['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Email
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Phone
                                            <input type="number" name="phone" placeholder="Phone" value="<?php echo $user['phone']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Sex
                                            <div class="gender-details">
                   
                   <select name="gender" placeholder="" required>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    
                </select>
                                        </label>
                                    </div>
                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Plate Number
                                            <input type="text" name="plateNumber" placeholder="Plate" value="<?php echo $user['plateNumber']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Level
                                            <div class="gender-details">
                   
                   <select name="level" placeholder="" required>
                    <option value="1(auto)">Auto</option>
                    <option value="2(people 1)">People 1</option>
                    <option value="3(people 2)">People 2</option>
                    <option value="3(Dry 1)">Dry 1</option>
                    <option value="4(Dry 2)">Dry 1</option>
                    
                </select>
                                        </label>
                                    </div>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Address
                                            <input type="text" name="address" placeholder="address" value="<?php echo $user['address']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Registration date
                                            <input type="datetime-local" name="r_dt" value="<?php echo $user['registration_date']; ?>">
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            License Ex. Date
                                            <input type="datetime-local" name="x_dt" value="<?php echo $user['license_ex_date']; ?>">
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Birth Date
                                            <input type="date" name="birth_dt" value="<?php echo $user['birth_date']; ?>">
                                        </label>
                                    </div>
                                    <input type="hidden" name="action" value="edit<?php echo $id; ?>">
                                    <input type="hidden" name="<?php echo $id; ?>_id" value="<?php echo $userId; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }
                    else{
                        
                        $userId = $_REQUEST[$id.'_id'];
                        $select = "SELECT * FROM {$id}s WHERE {$id}_id='{$userId}'";
                        $result = mysqli_query( $connection, $select );

                    $user = mysqli_fetch_assoc( $result );
                    if(isset($_REQUEST['alloc']))
                    {?>
                      <div class="add<?php echo $id; ?>">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update Traffic Police allocation for <?php echo $user['fname'] ?></div>
                            <form onSubmit= "return validateform()"  action="add.php?action=edit&role=<?php echo $id; ?>&alloc=1" method="POST">
                                <div class="form-row">
                                   
                                <div class="col col-12">
                                        <label class="input">
                                            Allocation:
                                            <input type="text" name="alloc" placeholder="Allocation" value="<?php echo $user['allocation']; ?>" required>
                                        </label>
                                    </div>
                                    
                                    <input type="hidden" name="action" value="edit<?php echo $id; ?>">
                                    <input type="hidden" name="<?php echo $id; ?>_id" value="<?php echo $userId; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>  
                    <?php }
                    else if(!isset($_REQUEST['alloc'])){ ?>
                    <div class="add<?php echo $id; ?>">
                        <div class="main__form">
                            <div class="main__form--title text-center">Update <?php echo $id; ?></div>
                            <form onSubmit= "return validateform()"  action="add.php?action=edit&role=<?php echo $id; ?>" method="POST">
                                <div class="form-row">
                                    <div class="col col-12">
                                        <label class="input">
                                            First name:
                                            <input type="text" name="fname" placeholder="First name" value="<?php echo $user['fname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Last name
                                            <input type="text" name="lname" placeholder="Last Name" value="<?php echo $user['lname']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Sex
                                            <div class="gender-details">
                   
                   <select name="gender" placeholder="" required>
                    <option value="m">Male</option>
                    <option value="f">Female</option>
                    
                </select>
                                        </label>
                                    </div>
                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Birth Date
                                            <input type="date" name="birth_dt" value="<?php echo $user['birth_date']; ?>">
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Email
                                            <input type="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Phone
                                            <input type="number" name="phone" placeholder="Phone" value="<?php echo $user['phone']; ?>" required>
                                        </label>
                                    </div>
                                    <div class="col col-12">
                                        <label class="input">
                                            Address
                                            <input type="text" name="address" placeholder="address"  value="<?php echo $user['address']; ?>"required>
                                        </label>
                                        <?php if($id=='traffic_police'){?>
                                    <div class="col col-12">
                                        <label class="input">
                                            Appelation
                                            <input type="text" name="appelation" placeholder="Appelation" value="<?php echo $user['appelation']; ?>" required>
                                        </label>
                                    </div>
                                    <?php }?>
                                        
                                    </div>
                                    <input type="hidden" name="action" value="edit<?php echo $id; ?>">
                                    <input type="hidden" name="<?php echo $id; ?>_id" value="<?php echo $userId; ?>">
                                    <div class="col col-12">
                                        <input type="submit" value="Update">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php }}
            } ?>

                <?php function delete( $id ) {
                        include "config.php";
                        echo($id);
                        if($id=='vehicle')
                        {
                           $userId = $_REQUEST['plateNumber']; 
                           $column='plateNumber';
                        }
                        else if($id=='driver')
                        {
                           $userId = $_REQUEST['license_no']; 
                           $column='license_no';
                        }
                        else{
                        $userId = $_REQUEST[$id.'_id'];
                        $column=$id."_id";
                            }
                        $deleteUser = "DELETE FROM {$id}s WHERE $column ='{$userId}'";
                        echo $deleteUser;
                        $result = mysqli_query( $connection, $deleteUser );
                        header( "location:dbtims.php?id={$id}" );
                }?>
                <?php function onoff( $id ) {
                        include "config.php";
                        if($id=='driver'){
                              $userID = $_REQUEST['license_no'];
                              $column='license_no';
                        }
                        else if($id=='vehicle'){
                            $userID = $_REQUEST[$id.'_id'];
                            $column='license_no';
                        }
                        else {
                            $userID = $_REQUEST[$id.'_id'];
                            $column="{$id}_id";
                        }
                        
                        
                        $deleteUser = "select status FROM {$id}s WHERE $column ='{$userID}'";
                        echo $deleteUser;
                        $result = mysqli_query( $connection, $deleteUser );
                        $user = mysqli_fetch_assoc( $result );
                        $stat=$user['status'];
                        $bool=$stat?0:1;
                            $query = "UPDATE {$id}s SET status={$bool} WHERE $column='$userID'";
                            echo $query;
                            mysqli_query( $connection, $query );                          
                        
                       header( "location:dbtims.php?id={$id}" );
                }?>
            </div>
            <!-- ---------------------- user ------------------------ -->

            <script src="assets/js/script.js"></script>