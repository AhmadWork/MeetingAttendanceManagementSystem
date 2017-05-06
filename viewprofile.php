<!DOCTYPE html>
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
                <a class="navbar-brand topnav" href=index.html>MEETING ATTENDANCE MANAGEMENT</a>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="viewprofile.php" ><?php echo $_SESSION['username']; ?> </a>
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
                           <h3>My Profile</h3>
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
                       
           <?php

$conn = mysqli_connect("mysql5018.smarterasp.net", "a1943a_mams",'swe434105435', "db_a1943a_mams");
    // Check connection
    if (! $conn)
        die ( "Failed to connect to MySQL: " . mysqli_connect_error () );



$username=$_SESSION['username'];
$result3 = mysqli_query($conn," SELECT * FROM emp WHERE username='$username' " );
while($row = mysqli_fetch_array($result3))
{ 
$name=$row['name'];
$email=$row['email'];

$userType=$row['userType'];
}

?>
                        </div>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
       <form >
<h4 style="color: #42a4f4">Name</h4>
  <label  class="button" name="mdate" id="mdate" placeholder=><?php echo $name; ?></label>
  <br>
<h4 style="color: #42a4f4">UserName</h4>
<label  class="button" name="time" id="time" placeholder=><?php echo $username; ?></label>
  <br>
<h4 style="color: #42a4f4">Email</h4>
  <label  class="button" name="duration" id="duration" placeholder=><?php echo $email; ?></label>
  <br>
<h4 style="color: #42a4f4">User Type</h4>
  <label  class="button" name="location" id="location" placeholder=><?php echo $userType; ?></label>
  <br>

  <br>
            
</form> 
    <!-- /.intro-header -->

    <!-- Page Content -->


    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>










