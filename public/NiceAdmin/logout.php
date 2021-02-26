<?php
include ("includeconnection.php");
	setcookie("oka", $me, time()-3600);
    header("location:loginadmin.php");
?>