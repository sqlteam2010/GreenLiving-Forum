<?php
if(is_NULL($include)){
include('logincheck.php');
}
include('dbconnect.php');
mysql_select_db('greenliving');
if(isset($_POST['attribute'])){
$attribute = mysql_real_escape_string($_POST['attribute']);
$value = mysql_real_escape_string($_POST['value']);
$table = mysql_real_escape_string($_POST['table']);
$sql2 = mysql_query("SHOW COLUMNS FROM " . $table) or die(mysql_error());
echo "<table border=1><tr>";
while($row2 = mysql_fetch_array($sql2)){
echo "<th>" . ucwords(strtolower(str_replace('ies','ie',str_replace('_',' ',$row2['Field'])))) . "</th>";
}
echo "</tr>";
$sql = mysql_query("SELECT * FROM " . $table . " WHERE " . $attribute . " Like '" . $value . "'") or die(mysql_error());
while($row = mysql_fetch_array($sql)){
echo "<tr>";
$sql3 = mysql_query("SHOW COLUMNS FROM " . $table) or die(mysql_error());
while($row3 = mysql_fetch_array($sql3)){
echo "<td>";
echo $row[$row3['Field']];
echo "</td>";
}
echo "</tr>";
}
echo "</table>";
}
else{
if(isset($_POST['table'])){
$table = mysql_real_escape_string($_POST['table']);
$sql = mysql_query("SHOW COLUMNS from " . $table) or die(mysql_error());
echo "<form method='post' action='" . $_SERVER['SCRIPT_NAME'] . "'><label>Search " . ucwords(strtolower(str_replace('ies','ie',str_replace('_',' ',$table)))) . "s Where the </label><input name='table' type='hidden' value='" . $table . "'/>
<SELECT name='attribute' size=1>";
while($row = mysql_fetch_array($sql)){
if($row['Field']!='ID'){
echo "<option value='";
echo $row['Field'] . "'>" . ucwords(strtolower(str_replace('ies','ie',str_replace('_',' ',$row['Field'])))) . "</option>";
}
}
echo "</SELECT><label> is </label><input type='text' name='value'/><br /><input type='submit' value='Next'/></form>";
}
else{
$sql = mysql_query("SHOW TABLES") or die(mysql_error());
echo "<form method='post' action='" . $_SERVER['SCRIPT_NAME'] . "'><label>View </label><SELECT NAME='table' SIZE=1>";
while($row = mysql_fetch_array($sql)){
echo "<OPTION VALUE='" . $row['Tables_in_greenliving'] . "'>" . ucwords(strtolower(str_replace('ies','ie',str_replace('_',' ',$row['Tables_in_greenliving'])))) . "s";
}
echo "</SELECT><br /><input type='submit' value='Next'/></form>";
}
}
?>





