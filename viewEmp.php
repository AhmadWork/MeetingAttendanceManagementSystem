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

        pic {
            background-color: #34495E
            border: none;
            color: black;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
            margin-top: 100px;
            margin-bottom: 100px;
            margin-right: 150px;
            margin-left: 80px;
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
            <a class="navbar-brand topnav" href="/adminpage.php">MEETING ATTENDANCE MANAGEMENT</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
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
   <h3>Employee List</h3>
                    <style>
                        h3 {
                            text-shadow: 20px 20px black;
                        }
                    </style>
                    <hr class="intro-divider">
                    <ul class="list-inline intro-social-buttons">
 <div class="row">
    <div class="col-md-12">  
  <?php
                        if(isset($_SESSION['m_recorded'])){
                        echo "<p style='color:green' >the employee has been deleted successfully</p>";
                        unset($_SESSION['m_recorded']);
                        }
                        ?>
                        </div>
                        </div>
    <div class="row">
    <div class="col-md-12">           
 <table border='1' style='margin:auto; width: 80%;    
    background-color: #f1f1c1; color:black;'>

<tr>
<th style='align:center; background-color: black;
    color: white;'>Employee Name</th>
<th   style=' background-color: black;
    color: white;'>ID</th>
<th  style=' background-color: black;
    color: white;'>Email</th>
<th style='background-color: black;
    color: white; align:center;'>Position</th>
</tr>

 <?php
$conn = mysqli_connect("mysql5018.smarterasp.net", "a1943a_mams",'swe434105435', "db_a1943a_mams");
  // Check connection
  if (! $conn)
    die ( "Failed to connect to MySQL: " . mysqli_connect_error () );
    



  // $search = $_POST['city'];
  

    $query = "SELECT * FROM emp" ;

    $result = mysqli_query($conn,$query);
    
      while ($row = mysqli_fetch_array($result)) {

        $name = $row ['name'];
         $id = $row ['emp_id'];
        $email = $row ['email'];
        $pos = $row ['userType'];

/*
while($row = mysqli_fetch_row($result))
{
echo "<tr>".$name."<td>$name</td><td>$salary</td></tr>\n";
}

*/
 
echo "<tr>";
echo "<td>" .$name . "</td>";
echo "<td>" . $id . "</td>";
echo "<td>" . $email . "</td>";
echo "<td>" .  $pos . "</td>";
echo "</tr>";
     

      }


?>
</table>

</div>
</div>

                    <div>
                     <div class="col-md-12">          
       <form id="deleted" action="delete.php" method="post" enctype="multipart/form-data"  onsubmit="return confirm('Do you really want to delete this employee?')">
  <input type="number" class="button" name="id" id="id" placeholder="employee id">
  <br>

      <button class="buttonS" type="submit">delete</button>
</form> 

        </div>
            </div>




                        <!-- /.intro-header -->

                        <!-- Page Content -->


                        <!-- jQuery -->
                        <script src="js/jquery.js"></script>

                        <!-- Bootstrap Core JavaScript -->
                        <script src="js/bootstrap.min.js"></script>

</body>

</html>












