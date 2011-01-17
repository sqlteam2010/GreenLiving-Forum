<?php
include 'logincheck.php';
echo "<a href='../'>Site Home</a><br />";
echo "<a href='index.php?include=viewTable.php'>View Tables</a><br/>";
echo "<a href='index.php?include=newEntry.php'>New Data Entry</a><br/>";
echo "<a href='logout.php?redirect=" . $_SERVER['SCRIPT_NAME'] . "'>Logout</a>";
?>
