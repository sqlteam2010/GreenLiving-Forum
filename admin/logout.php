<?php
session_start();
unset($_SESSION['firstName']);
header("Location: .." . $_REQUEST['redirect']);
?>