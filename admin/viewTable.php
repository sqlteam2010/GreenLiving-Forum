<?php
ini_set('display_errors',1);
include('dbconnect.php');
mysql_select_db('fees0_6433866_db_greensource');
if(isset($_POST['attribute'])){
$attribute = mysql_real_escape_string($_POST['attribute']);
$value = mysql_real_escape_string($_POST['value']);
$table = mysql_real_escape_string($_POST['table']);
$sql2 = mysql_query("SELECT * FROM attributes WHERE tb_Name='" . $table . "'") or die(mysql_error());
echo "<table border=1><tr>";
while($row2 = mysql_fetch_array($sql2)){
echo "<th>" . $row2['showName'] . "</th>";
}
echo "</tr>";
$sql = mysql_query("SELECT * FROM " . $table . " WHERE " . $attribute . "='" . $value . "'") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
echo "<tr>";
$sql3 = mysql_query("SELECT * FROM attributes WHERE tb_Name='" . $table . "'") or die(mysql_error());
while($row3 = mysql_fetch_array($sql3)){
echo "<td>";
echo $row[$row3['at_Name']];
echo "</td>";
}
echo "</tr>";
}
echo "</table>";
}
else{
if(isset($_POST['table'])){
$table = mysql_real_escape_string($_POST['table']);
$sql = mysql_query("SELECT * FROM attributes WHERE tb_Name='" . $table . "'") or die(mysql_error());
echo "<form method='post' action='" . $_SERVER['SCRIPT_NAME'] . "'><label>Search " . ucfirst($table) . "s Where the </label><input name='table' type='hidden' value='" . $table . "'/><SELECT name='attribute' size=1>";
while($row = mysql_fetch_array($sql)){
echo "<option value='";
echo $row['at_Name'] . "'>" . $row['showName'] . "</option>";
}
echo "</SELECT><label> is </label><input type='text' name='value'/><br /><input type='submit' value='Next'/></form>";
}
else{
$sql = mysql_query("SELECT * FROM tables") or die(mysql_error());
echo "<form method='post' action='" . $_SERVER['SCRIPT_NAME'] . "'><label>View </label><SELECT NAME='table' SIZE=1>";
while($row = mysql_fetch_array($sql)){
echo "<OPTION VALUE='" . $row['tb_Name'] . "'>" . ucfirst($row['tb_Name']) . "s";
}
echo "</SELECT><br /><input type='submit' value='Next'/></form>";
}
}
?>





