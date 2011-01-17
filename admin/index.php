<?php session_start(); include('logincheck.php'); ?>
<html>
<head>
<?php


if ($_SESSION['permission'] < 10)
header("Location: deny.php"); ?>
<title>Administration</title>
<link rel="STYLESHEET" type="text/css" href="style.css">
</head>
<body>


<table cellspacing="2" cellpadding="2" border="0">
<tr >
	<td rowspan="2" width="200">
<?php include('menu.php'); ?>	
	</td>
	<td><h1>Administration</h1></td>
</tr>
<tr>
	<td>
<?php 
$include = 'true';
if (isset($_REQUEST['include'])){
include($_REQUEST['include']);
}
else{
	include('viewtable.php');
}
 ?>
	</td>
</tr>
<tr>
<td></td><td>
</td>
</tr>
</table>

</body>
</html>

