<html>
<head>
<link type="text/css" href="style.css" rel="stylesheet" />
<title>Login</title>
</head>
<body> 
<form method="post" action="login.php">

<table width="300" height="200" border="3">

<tr>
<td colspan="2" align="center">
<h1>GreenLiving</h1>
</td>
</tr>

<tr>
<td align="center">
Email or Screen Name <br/><br/>
Password 
</td>
<td align="center">
<input name="username" type="text" size="13" maxlength="45" /><br/>
<input name="password" type="password" size="13" maxlength="20" />
<?php
if(isset($_REQUEST['returnfile'])){
	echo "<input type='hidden' value='" . $_REQUEST['returnfile'] . "' name='returnfile' />";
}
else{
	echo "<input type='hidden' value='/admin/' name='returnfile' />";
}
?> 
</td>
</tr>


<tr>
<td colspan="2" align="center">
<input type="submit" value="Sign In">
</td>
</tr>

</table>
</form>
</body>
</html>