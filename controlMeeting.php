<?php
session_start();?>
<?php
$conn = mysqli_connect("id885231_mams", "id885231_root",'swe2017', "mams");
	// Check connection
	if (! $conn)
		die ( "Failed to connect to MySQL: " . mysqli_connect_error () );
$post_mdate = $_POST['mdate'];
$post_time =  $_POST['time'];
$post_duration =  $_POST['duration'];
$post_location =  $_POST['location'];
$employee=$_POST['employee'];
if($post_mdate=='' || $post_time=='' || $post_duration=='' || $post_location=='' || empty($employee)){
$_SESSION['unfilled']="yes";
header ( "Location:CreateM.php" );
}else{
$query = "INSERT INTO meetings VALUES( '' ,'$post_mdate','$post_time','$post_duration','$post_location')" ;
$result =  mysqli_query($conn, $query);
$last_id = $conn->insert_id;
foreach($employee as $value) {
$query2="INSERT INTO `attandee` VALUES ('$last_id', '$value')";
$result2 =  mysqli_query($conn, $query2);
}

		$_SESSION['m_recorded']="yes";
		header ( "Location:CreateM.php" );
}

?>