<?php
include('dbconnect.php');
mysql_select_db("greenliving");
if(isset($_POST['username'])){
	$username = mysql_real_escape_string($_POST['username']);
	$result = mysql_query("SELECT user.password, user.first_name, user.last_name, user.email, user.birthday, user.time_zone, profile.permission FROM user INNER JOIN profile ON user.email = profile.email AND profile.screen_name like '" . $username . "' OR user.email like '" . $username . "'") or die(mysql_error());
	if ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
		if ($row['password'] == md5($_POST['password'])){
			session_start();
			$_SESSION['firstName'] = $row['first_name'];
			$_SESSION['lastName'] = $row['last_name'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['location'] = $row['location'];
			$_SESSION['permission'] = $row['permission'];
			header('Location: ..' . $_REQUEST['returnfile']);
		}
	else
	{
		echo "login Failed";
	}
}
else   {
	echo "login Failed";
	//Header(Location: 'login.php');
}
}
?>



