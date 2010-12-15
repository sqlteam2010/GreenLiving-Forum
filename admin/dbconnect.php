<?php
ini_set("display_errors","1"); // sql112.0fees.net:3306 fees0_6433866 sqlteam
$connection = mysql_connect('localhost','root','sqlteam');
if (!$connection)
  {
  die('Sorry Could Not Connect To Database Please Contact The Administrator.' . mysql_error());
  }
?>