<?php

include("session.php");
?>
<html lang="en">

<head>

    <style>
        .button {
            background-color: #34495E;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            opacity: 0.9;
        }

        .buttonS {
            background-color: #34495E
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }




    </style>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MEETING ATTENDANCE MANAGEMENT</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href=homepage.php>MEETING ATTENDANCE MANAGEMENT</a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a ><?php echo $_SESSION['username']; ?> </a>
                    </li>
                    <li>
                        <a ><?php echo $_SESSION['usertype']; ?> </a>
                    </li>
                    <li>
                        <a href="logout.php">log out</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
</nav>


<!-- Header -->
<a name="about"></a>
<div class="intro-header">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="intro-message">
                    <h1>MEETING ATTENDANCE MANAGEMENT</h1>

                    <style>
                        h3 {
                            text-shadow: 20px 20px black;
                        }
                        .mybox {
                            width: 150px;
                            height: 70px;
                            overflow: scroll;
                            background-color:black;
                            opacity: 0.5;
                            margin: 0 auto;
                        }
                        .sucess
                        {
                            height:50px;
                            width: 200px;
                            margin:0 auto;
                            color:green;
                        }
                        .fail
                        {
                            height:50px;
                            width: 200px;
                            margin:0 auto;
                            color:red;
                        }


                    </style>
                    <hr class="intro-divider">
                    <ul class="list-inline intro-social-buttons">
                        <div class="row">
                            <div class="col-md-12">
                                <?php
                                if(isset($_SESSION['m_recorded'])){
                                    echo "<p style='color:green' >the meeting has been deleted successfully</p>";
                                    unset($_SESSION['m_recorded']);
                                }
                                ?>
                            </div>
                        </div>

<?php
$conn = mysqli_connect("mysql5018.smarterasp.net", "a1943a_mams",'swe434105435', "db_a1943a_mams");
	// Check connection
	if (! $conn)
		die ( "Failed to connect to MySQL: " . mysqli_connect_error () );
		
 $id = $_POST['idMeeting'];
 $result= mysqli_query($conn,"SELECT * FROM `meetings` WHERE `meetings`.`meeting_id` = $id " );


echo "<table border='1' style='margin:auto; width: 80%;    
    background-color: #f1f1c1; color:black;'>
    <caption style='text-align: center; color: white; font-size:20px; text-shadow: 3px 3px black;text-decoration: underline;
'>Old Information</caption>	

<tr>

<th style='align:center; background-color: black; text-align: center;
    color: white;'>Meeting Date</th>
<th   style=' background-color: black; text-align: center;
    color: white;'>Time</th>
<th  style=' background-color: black; text-align: center;
    color: white;'>Duration</th>
<th style='background-color: black; text-align: center;
    color: white; align:center;'>Location</th>
</tr>";

$row = mysqli_fetch_assoc($result);


$mDate = $row ['mdate'];
$time = $row ['time'];
$du = $row ['duration'];
$loc = $row ['location'];

echo "<tr>";
echo "<td style='text-align: center'>" . $mDate . "</td>";
echo "<td style='text-align: center'>" . $time . "</td>";
echo "<td style='text-align: center'>" .  $du . "</td>";
echo "<td style='text-align: center'>" .  $loc . "</td>";
echo "</table>";


//*************************//

echo "<p style='text-align: center; color: white; font-size:20px; text-shadow: 3px 3px black;text-decoration: underline;
'>New Information</p>	";

echo "<td style='text-align: center'>" . "<div>
                     <div class=\"col-md-12\">          
       <form action=edit.php method=get>
         <input type=\"hidden\" name=\"idM\" value=$id />
  <input type=\"text\" style='color: #34495E' name=\"mdate\" id='mdate' placeholder=\"dd/mm/yyyy\" required />
  <br>
  <input type=\"text\" style='color: #34495E' name=\"time\" id='time' placeholder=\"24 hour format\"  required/>
  <br>
  <input type=\"text\" style='color: #34495E' name=\"du\" id='du' placeholder=\"Duration\" required />
  <br>
  <input type=\"text\" style='color: #34495E' name=\"loc\" id='loc' placeholder=\"Location\" required />
  <br>
  
        <input class='buttonS' type=submit>


</form>
        </div>
            </div>"
    . "</td>";

 ?>
           
           
           
         






