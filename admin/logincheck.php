<?php
ini_set("display_errors","1");

if(isset($_SESSION['firstName'])) {

}
else {
	header("Location: loginform.php?returnfile=" . $_SERVER['SCRIPT_NAME']);
}
?>