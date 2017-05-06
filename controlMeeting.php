<?php
session_start();?>
<?php
$conn = mysqli_connect("mysql5018.smarterasp.net", "a1943a_mams",'swe434105435', "db_a1943a_mams");
	// Check connection
	if (! $conn)
		die ( "Failed to connect to MySQL: " . mysqli_connect_error () );
$post_mdate = $_POST['mdate'];
$post_time =  $_POST['time'];
$post_duration =  $_POST['duration'];
$post_location =  $_POST['location'];
$employee=$_POST['employee'];

$username=$_SESSION['username'];

$op=mysqli_query($conn," SELECT * FROM emp WHERE username='$username' " );
$row=mysqli_fetch_assoc($op);
$chairmanId=$row['emp_id'];

if($post_mdate=='' || $post_time=='' || $post_duration=='' || $post_location=='' || empty($employee)){
$_SESSION['unfilled']="yes";
header ( "Location:CreateM.php" );
}else{
$query = "INSERT INTO meetings VALUES( '' ,'$post_mdate','$post_time','$post_duration','$post_location','$chairmanId')" ;
$result =  mysqli_query($conn, $query);
$last_id = $conn->insert_id;
foreach($employee as $value) {

$op2=mysqli_query($conn," SELECT * FROM emp WHERE emp_id= $value " );
	$row2=mysqli_fetch_assoc($op2);


require_once 'swiftmailer-5.x/lib/swift_required.php';



$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('meetingattendancesystem@gmail.com')
  ->setPassword('swe434105435')
  ;
// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);

// Create a message
$message = Swift_Message::newInstance('New meeting info')
  ->setFrom(array('meetingattendancesystem@gmail.com' => 'MeetingAttendanceSystem'))
  ->setTo(array($row2[email] => 'A name'))
  ->setBody("Dear ".$row2[name]. "\n you have been added to  Meeting  by:  ".$row[name]." \n Meeting Info: \n Date: ".$post_mdate." , Time :".$post_time."  , Duration: ".$post_duration.",  Location: ".$post_location."\n Have a good meeting \n Regards");

// Send the message
$result = $mailer->send($message);


$query2="INSERT INTO `attandee` VALUES ('$last_id', '$value')";
$result2 =  mysqli_query($conn, $query2);
}

		$_SESSION['m_recorded']="yes";
		header ( "Location:CreateM.php" );


}

?>






















