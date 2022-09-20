<?php
session_start();
include_once "config.php";
$connection = mysqli_connect( DB_HOST, DB_USER, DB_PASSWORD, DB_NAME );
if ( !$connection ) {
    echo mysqli_error( $connection );
    throw new Exception( "Database cannot Connect" );
} else {
//$lea_id=$_SESSION['login_stud_id']; 
$name = $_POST["name"];
$fname = $_POST["name"];
$gfname = $_POST["name"];
$region = $_POST["name"];
$zone = $_POST["name"];
$religion = $_POST["name"];
$town = $_POST["name"];
$photo = $_POST["name"];
$group_members= $_POST["member1"].",".$_POST["member2"].",".$_POST["member3"].",".$_POST["member4"].",".$_POST["member5"].",";
$file = $_POST["file_name"];
$now=date('d-m-y h:i:s');

$conn->query("INSERT INTO submissions (group_name,members_list,title_file,tsubmission_date) VALUES ('$group_name','$group_members','$file','$now')");
foreach(range(1,5) as $i)
$conn->query("INSERT INTO groupmembers (stud_id,stud_name,leader_id) VALUES ('".$_POST['member'.$i.'id']."','".$_POST['member'.$i]."','".$lea_id."')");

    } 
