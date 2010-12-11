<?php
ini_set('display_errors', 1);
include('dbconnect.php');
mysql_select_db("fees0_6433866_db_greensource");
$result = mysql_query("SELECT * FROM user WHERE email='" . mysql_real_escape_string($_POST['username']) . "' && pass='" . md5(mysql_real_escape_string($_POST['password'])) . "'") or die(mysql_error());


 if ($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
     session_start();
      $_SESSION['firstName'] = $row['fName'];
      $_SESSION['lastName'] = $row['lName'];
      $_SESSION['email'] = $row['email'];
      $_SESSION['zipcode'] = $row['location'];
      $_SESSION['permission'] = $row['permission'];
      header('Location: ..' . $_REQUEST['returnfile']);
}
   else   {
      echo "login Failed";
      //  header("Location: login.htm");   
   }  
?>



