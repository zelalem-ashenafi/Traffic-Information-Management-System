<?php
header('Content-type: application/json');   
if(isset($_GET['action']))
{
    if($_GET['action']=="select")
    {
        
        $query=urldecode($_GET['query']);
        
        select($query);
    }
}
if(isset($_GET['action']))
{
    if($_GET['action']=="login")
    {
    $email=$_GET['email'];
    $password=$_GET['password'];
    login($email,$password);
        
        
        
    }
}
if(isset($_GET['action']))
{
    if($_GET['action']=="insert")
    {
        $query=urldecode($_GET['query']);
        
        insert($query);
        
        
        
        
        
    }
    if($_GET['action']=="update"){
        $query=urldecode($_GET['query']);
        update($query);
    }
    if($_GET['action']=="checkPayment"){
        $id=urldecode($_GET['id']);
        checkPayment($id);
    }
}
if(isset($_GET['action']))
{
    if($_GET['action']=="forget")
    {
        $old=$_GET["old"];
        $new=$_GET["new"];
        $role=$_GET["role"];
        $id=$_GET["id"];
        
        
        forget($old,$new,$role,$id);
        
        
        
        
        
    }
}
function select($query)
{
    
    $i=0;
    $arr=array();
    include 'config.php';
    $result = mysqli_query( $connection, $query );
    if(mysqli_num_rows($result)>0)
    {
        $arr['found']=1;
        while ( $row = mysqli_fetch_assoc( $result ) ) {
        
        foreach($row as $field=> $value)
        {
            $arr["{$field}#{$i}"]=$value;
        }
        
        header('Content-type: application/json');
        
        
        $i++; 
    }
    }
    else{
        $arr['found']=0;
    }
    
    $json=json_encode($arr,JSON_FORCE_OBJECT);   
    echo ($json);
    return $json;
}
function insert($query)
{
    include 'config.php';
    
    mysqli_query( $connection, $query );
    $arr['successful']=1;
    header('Content-type: application/json');
    $json=json_encode($arr,JSON_FORCE_OBJECT);
    echo $json;
    return $json;
    }
