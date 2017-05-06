<?php
session_start();
$conn = mysqli_connect("mysql5018.smarterasp.net", "a1943a_mams",'swe434105435', "db_a1943a_mams");
	// Check connection
	if (! $conn)
		die ( "Failed to connect to MySQL: " . mysqli_connect_error () );
$username    = $_POST['username'];
$password = $_POST['password'];


$query = "SELECT * FROM `emp` WHERE `username`='$username' AND `password`='$password'";

$result =  mysqli_query($conn, $query);
if ($result) {
	//if(true){
    if (mysqli_num_rows($result) == 1) {
    $user               = mysqli_fetch_assoc($result);
        $_SESSION['ID']       = $user['emp_id'];
        $_SESSION['username']       = $user['username'];
        $_SESSION['usertype'] = $user['userType'];
        if($_SESSION['usertype']=='admin'){
        header ( "Location:adminpage.php" );
        }
        else
        header ( "Location:homepage.php" );
        if(isset($_SESSION['wrong'])){
        unset($_SESSION['wrong']);
        }
        
    }else{
    $_SESSION['wrong']="yes";
     header ( "Location:signin.php" );
    }
    }
    	
?>

