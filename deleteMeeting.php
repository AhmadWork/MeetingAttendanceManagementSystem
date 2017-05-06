
<?php
session_start();?>
<?php
$conn = mysqli_connect("mysql5018.smarterasp.net", "a1943a_mams",'swe434105435', "db_a1943a_mams");
	// Check connection
	if (! $conn)
		die ( "Failed to connect to MySQL: " . mysqli_connect_error () );
		
 $id = $_POST['idMeeting'];
$result = mysqli_query($conn, "DELETE FROM `meetings` WHERE `meetings`.`meeting_id` = $id ");

 $_SESSION['m_recorded']="yes";
		header ( "Location:myMeeting.php" );

 ?>
           
           
           
         




