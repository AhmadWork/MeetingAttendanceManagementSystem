<?php 
session_start();
$inactive = 300;
// check to see if $_SESSION["timeout"] is set
if (isset($_SESSION["timeout"])) {
	// calculate the session's "time to live"
	$sessionTTL = time() - $_SESSION["timeout"];
	if ($sessionTTL > $inactive) { // if 5 minutes passed with no activity the session will be destroyed and auto logout will ocure
		session_destroy();
		header("Location: /index.php");
	}
}
$_SESSION["timeout"] = time();
if (!IsUser()) {
	header("location: index.html");
}
function IsUser() {
	if (!isset($_SESSION['ID'])) {
		return false;
	}

	return true;
}
?>