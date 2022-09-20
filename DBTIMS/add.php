<?php
session_start();
include "config.php";


$action = $_GET['action'] ?? '';
if($action=='edit')
    {
        
        edit($_REQUEST['role']);
    }
else if($action=='add')
{
    add($_REQUEST['role']);
}   
else if($action=='updateprofile')
{
    updateProfile($_REQUEST['role']);
}   
 
    function add($id) {
        if($id=='vehicle'){
        var_dump($_REQUEST);
        include "config.php";
        $plate_no=$_REQUEST['plate_no'] ?? '';
        $made_in = $_REQUEST['made_in'] ?? '';
        $model = $_REQUEST['model'] ?? '';
        $owner_name = $_REQUEST['owner_name'] ?? '';
        $name=$_REQUEST['name'] ?? '';
        $shanse_no=$_REQUEST['shanse_no'] ?? '';
        $manufacutre_date=$_REQUEST['man_dt'] ?? '';
       if ($plate_no && $made_in && $model && $owner_name) {
            echo "hello";
            $query = "INSERT INTO {$id}s(plateNumber,made_in,model,owner_name,name,manufacture_date,shanse_no) VALUES ('$plate_no','{$made_in}','$model','$owner_name','$name','$manufacutre_date','$shanse_no')";
            mysqli_query( $connection, $query ) or die(mysqli_error($connection));
            echo $query;
            header( "location:dbtims.php?id={$id}" );
        }
    
    
    }
        else if($id=='driver'){
        include "config.php";
        $userId = $_REQUEST["license_no"] ?? '';
            $fname = $_REQUEST['fname'] ?? '';
            $lname = $_REQUEST['lname'] ?? '';
            $email = $_REQUEST['email'] ?? '';
            $phone = $_REQUEST['phone'] ?? '';
            $gender = $_REQUEST['gender'] ?? '';
            $plateNumber = $_REQUEST['plateNumber'] ?? '';
            $level = $_REQUEST['level'] ?? '';
            $address = $_REQUEST['address'] ?? '';
            $registration_date = $_REQUEST['r_dt'] ?? '';            
            $license_ex_date =  date("Y-m-d H:i:00", strtotime($registration_date."+5 year"));
            $birth_date = $_REQUEST['birth_dt'] ?? '';
            $password = $_REQUEST['password'] ?? '';
       if ($userId) {
            $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
            $query = "INSERT INTO {$id}s(license_no,sex,registration_date,license_ex_date,birth_date,plateNumber,level,address,fname,lname,email,phone,password) 
            VALUES ('{$userId}','{$gender}','{$registration_date}','{$license_ex_date}',
            '{$birth_date}','{$plateNumber}','{$level}','{$address}','{$fname}','{$lname}','$email','$phone','$hashPassword')";
            mysqli_query( $connection, $query );
            echo $query;
            header( "location:dbtims.php?id={$id}" );
        }
    
    
    }
        else{ 
        $user_id=$_REQUEST[$id.'_id'];
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $address = $_REQUEST['address'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $gender = $_REQUEST['gender'] ?? '';
        $birth_date = $_REQUEST['birth_dt'] ?? '';
        $id=='traffic_police'?$app=$_REQUEST['appelation']:$app='';      
        $id=='traffic_police'?$alloc=$_REQUEST['allocation']:$alloc='';      

      
         $password = $_REQUEST['password'] ?? '';
         $hashPassword = password_hash( $password, PASSWORD_BCRYPT );
        include "config.php";
        if ($user_id && $fname && $lname && $lname && $phone && $password && $address ) {
            
            $id=='traffic_police'?
            $query = "INSERT INTO {$id}s({$id}_id,fname,lname,email,phone,address,password,role,sex,birth_date,appelation,allocation) VALUES ('$user_id','{$fname}','$lname','$email','$phone','$address','$hashPassword','{$id}','$gender','$birth_date','$app','$alloc')"
            :$query = "INSERT INTO {$id}s({$id}_id,fname,lname,email,phone,address,password,role,sex,birth_date) VALUES ('$user_id','{$fname}','$lname','$email','$phone','$address','$hashPassword','{$id}','$gender','$birth_date')";
            mysqli_query( $connection, $query ) or die;
            
           header( "location:dbtims.php?id={$id}" );
            }
         }
    } 
    function edit($id) {
        include "config.php";
        if($_REQUEST['role']=='vehicle')
        {
        $plateNumber=$_REQUEST['plate_no'] ?? '';
        $made_in = $_REQUEST['made_in'] ?? '';
        $model = $_REQUEST['model'] ?? '';
        $owner_name = $_REQUEST['owner_name'] ?? '';
        $name=$_REQUEST['name'] ?? '';
        $shanse_no=$_REQUEST['shanse_no'] ?? '';    
        $man_dt=$_REQUEST['man_dt'] ?? '';    
            if ( $plateNumber && $made_in && $model && $owner_name ) {
                $query = "UPDATE vehicles SET plateNumber='{$plateNumber}', made_in='{$made_in}', 
                model='$model', owner_name='$owner_name' , name='$name', shanse_no='$shanse_no',
                manufacture_date='$man_dt' WHERE plateNumber='{$plateNumber}'";
                echo $query;
                mysqli_query( $connection, $query ) or die(mysqli_error($connection));
                echo $query;
            header( "location:dbtims.php?id={$id}" );
            }
        }
        else if($_REQUEST['role']=='driver'){
            var_dump($_REQUEST);
            $userId = $_REQUEST["license_no"] ?? '';
            $fname = $_REQUEST['fname'] ?? '';
            $lname = $_REQUEST['lname'] ?? '';
            $email = $_REQUEST['email'] ?? '';
            $phone = $_REQUEST['phone'] ?? '';
            $gender = $_REQUEST['gender'] ?? '';
            $plateNumber = $_REQUEST['plateNumber'] ?? '';
            $level = $_REQUEST['level'] ?? '';
            $address = $_REQUEST['address'] ?? '';
            $registration_date = $_REQUEST['r_dt'] ?? '';
            $license_ex_date = $_REQUEST['x_dt'] ?? '';
            $birth_date = $_REQUEST['birth_dt'] ?? '';
            
            if ( $fname && $lname && $email && $phone ) {
                $query = "UPDATE {$id}s SET sex='{$gender}', registration_date='{$registration_date}', license_ex_date='{$license_ex_date}', birth_date='{$birth_date}', plateNumber='{$plateNumber}', level='{$level}', address='{$address}', fname='{$fname}', lname='{$lname}', email='$email', phone='$phone' WHERE license_no='{$userId}'";
                mysqli_query( $connection, $query );
                echo $query;
            header( "location:dbtims.php?id=driver" );
            
            }
        }
        else{
            $userId = $_REQUEST[$id.'_id'] ?? '';
            if(isset($_REQUEST['alloc']))
            {
                $alloc = $_REQUEST['alloc'] ?? '';
                $query = "UPDATE {$id}s SET allocation='$alloc' WHERE {$id}_id='{$userId}'";
                mysqli_query( $connection, $query );
                echo $query;
                 header( "location:dbtims.php?id={$id}" );
            }
            else{
            
            $fname = $_REQUEST['fname'] ?? '';
            $lname = $_REQUEST['lname'] ?? '';
            $email = $_REQUEST['email'] ?? '';
            $phone = $_REQUEST['phone'] ?? '';
            $gender = $_REQUEST['gender'] ?? '';
            $birth_date = $_REQUEST['birth_dt'] ?? '';
            $id=='traffic_police'?$app=$_REQUEST['appelation']:$app='';
            
            if ( $fname && $lname && $email && $phone ) {
                $id=='traffic_police'?
                $query = "UPDATE {$id}s SET fname='{$fname}', lname='{$lname}', email='$email', phone='$phone',sex='$gender', birth_date='$birth_date', appelation='$app' WHERE {$id}_id='{$userId}'"
            :$query = "UPDATE {$id}s SET fname='{$fname}', lname='{$lname}', email='$email', phone='$phone',sex='$gender', birth_date='$birth_date' WHERE {$id}_id='{$userId}'";
                
                mysqli_query( $connection, $query );
                echo $query;
            header( "location:dbtims.php?id={$id}" );
            }
        }
        }
    } 
        
        
       
    function updateProfile() {
        include "config.php";
        $fname = $_REQUEST['fname'] ?? '';
        $lname = $_REQUEST['lname'] ?? '';
        $email = $_REQUEST['email'] ?? '';
        $phone = $_REQUEST['phone'] ?? '';
        $oldPassword = $_REQUEST['oldPassword'] ?? '';
        $newPassword = $_REQUEST['newPassword'] ?? '';
        $sessionId = $_SESSION['id'] ?? '';
        $sessionRole = $_SESSION['role'] ?? '';
        $avatar = $_FILES['avatar']['name'] ?? "";
        

        if ( $fname && $lname && $email && $phone && $oldPassword && $newPassword ) {
            $query = "SELECT password,avatar FROM {$sessionRole}s Where {$sessionRole}_id='$sessionId'";
            $result = mysqli_query( $connection, $query );

            if ( $data = mysqli_fetch_assoc( $result ) ) {
                $_password = $data['password'];
                $_avatar = $data['avatar'];
                $avatarName = '';
                if ( $_FILES['avatar']['name'] !== "" ) {
                    $allowType = array(
                        'image/png',
                        'image/jpg',
                        'image/jpeg'
                    );
                    if ( in_array( $_FILES['avatar']['type'], $allowType ) !== false ) {
                        $avatarName = $_FILES['avatar']['name'];
                        $avatarTmpName = $_FILES['avatar']['tmp_name'];
                        move_uploaded_file( $avatarTmpName, "assets/img/$avatar" );
                    } else {
                        header( "location:dbtims.php?id=userProfileEdit&avatarError" );
                        return;
                    }
                } else {
                    $avatarName = $_avatar;
                }
                if ( password_verify( $oldPassword, $_password ) ) {
                    $hashPassword = password_hash( $newPassword, PASSWORD_BCRYPT );
                    $updateQuery = "UPDATE {$sessionRole}s SET fname='{$fname}', lname='{$lname}', email='{$email}', phone='{$phone}', password='{$hashPassword}', avatar='{$avatarName}' Where {$sessionRole}_id='{$sessionId}'";
                    mysqli_query( $connection, $updateQuery );

                    header( "location:dbtims.php?id=userProfile" );
                }
                else{
                    header("location:dbtims.php?id=userProfileEdit&error=password");
                }

            }

        } else {
            echo mysqli_error( $connection );
        }

    }
    

