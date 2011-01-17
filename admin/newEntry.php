<?php
include('dbconnect.php');
mysql_select_db('greenliving');
if (is_Null($include)){
	include('logincheck.php');
}
if(isset($_GET['gonew'])){
	$table = mysql_real_escape_string($_REQUEST['table']);
	$result = mysql_query("Show columns from " . $table) or die(mysql_error());
	$query = "INSERT INTO " . $table . " Values (";
	$id = '1';
	while ($row3 = mysql_fetch_array($result)){
		if(strtolower($row3['Field'])=='id'){
			$query .= "NULL";
			$id = '0';
		}else{
			if ($id == '1') {
				$query .= "'";
				if(strtolower($row3['Field']) == 'password'){
				$query .= md5($_REQUEST[$row3['Field']]);
				}
				else{
				$query .= $_REQUEST[$row3['Field']];
				}
				$query .= "'";
				$id = '0';
			}else{	
				$query .= ",'";
				if(strtolower($row3['Field']) == 'password'){
				$query .= md5($_REQUEST[$row3['Field']]);
				}
				else{
				$query .= $_REQUEST[$row3['Field']];
				}
				$query .= "'";
				$id = '0';
			}
		}
		
	}
	$query .= ")";
	$result = mysql_query($query);
	if($result==1){
		echo 'Entry Succesfully added to database.';
	}
}
else{
if(isset($_GET['table'])){
	$table = mysql_real_escape_string($_GET['table']);
	$sql2 = mysql_query("show columns from " . $table) or die(mysql_error());
	echo "<table border=1><tr><th>Attribute</th><th>Value</th></tr><form method='get' action='" . $_SERVER['SCRIPT_NAME'] . "'><input type='hidden' name='table' value='" . $table . "'/><input type='hidden' NAME='gonew' value='1' />";
	echo "<input type='hidden' NAME='include' value='newEntry.php'/>";
	while($row2 = mysql_fetch_array($sql2)){
		if ($row2['Field'] != 'ID'){
			echo "<tr><td><label>" . ucwords(str_replace('ies','y',strtolower(str_replace('_',' ',$row2['Field'])))) . " </label></td><td><input type='text' name='" . $row2['Field'] . "'/></td></tr>";
		}
	}
	
	echo "<tr><td colspan=2><input type='submit' value='submit' /></form></td></tr></table>";
}
else{
	$sql = mysql_query("show tables") or die(mysql_error()); 
	echo "<form method='get' action='" . $_SERVER['SCRIPT_NAME'] . "'><label>New </label><SELECT NAME='table' SIZE=1>"; 
	while($row = mysql_fetch_array($sql)){ 
		echo "<OPTION VALUE='" . $row['Tables_in_greenliving'] . "'>" . ucwords(strtolower(str_replace('ies','y',str_replace('_',' ',$row['Tables_in_greenliving'])))); 
		} 
	echo "<input type='hidden' NAME='include' value='newEntry.php'/>";
	echo "</SELECT><br /><input type='submit' value='Next'/></form>"; 
}
}
?>