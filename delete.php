<?php
         include("session.php");


$conn = mysqli_connect("mysql5018.smarterasp.net", "a1943a_mams",'swe434105435', "db_a1943a_mams");
	// Check connection
	if (! $conn)
		die ( "Failed to connect to MySQL: " . mysqli_connect_error () );
		
 $id = $_POST['id'];



$query = "DELETE FROM emp WHERE emp_id='$id'" ;

$result =  mysqli_query($conn, $query);
 $_SESSION['m_recorded']="yes";
		header ( "Location:viewEmp.php" );


         
     
         
           ?>
           
           
           
         