function edit($query)
{
    include 'config.php';
    
    mysqli_query( $connection, $query ) or die(mysqli_error($connection));
}
function login($email,$password)
{
    $arr=array();
    include 'config.php';
    $query = "SELECT * FROM traffic_polices WHERE email='{$email}' and status=1";
    
    $result = mysqli_query( $connection, $query ) or die (mysqli_error($connection));
        
        if ( $data = mysqli_fetch_assoc($result) ) {
           // echo'if email found';

            $_passsword = $data['password'] ?? '';
            $_email = $data['email'] ?? '';
            $_role = $data['role'] ?? '';
            $_id = $data['traffic_police_id'] ?? '';
            $_fname=$data['fname'] ?? '';
                    $_lname=$data['lname'] ?? '';
                    $_phone=$data['phone'] ?? '';
                    $_birth_date=$data['birth_date'] ?? '';
                    $_allocation=$data['allocation'] ?? '';
                    
            
            if ( password_verify( $password, $_passsword ) ) {
              //  echo'if password is correctt';
                $arr['found']=1;
                $arr['email']=$_email;
                $arr['role'] = $_role;
                $arr['id'] = $_id;
                $arr['fname'] = $_fname;
                        $arr['lname'] = $_lname;
                        $arr['phone'] = $_phone;
                        $arr['birth_date'] = $_birth_date;
                        $arr['location'] = $_allocation;
                header('Content-type: application/json');
                $json=json_encode($arr,JSON_FORCE_OBJECT);
                echo($json);
                return $json;
                
            }
            else{
                //echo'if traffic password is incorrect check driver';
                $query = "SELECT * FROM drivers WHERE email='{$email}' and status=1";
    $result = mysqli_query( $connection, $query ) or die (mysqli_error($connection));
                if ( $data = mysqli_fetch_assoc($result) ) {
            
                    $_passsword = $data['password'] ?? '';
                    $_email = $data['email'] ?? '';
                    $_role = $data['role'] ?? '';
                    $_id = $data[$_role.'_id'] ?? '';
                    
                    
                    if ( password_verify( $password, $_passsword ) ) {
                       // echo'if driver password is correct';
                        $arr['found']=1;
                        $arr['email']=$_email;
                        $arr['role'] = $_role;
                        $arr['id'] = $_id;
                        $arr['fname'] = $_fname;
                        $arr['lname'] = $_lname;
                        $arr['phone'] = $_phone;
                        $arr['birth_date'] = $_birth_date;
                        $arr['exp_date'] = $_birth_date;
                        $json=json_encode($arr,JSON_FORCE_OBJECT);
                        echo $json;
                        return $json;
                        
                    }
                    else{
                     //   echo'if driver password is incorrect';
                    $arr['found']=0;
                    $json=json_encode($arr,JSON_FORCE_OBJECT);
                    echo $json;
                    return $json;
                    
                    
                    }
                } else {
                    //if no driver found
                    $arr['found']=0;
                    $json=json_encode($arr,JSON_FORCE_OBJECT);
                    echo $json;
                    return $json;
                    
                }
            
            }
        } else {
            //echo'if no traffic found';
            $query = "SELECT * FROM drivers WHERE email='{$email}' and status=1";
            
    $result = mysqli_query( $connection, $query ) or die (mysqli_error($connection));
            if ( $data = mysqli_fetch_assoc($result) ) {
                //echo "driver found";
                $_passsword = $data['password'] ?? '';
            $_email = $data['email'] ?? '';
            $_role = "driver" ?? '';
            $_id = $data['license_no'] ?? '';
            $_fname=$data['fname'] ?? '';
                    $_lname=$data['lname'] ?? '';
                    $_phone=$data['phone'] ?? '';
                    $_birth_date=$data['birth_date'] ?? '';
                    $_exp_date=$data['license_ex_date'] ?? '';
                    $_charge=$data['charge'] ?? '';
            
            if ( password_verify( $password, $_passsword ) && checkPayment($_id) ) {
                    
                $arr['found']=1;
                $arr['email']=$_email;
                $arr['role'] = $_role;
                $arr['id'] = $_id;
                $arr['fname'] = $_fname;
                        $arr['lname'] = $_lname;
                        $arr['phone'] = $_phone;
                        $arr['birth_date'] = $_birth_date;
                        $arr['exp_date'] = $_exp_date;
                        $arr['charge'] = $_charge;
                    $json=json_encode($arr,JSON_FORCE_OBJECT);
                    echo $json;
                    return $json;
                    
                }
                else{
                    $arr['found']=0;
                    $json=json_encode($arr,JSON_FORCE_OBJECT);
                    echo $json;
                    return $json;
                    
                
                }
            } else {
                $arr['found']=0;
                    $json=json_encode($arr,JSON_FORCE_OBJECT);
                    echo $json;
                    return $json;
                    
            }
        }
}
function forget($old,$new,$role,$id)
{
    if($role=="driver")
    $column="license_no";
    else if($role=="traffic_police")
    $column="traffic_police_id";
    $arr=array();
    include 'config.php';
    $query = "SELECT password FROM {$role}s Where $column='$id'";
     //    echo $query;
    $result = mysqli_query( $connection, $query ) or die(mysqli_error($connection));
    
            if ( $data = mysqli_fetch_assoc( $result ) ) { 
                $_password = $data['password'];
                if ( password_verify( $old, $_password ) ) {
            $hashPassword = password_hash( $new, PASSWORD_BCRYPT );
            $updateQuery = "UPDATE {$role}s SET password='{$hashPassword}' Where $column='{$id}'";
            
            mysqli_query( $connection, $updateQuery );
            
            $arr['successful']=1;

            
            $json=json_encode($arr,JSON_FORCE_OBJECT);
            echo $json;
            
            return $json;
            }
            else{
                $arr['successful']=0;

            
        $json=json_encode($arr,JSON_FORCE_OBJECT);  
        echo $json;
            return $json;
            }
            
    

        
    }
    else{
        $arr['successful']=0;

            
        $json=json_encode($arr,JSON_FORCE_OBJECT);  
        echo $json;
            return $json;
            }
}
function update($query){
    include 'config.php';
    mysqli_query( $connection, $query );
    $arr['successful']=1;
    header('Content-type: application/json');
    $json=json_encode($arr,JSON_FORCE_OBJECT);
    echo $json;
    return $json;

}
function checkPayment($_id){
                    include 'config.php';
                    $query2 = "select * from punishment where DATEDIFF(now(),punish_date) > 14 and license_no='$_id' and paid=0";
                    //echo $query2;
                    $result2 = mysqli_query( $connection, $query2 ) or die (mysqli_error($connection));
                    if(mysqli_num_rows($result2)>0)
                    {
                        $query3 = "update drivers set status=b'0' where license_no='$_id'";
                        $result3 = mysqli_query( $connection, $query3 ) or die (mysqli_error($connection));
                        //echo 'punishment expired and turned off';
                        return false;
                        
                    }
                    else
                    {
                        //echo 'punishment not expired';
                        return true;

                    }
                }              


?>