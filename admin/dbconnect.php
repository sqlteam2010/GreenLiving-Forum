<?php
$connection = mysql_connect('localhost','root','sqlteam');
if (!$connection)
{
  die('Sorry Could Not Connect To Database Please Contact The Administrator.' . mysql_error());
}
?>