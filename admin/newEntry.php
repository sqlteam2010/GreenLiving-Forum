<?php
include('dbconnect.php');
mysql_select_db('fees0_6433866_db_greensource');
if(isset($_POST['table'])){
$table = $_POST['table'];
$sql2 = mysql_query("SELECT * FROM attributes WHERE tb_Name='" . $table . "'") or die(mysql_error());
echo "<table border=1><tr><th>Attribute</th><th>Value</th></tr><form method='post' action='newEntry.php'>";
while($row2 = mysql_fetch_array($sql2)){
echo "<tr><td><label>" . $row2['showName'] . " </label></td><td><input type='text' name='" . $row2['at_Name'] . "'/></td></tr>";
}
echo "<tr><td colspan=2><input type='submit' value='submit' /></form></td></tr></table>";
}
else{
$sql = mysql_query("SELECT * FROM tables") or die(mysql_error()); 
echo "<form method='post' action='newEntry.php'><label>Choose Table: </label><SELECT NAME='table' SIZE=1>"; 
while($row = mysql_fetch_array($sql)){ 
echo "<OPTION VALUE='" . $row['tb_Name'] . "'>" . $row['tb_Name']; 
} 
echo "</SELECT><br /><input type='submit' value='Next'/></form>"; 
}
?>