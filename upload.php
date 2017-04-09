<?php

header ( "Location:index.html" );

$conn = mysqli_connect("id885231_mams", "id885231_root",'swe2017', "mams");
	// Check connection
	if (! $conn)
		die ( "Failed to connect to MySQL: " . mysqli_connect_error () );


if(isset($_POST['upload']) && $_FILES['pic']['size'] > 0)
{
$fileName = $_FILES['pic']['name'];
$tmpName  = $_FILES['pic']['tmp_name'];
$fileSize = $_FILES['pic']['size'];
$fileType = $_FILES['pic']['type'];

$fp      = fopen($tmpName, 'r');
$content = fread($fp, filesize($tmpName));
$content = addslashes($content);
fclose($fp);

if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
}

$query = "INSERT INTO upload (name, size, type, content ) ".
"VALUES ('$fileName', '$fileSize', '$fileType', '$content')";

$result =  mysqli_query($conn, $query);


echo "<br>File $fileName uploaded<br>";
header ( "Location:index.html" );
} 
?>