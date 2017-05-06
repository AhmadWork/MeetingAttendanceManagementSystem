<?php
include('session.php');
require_once 'swiftmailer-5.x/lib/swift_required.php';
$conn = mysqli_connect("mysql5018.smarterasp.net", "a1943a_mams",'swe434105435', "db_a1943a_mams");
	// Check connection
	if (! $conn)
		die ( "Failed to connect to MySQL: " . mysqli_connect_error () );
$ids = $_GET['idM'];
$post_mdate = $_GET['mdate'];
$post_time =  $_GET['time'];
$post_duration =  $_GET['du'];
$post_location =  $_GET['loc'];
$op=mysqli_query($conn," SELECT * FROM `attandee`  WHERE meetingid= $ids " );
while($row = mysqli_fetch_array($op)) {
$op2=mysqli_query($conn," SELECT * FROM `emp`  WHERE emp_id= $row[email] " );
echo 'inside while';
$row2=mysqli_fetch_assoc($op2);






$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, "ssl")
  ->setUsername('meetingattendancesystem@gmail.com')
  ->setPassword('swe434105435')
  ;
// Create the Mailer using your created Transport
$mailer = Swift_Mailer::newInstance($transport);
echo $row2[email];
// Create a message
$message = Swift_Message::newInstance('Meeting Updated !')
  ->setFrom(array('meetingattendancesystem@gmail.com' => 'MeetingAttendanceSystem'))
  ->setTo(array($row2[email] => 'A name'))
  ->setBody("Dear ".$row2[name]. "\n  Meeting NO#  ".$ids." \n has been updated \n updated Meeting Info: \n Date".$post_mdate."  Time :".$post_time."  Duration : ".$post_duration." Location : ".$post_location."\n Have a good meeting \n Regards");

// Send the message
$result = $mailer->send($message);

	}
$query = "UPDATE meetings SET mdate = '$post_mdate',time = '$post_time',duration = '$post_duration' ,location = '$post_location'
WHERE meeting_id = $ids ";
$result = mysqli_query($conn,$query);


$_SESSION['me_recorded']="yes";
 header("Location:myMeeting.php");


 ?>
           
           
           
         









