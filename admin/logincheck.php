<?php

if(isset($_SESSION['firstName'])) {

}
else {
	header("Location: loginform.php?returnfile=" . $_SERVER['SCRIPT_NAME']);
}
?>